<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active1"></shared-menu-component>
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
            <div class="col-md-2">登録リンク</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="joinlink"  />
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
        <div class="row mt-3 pt-3" v-for="defineData of defineDatas" :key="defineData.id" style="border-top:2px dotted #ccc ;">
            <div class="row">
                <div class="col-md-1">

                    <input v-if="defineData.type != 'password' && defineData.type != 'email' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.display_status" />
                    <input v-else type="hidden" v-model="defineData.display_status" />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.title" />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.text"  />
                </div>
                <div class="col-md-1">
                    <input v-if="defineData.type != 'password' && defineData.type != 'email' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.required" />
                    <input v-else type="hidden" v-model="defineData.required" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control w-100" v-model="defineData.required_text" />
                </div>
                <div class="col-md-2">
                    {{type[defineData.type]}}
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-1"></div>
                <div class="col-md-6">
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
                <div class="row mb-2" v-for="spaceList of spaceLists" :key="spaceList.id">
                    <div class="col-md-4" >
                        <input type="text" class="form-control w-100" v-model="spaceList.text" />
                    </div>
                    <div class="col-md-2 text-center" >
                        <input type="checkbox" v-model="spaceList.display_status" class="mt-2 h-75 w-75" />
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row mt-3">
            <div class="col-md-2">決済タイトル</div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2" >参加費名</div>
                    <div class="col-md-4 text-center" >
                        <input type="text" class="form-control w-100" v-model="join" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2" >懇親会費名</div>
                    <div class="col-md-4 text-center" >
                        <input type="text" class="form-control w-100" v-model="party" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2" >懇親参加フラグ名</div>
                    <div class="col-md-4 text-center" >
                        <input type="text" class="form-control w-100" v-model="party_flag" />
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
        this.spaceListsData();
        this.getDefineData();
        this.getType();
        return {
            name:"マスター一覧",
            spaceLists: [],
            defineDatas: [],
            title:"",
            button:"",
            back_button:"",
            regist_button:"",
            join:"",
            party:"",
            party_flag:"",
            joinlink:"",
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
        spaceListsData:function(){
            let postData = {};
            axios.get("/getSpaceLists/"+this.id, postData).then(response => {
                // 成功
                this.spaceLists = response['data'];
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        getDefineData:function(){
            this.showLoading = true;
            let postData = {};
            axios.get("/admin/master/define/"+this.id, postData).then(response => {
                // 成功
                //this.defineDatas = response['data'];
                var define = [];
                var button;
                var back_button;
                var regist_button;
                var title;
                var join;
                var joinlink;
                var party;
                var party_flag;
                response['data'].forEach(function(element){
                    if(element['type'] == "back_button"){
                        back_button = element;
                    }else
                    if(element['type'] == "regist_button"){
                        regist_button = element;
                    }else
                    if(element['type'] == "button"){
                        button = element;
                    }else if(element['type'] == "title"){
                        title = element;
                    }else if(element['type'] == "join"){
                        join = element;
                    }else if(element['type'] == "party"){
                        party = element;
                    }else if(element['type'] == "party_flag"){
                        party_flag = element;
                    }else if(element['type'] == "joinlink"){
                        joinlink = element;
                    }else{
                        define.push(element);
                    }

                });
                this.button = button['title'];
                this.back_button = back_button['title'];
                this.regist_button = regist_button['title'];
                this.title = title['title'];
                this.join = join['title'];
                this.party = party['title'];
                this.party_flag = party_flag['title'];
                this.joinlink = joinlink['title'];
                this.defineDatas = define;
                this.showLoading = false;

            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        edit:function(key,value){
            //console.log(this.title)
           // console.log(this.defineDatas)
            //console.log(this.spaceLists)
            this.showLoading = true;
            let postData = {
                title:this.title,
                button:this.button,
                regist_button:this.regist_button,
                back_button:this.back_button,
                party:this.party,
                party_flag:this.party_flag,
                join:this.join,
                joinlink:this.joinlink,
                input:this.defineDatas,
                spaceLists:this.spaceLists
            };
            axios.post("/admin/master/edit/"+this.id, postData).then(response => {
                // 成功
                console.log(response);

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
