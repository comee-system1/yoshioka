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

            <a v-bind:href="'/admin/info/new/'+id" class="btn btn-primary">新規登録</a>
        </div>
        <ul class="pagination mt-3">
            <li class="page-item" v-for="i in last" v-bind:key="i">
                <a class="page-link" v-on:click="move(i)" >{{i}}</a>
            </li>
        </ul>
        <table class="table table-hover  mt-3">
            <thead>
                <tr>
                    <th scope="col">機能</th>
                    <th scope="col" class="w160">タイトル</th>
                    <th scope="col">表示期間</th>
                    <th scope="col">タイプ</th>
                    <th scope="col">配信</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="list of lists" v-bind:key="list.id" >
                    <td>
                        <a v-bind:href="'/admin/info/edit/'+id+'/'+list.id" class="btn btn-success">更新</a>
                        <a @click="onClickDelete(id, list.id)" class="btn btn-danger">削除</a>
                    </td>
                    <td v-html=list.title></td>
                    <td>
                        <div v-if=" list.start && list.end">
                        {{list.start}} ～ <br />{{list.end}}
                        </div>
                        <div v-else>
                            非表示
                        </div>
                    </td>
                    <td>{{list.info_type_disp}}</td>
                    <td>{{sendFlag[list.send_flag]}}</td>
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
        this.getSendFlag()
        this.getList()
        return {
            name:"お知らせ一覧",
            last:0,
            lists: [],
            page:1,
            showLoading:true,
            sendFlag:[]
        }
    },
  methods: {
    onClickDelete:function(id, information_id){
        if (confirm("データの削除をおこないます。")){
            let postData = {};
            axios.post("/admin/info/delete/"+id+"/"+information_id, postData).then(response => {
                // 成功
                this.getList();
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
        return false;
    },
    getSendFlag:function(){
            let postData = {};
            axios.post("/getSendFlag", postData).then(response => {
                // 成功
                this.sendFlag = response[ 'data' ];
            }).catch(error => {
                // 失敗
                alert("error");
            });
    },
    move:function(page){
        this.page = page;
        this.getList();
    },
    getList: function() {
        this.showLoading = true;
        let postData = {};
        let page = (this.page)?this.page:1;
        axios.post("/admin/info/list/"+this.id+"?page="+page, postData).then(response => {
            // 成功
            this.lists = response[ 'data' ][ 'list' ][ 'data' ];
            this.last = response[ 'data' ][ 'last' ];
            this.showLoading = false;
        }).catch(error => {
            // 失敗
            alert("error");
        });
    },
  }
}
</script>
