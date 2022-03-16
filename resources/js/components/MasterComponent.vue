<template>

    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active1" urlcode="/"></shared-menu-component>

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
            <div class="col-md-2">成功メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="join_success"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">失敗メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="join_miss"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">パスワード変更リンク</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="password_edit"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">パスワード再発行</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="password_renew"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">サインイン失敗メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="sign_in_miss"  />
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
                    <input v-if="defineData.type != 'account_type' && defineData.type != 'password' && defineData.type != 'email' && defineData.type != 'name' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.display_status" />
                    <input v-else type="hidden" v-model="defineData.display_status" />
                </div>
                <div class="col-md-3">

                    <input type="text" class="form-control w-100" v-model="defineData.title2" v-if="lang==2" />
                    <input type="text" class="form-control w-100" v-model="defineData.title" v-else />

                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control w-100" v-model="defineData.text2" v-if="lang==2"  />
                    <input type="text" class="form-control w-100" v-model="defineData.text" v-else />
                </div>
                <div class="col-md-1">
                    <input v-if="defineData.type != 'account_type' && defineData.type != 'password' && defineData.type != 'email' && defineData.type != 'name' " type="checkbox" class="h-75 w-75 mt-1" v-model="defineData.required" />
                    <input v-else type="hidden" v-model="defineData.required" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control w-100" v-model="defineData.required_text2" v-if="lang==2" />
                    <input type="text" class="form-control w-100" v-model="defineData.required_text" v-else />
                </div>
                <div class="col-md-2">
                    {{type[defineData.type]}}
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <span>エラーメッセージ</span>
                    <input type="text" class="form-control w-100" v-model="defineData.error_message2" v-if="lang==2" />
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
                <div class="row mb-2" v-for="spaceList of spaceLists" :key="spaceList.id">
                    <div class="col-md-4" >
                        <input type="text" class="form-control w-100" v-model="spaceList.text2" v-if="lang==2" />
                        <input type="text" class="form-control w-100" v-model="spaceList.text" v-else />
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
    props:['id', 'lang'],
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
            password_edit:"",
            password_renew:"",
            back_button:"",
            regist_button:"",
            join:"",
            party:"",
            party_flag:"",
            joinlink:"",
            join_success:"",
            join_miss:"",
            sign_in_miss:"",
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
                alert("error1");
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
                alert("error2");
            });
        },
        getDefineData:function(){
            this.showLoading = true;
            let postData = {};
            axios.get("/admin/master/define/"+this.id, postData).then(response => {
                // 成功
                //this.defineDatas = response['data'];
                var ans = [];
                var lang = (this.lang)?this.lang:1;
                var define = [];
                response['data'].forEach(function(element){
                    if(element[ 'type' ] == "title") ans[1] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "button") ans[2] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "back_button") ans[3] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "regist_button") ans[4] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "joinlink") ans[5] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "join_success") ans[6] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "join_miss") ans[7] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "password_edit") ans[8] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "password_renew") ans[9] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "sign_in_miss") ans[10] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "join") ans[11] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "party") ans[12] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'type' ] == "party_flag") ans[13] =  (lang == 2) ? element[ 'title2' ]:element['title'];
                    if(element[ 'sort' ] > 0 ) define.push(element);
                })

                this.title  = ans[1];
                this.button = ans[2];
                this.back_button = ans[3];
                this.regist_button = ans[4];
                this.joinlink = ans[5];
                this.join_success = ans[6];
                this.join_miss = ans[7];
                this.password_edit = ans[8];
                this.password_renew = ans[9];
                this.sign_in_miss = ans[10];
                this.join = ans[11];
                this.party = ans[12];
                this.party_flag = ans[13];
                this.defineDatas = define;

                this.showLoading = false;

            }).catch(error => {
                // 失敗
                alert("error(1)");
            });
        },
        edit:function(key,value){
            //console.log(this.title)
           // console.log(this.defineDatas)
            //console.log(this.spaceLists)
            this.showLoading = true;
            let postData = {
                lang:this.lang,
                title:this.title,
                button:this.button,
                regist_button:this.regist_button,
                back_button:this.back_button,
                party:this.party,
                party_flag:this.party_flag,
                join:this.join,
                joinlink:this.joinlink,
                password_edit:this.password_edit,
                password_renew:this.password_renew,
                input:this.defineDatas,
                spaceLists:this.spaceLists,
                join_success:this.join_success,
                join_miss:this.join_miss,
                sign_in_miss:this.sign_in_miss
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
