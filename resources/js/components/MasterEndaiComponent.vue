<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active2"></shared-menu-component>
        <div class="row mt-3">
            <div class="col-md-2">タイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="title"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">確認ボタン</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">戻るボタン</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="back_button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">登録ボタン</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="regist_button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-1"><small>利用有無</small></div>
            <div class="col-md-3"><small>表示名</small></div>
            <div class="col-md-3"><small>例文</small></div>
            <div class="col-md-1"><small>必須有無</small></div>
            <div class="col-md-2"><small>付属文言</small></div>
            <div class="col-md-2"><small>形式</small></div>
        </div>
        <div class="row mt-3" v-for="defineData of defineDatas" :key="defineData.id">
            <div class="row">
                <div class="col-md-1">
                    <input v-if="defineData.type != 'account_id' && defineData.type != 'name' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.display_status" />
                    <input v-else type="hidden" v-model="defineData.display_status" />

                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.title" />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.text"  />
                </div>
                <div class="col-md-1">
                    <input v-if="defineData.type != 'account_id' && defineData.type != 'name' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.required" />
                    <input v-else type="hidden" v-model="defineData.type" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control w-100" v-model="defineData.required_text" />
                </div>
                <div class="col-md-2">
                    {{type[defineData.type]}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <span>エラーメッセージ</span>
                    <input type="text" class="form-control w-100" v-model="defineData.error_message" />
                </div>
            </div>
        </div>


        <hr />
        <div class="row mt-3">
            <div class="col-md-2">区分設定</div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4" >名前</div>
                    <div class="col-md-2 text-center" >有効/無効</div>
                </div>
                <div class="row mb-2" v-for="presentationList of presentationLists" :key="presentationList.id">
                    <div class="col-md-4" >
                        <input type="text" class="form-control w-100" v-model="presentationList.text" />
                    </div>
                    <div class="col-md-2 text-center" >
                        <input type="checkbox" v-model="presentationList.display_status" class="mt-2 h-75 w-75" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <button class="btn btn-primary w-25" v-on:click="edit" >更新</button>
        </div>

    </div>
</template>
<script>
export default {
    props:['id'],
    data(){
        this.presentationListsData();
        this.getDefineData();
        this.getType();
        return {
            name:"マスター一覧",
            presentationLists: [],
            defineDatas: [],
            title:"",
            button:"",
            back_button:"",
            regist_button:"",
            type:[],
            showLoading:true,
        }
    },
    methods: {
        getType:function(){
            let postData = {};
            axios.get("/getType", postData).then(response => {
                // 成功
                this.type = response['data'];
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        //区分
        presentationListsData:function(){
            let postData = {};
            axios.get("/getPresentationLists/"+this.id, postData).then(response => {
                // 成功
                this.presentationLists = response['data'];
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        getDefineData:function(){
            this.showLoading = true;
            let postData = {};
            axios.get("/admin/master/defineEndai/"+this.id, postData).then(response => {
                // 成功
                var define = [];
                var button;
                var back_button;
                var regist_button;
                var title;
                response['data'].forEach(function(element){
                    if(element['type'] == "back_button"){
                        back_button = element;
                    }else
                    if(element['type'] == "regist_button"){
                        regist_button = element;
                    }else
                    if(element['type'] == "button"){
                        button = element;
                    }else
                    if(element['type'] == "title"){
                        title = element;
                    }else{
                        define.push(element);
                    }
                });
                this.button = button['title'];
                this.back_button = back_button['title'];
                this.regist_button = regist_button['title'];
                this.title = title['title'];
                this.defineDatas = define;
                this.showLoading = false;

            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        edit:function(key,value){
            //console.log(this.title)
            //console.log(this.defineDatas)
            //console.log(this.presentationLists)
            this.showLoading = true;
            let postData = {
                title:this.title,
                button:this.button,
                regist_button:this.regist_button,
                back_button:this.back_button,
                input:this.defineDatas,
                presentationLists:this.presentationLists
            };
            axios.post("/admin/master/editEndai/"+this.id, postData).then(response => {
                // 成功
                alert("データの更新に成功しました。");
                this.showLoading = false;

            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
}
</script>
