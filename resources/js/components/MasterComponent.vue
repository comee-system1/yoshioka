<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2"><a href="" class="btn btn-outline-success w-100 active">参加設定</a></div>
            <div class="col-md-2"><a href="" class="btn btn-outline-success w-100">演題設定</a></div>
        </div>

        <div class="row mt-3">
            <div class="col-md-2">タイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="title"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">ボタン</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-1"><small>利用有無</small></div>
            <div class="col-md-3"><small>表示名</small></div>
            <div class="col-md-3"><small>例文</small></div>
            <div class="col-md-1"><small>必須有無</small></div>
            <div class="col-md-2"><small>付属文言</small></div>
        </div>
        <div class="row mt-3" v-for="defineData of defineDatas" :key="defineData.id">
            <div class="col-md-1">
                <input type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.display_status" />
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control w-100" v-model="defineData.title" />
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control w-100" v-model="defineData.text"  />
            </div>
            <div class="col-md-1">
                <input type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.required" />
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control w-100" v-model="defineData.required_text" />
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
        return {
            name:"マスター一覧",
            spaceLists: [],
            defineDatas: [],
            title:"",
            button:"",
            showLoading:true,
        }
    },
    methods: {
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
                var title;
                response['data'].forEach(function(element){
                    if(element['type'] == "input"){
                        define.push(element);
                    }
                    if(element['type'] == "button") button = element;
                    if(element['type'] == "title") title = element;

                });
                this.button = button['title'];
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
            //console.log(this.spaceLists)
            this.showLoading = true;
            let postData = {
                title:this.title,
                button:this.button,
                input:this.defineDatas,
                spaceLists:this.spaceLists
            };
            axios.post("/admin/master/edit/"+this.id, postData).then(response => {
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
