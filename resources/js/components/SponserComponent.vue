<template>
    <div class="container p-3">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}</nav>

        <div class="text-end">

            <a v-bind:href="'/admin/sponser/new/'+id" class="btn btn-primary">新規登録</a>
        </div>

        <table class="table table-hover  mt-3">
            <thead>
                <tr>
                    <th scope="col">機能</th>
                    <th scope="col">協賛画像</th>
                    <th scope="col">リンク先</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="list of lists" :key="list.id">
                    <td>
                        <a v-bind:href="'/admin/sponser/edit/'+id+'/'+list.id" class="btn btn-success">更新</a>
                        <button class="btn btn-danger" @click="onClickDelete(id, list.id)">削除</button>
                    </td>
                    <td><img v-if="list.file" v-bind:src="'/storage/sponser/'+list.file" height=60 /></td>
                    <td>
                        <div v-show="list.link_type == 1">{{list.link}}</div>
                        <a v-show="list.link_type == 2" v-bind:href="'/storage/sponser/'+list.link_file">アップロードファイル</a>

                    </td>
                    <td>{{list.date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props:['id'],
    data(){
        this.getLists()
        return {
            name:"協賛企業一覧",
            showLoading:true,
            lists:[]
        }
    },
    methods: {
        onClickDelete: function (id, sponser_id){
            if(confirm("データの削除を行います。")){
                let postData = {};
                this.showLoading = true;
                axios.get("/admin/sponser/delete/"+this.id+"/"+sponser_id, postData).then(response => {
                    this.getLists()
                }).catch(error => {
                    // 失敗
                    alert("error");
                });
                return true;
            }
            return false;
        },
        getLists: function () {
            let postData = {};
            axios.get("/getSponser/"+this.id, postData).then(response => {
                this.lists = response[ 'data' ];
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
}
</script>
