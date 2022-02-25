<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active9"></shared-menu-component>

        <div class="h4 mt-3">パスワード再設定</div>
        <div class="row mt-3">
            <div class="col-md-2">項目名</div>
            <div class="col-md-2">表示</div>
            <div class="col-md-4"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">パスワード再設定</div>
            <div class="col-md-1"><input type="checkbox" v-model="renew_title_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="renew_title"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">説明文</div>
            <div class="col-md-1"><input type="checkbox" v-model="renew_note_status" /></div>
            <div class="col-md-8">
                <textarea v-model="renew_note" class="form-control" rows=6 ></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">入力フォーム</div>
            <div class="col-md-1"></div>
            <div class="col-md-8">
                項目名
                <input type="text" class="form-control w-100" v-model="renew_input"  />
                例文
                <input type="text" class="form-control w-100" v-model="renew_input_text"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">登録ボタン</div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <input type="text" class="form-control w-100" v-model="renew_button"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">登録成功メッセージ</div>
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="renew_success"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">登録失敗メッセージ</div>
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="renew_miss"  />
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
        this.getData();
        return {
            name:"マスター一覧",
            showLoading:true,
            renew_title_status:"",
            renew_title:"",
            renew_note_status:"",
            renew_note:"",
            renew_input_text:"",
            renew_input:"",
            renew_button:"",
            renew_success:"",
            renew_miss:"",
            download:"",
        }
    },
    methods: {
        getData:function()
        {
            let postData = {};
            axios.get("/getPassword/"+this.id, postData).then(response => {
                // 成功
                this.renew_title = response[ 'data' ][ 'renew_title' ][ 'title' ];
                this.renew_title_status = parseInt(response[ 'data' ][ 'renew_title' ][ 'display_status' ]);
                this.renew_note = response[ 'data' ][ 'renew_note' ][ 'title' ];
                this.renew_note_status = parseInt(response[ 'data' ][ 'renew_note' ][ 'display_status' ]);

                this.renew_input = response[ 'data' ][ 'renew_input' ][ 'title' ];
                this.renew_input_text = response[ 'data' ][ 'renew_input' ][ 'text' ];

                this.renew_button = response[ 'data' ][ 'renew_button' ][ 'title' ];
                this.renew_success = response[ 'data' ][ 'renew_success' ][ 'title' ];
                this.renew_miss = response[ 'data' ][ 'renew_miss' ][ 'title' ];


                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        edit:function()
        {
            this.showLoading = true;
            let postData = {
                renew_title_status:this.renew_title_status,
                renew_title:this.renew_title,
                renew_note_status:this.renew_note_status,
                renew_note:this.renew_note,
                renew_input_text:this.renew_input_text,
                renew_input:this.renew_input,
                renew_button:this.renew_button,
                renew_success:this.renew_success,
                renew_miss:this.renew_miss,
            };
            axios.post("/admin/master/password/edit/"+this.id, postData).then(response => {
                // 成功
                alert("データの更新を行いました");
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
}
</script>
