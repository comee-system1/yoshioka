<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active2" urlcode="/endai/"></shared-menu-component>
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
            <div class="col-md-2">更新ボタン</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="edit_button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">削除ボタン</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="delete_button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">成功メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="endai_success"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">失敗メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="endai_fail"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">削除確認メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="delete_check"  />
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
                    <input v-if="defineData.type != 'account_id' && defineData.type != 'endai' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.display_status" />
                    <input v-else type="hidden" v-model="defineData.display_status" />

                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.title2" v-if="lang==2" />
                    <input type="text" class="form-control w-100" v-model="defineData.title" v-else />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.text2" v-if="lang==2" />
                    <input type="text" class="form-control w-100" v-model="defineData.text"  v-else />
                </div>
                <div class="col-md-1">
                    <input v-if="defineData.type != 'account_id' && defineData.type != 'endai' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.required" />
                    <input v-else type="hidden" v-model="defineData.type" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control w-100" v-model="defineData.required_text2" v-if="lang==2" />
                    <input type="text" class="form-control w-100" v-model="defineData.required_text" v-else />
                </div>
                <div class="col-md-2">
                    {{type[defineData.type]}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <span>エラーメッセージ</span>
                    <input type="text" class="form-control w-100" v-model="defineData.error_message2" v-if="lang==2"/>
                    <input type="text" class="form-control w-100" v-model="defineData.error_message" v-else />
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
                        <input type="text" class="form-control w-100" v-model="presentationList.text2" v-if="lang==2" />
                        <input type="text" class="form-control w-100" v-model="presentationList.text" v-else />
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
    props:['id', 'lang'],
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
            edit_button:"",
            delete_button:"",
            endai_success:"",
            endai_fail:"",
            delete_check:"",
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
            var lang = this.lang;
            axios.get("/admin/master/defineEndai/"+this.id, postData).then(response => {
                // 成功
                var ans = [];
                var define = [];
                response['data'].forEach(function(element){
                    if(element[ 'type' ] == "title") ans[1] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "button") ans[2] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "back_button") ans[3] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "regist_button") ans[4] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "edit_button") ans[5] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "delete_button") ans[6] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "endai_success") ans[7] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "endai_fail") ans[8] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "delete_check") ans[9] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'sort' ] > 0 ) define.push(element);

                });
                this.title = ans[1];
                this.button = ans[2];
                this.back_button = ans[3];
                this.regist_button = ans[4];
                this.edit_button = ans[5];
                this.delete_button = ans[6];
                this.endai_success = ans[7];
                this.endai_fail = ans[8];
                this.delete_check = ans[9];
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
                lang:this.lang,
                title:this.title,
                button:this.button,
                regist_button:this.regist_button,
                edit_button:this.edit_button,
                delete_button:this.delete_button,
                back_button:this.back_button,
                endai_success:this.endai_success,
                endai_fail:this.endai_fail,
                delete_check:this.delete_check,
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
