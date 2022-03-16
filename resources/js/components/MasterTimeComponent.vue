<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active3"  urlcode="/time/" ></shared-menu-component>
        <div class="row mt-3">
            <div class="col-md-2">タイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="title"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                Web用URLボタン名
                <br /><small>オンライン会場のURL</small>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                プログラム一覧
                <br /><small>タイトル</small>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3" v-for="tdData of tdDatas" :key="tdData.id">
                        <input type="text" class="form-control w-100" v-model="tdData.title2" v-if="lang==2" />
                        <input type="text" class="form-control w-100" v-model="tdData.title" v-else />
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row mt-3">
            <div class="col-md-2">
                会場名
            </div>
            <div class="col-md-10">
                <div class="row mt-1" v-for="placeList of placeLists" :key="placeList.id">
                    <div class="col-md-1 text-center">
                        <input type="checkbox" class="h-50 w-50 mt-2" v-model="placeList.display_status" />
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" v-model="placeList.text2" v-if="lang==2" />
                        <input type="text" class="form-control" v-model="placeList.text" v-else />
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
    props:['id', 'lang'],
    data(){
        this.placeListsData();
        this.getDefineData();
        this.getType();
        return {
            name:"マスター一覧",
            placeLists: [],
            tdDatas: [],
            title:"",
            button:"",
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
        placeListsData:function(){
            let postData = {};
            axios.get("/getPlaceLists/"+this.id, postData).then(response => {
                // 成功
                this.placeLists = response['data'];
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        getDefineData:function(){
            this.showLoading = true;
            let postData = {};
            var lang = this.lang;
            axios.get("/admin/master/defineTime/"+this.id, postData).then(response => {
                // 成功
                var td = [];
                var ans = [];
                var reg = /^td[0-9]/
                // var button;
                // var title;
                response['data'].forEach(function(element){
                    if(element[ 'type' ] == "title") ans[1] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "button") ans[2] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(reg.test(element[ 'type' ])) ans[3] =  td.push(element);
                });
                this.title  = ans[1];
                this.button = ans[2];
                this.tdDatas = td;
                this.showLoading = false;

            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        edit:function(key,value){
            this.showLoading = true;
            let postData = {
                lang:this.lang,
                title:this.title,
                button:this.button,
                tdDatas:this.tdDatas,
                placeLists:this.placeLists
            };
            axios.post("/admin/master/editTime/"+this.id, postData).then(response => {
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
