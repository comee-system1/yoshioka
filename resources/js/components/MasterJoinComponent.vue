<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active10"></shared-menu-component>

        <div class="h4 mt-3">参加者一括登録</div>
        <ul>
            <li>データの不整合回避の為、<span class="text-danger">メールアドレスは重複しないよう</span>に登録してください</li>
            <li>追加型になりますので、既に登録済みの参加者情報に影響はございません。</li>
            <li>「参加者フォーマット」よりファイルのダウンロードを行い、登録データを記載後、アップロードを行ってください。</li>
        </ul>
        <p>フォーマットの説明</p>
        <div class="row" v-for="object, key in objects.head" :key="key">
            <div class="col-md-3">{{object}}</div>
            <div class="col-md-8">
                {{objects.body[key]}}
                <p v-if="key == 'account_type'">{{objects.space}}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-3">
                <a v-bind:href="'/admin/master/join/donwload/'+id" class="btn btn-warning w-100" >参加者フォーマット</a>
            </div>
        </div>

        <div class="row mt-3">

            <input  type="file" @change="fileChange" class="form-control" id="file_input_expense" name="file_input_expense">

            <div class="col-3">
                <button class="mt-2 btn btn-primary w-100" v-on:click="click(id)">登録</button>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    props:['id', 'objects'],
    data(){
        return {
            name:"マスター一覧",
            showLoading:false,
            uploadFile:null
        }
    },
    methods: {
        fileChange:function(e)
        {
            e.preventDefault();
            let files = e.target.files;
            this.uploadFile = files[0];
            return false;
        },
        click:function(key)
        {


            let formData = new FormData();
            if(!this.uploadFile){
                alert("ファイルに不備があります。");
                return false;
            }

            formData.append('file',this.uploadFile);
            formData.append('id',key);
            let config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };
            this.showLoading = true;
            axios.post("/admin/master/account/"+key, formData, config).then(response => {
                // 成功
                this.showLoading = false;
                //console.log(response[ 'data' ]);
                alert("データの登録に成功しました。");

            }).catch(error => {
                // 失敗
                alert("error");
            });

            return false;
        }
    }
}
</script>
