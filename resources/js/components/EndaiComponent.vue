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

            <a v-bind:href="'/admin/endai/new/'+id" class="btn btn-primary">演題新規登録</a>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>演題名</label>
                <input type="text" class="form-control" v-model="endai_name" />
            </div>
            <div class="col-md-2">
                <label>発表者名</label>
                <select class="form-control js-attachSelect2" id="select" >
                    <option value=""></option>
                    <option v-for="(option, key) in accountLists" v-bind:value="key" v-bind:key="key">{{option}}</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary " v-on:click="onSearch()">検索</button>
            </div>
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
                    <th scope="col">演題名</th>
                    <th scope="col">発表者名<br />メールアドレス</th>
                    <th scope="col">配布資料</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="list of lists" v-bind:key="list.id" >
                    <td class="align-middle">
                        <a v-bind:href='"/admin/endai/edit/"+id+"/"+list.id' class="btn btn-sm btn-success">更新</a>
                        <a @click="onClickDelete(id, list.id)" class="btn btn-sm btn-danger" >削除</a>
                    </td>
                    <td class="align-middle">{{list.name}}</td>
                    <td class="align-middle">{{list.account_name}}<div>{{list.account_email}}</div></td>
                    <td class="align-middle">
                        <a v-bind:href="'/storage/file/'+list.file1" class="btn btn-sm btn-outline-dark" v-show="list.file1 ">{{list.file1_name}}</a>
                        <a v-bind:href="'/storage/file/'+list.file2" class="btn btn-sm btn-outline-primary" v-show="list.file2">{{list.file2_name}}</a>
                        <a v-bind:href="'/storage/file/'+list.file3" class="btn btn-sm btn-outline-success" v-show="list.file3">{{list.file3_name}}</a>
                    </td>
                    <td class="align-middle">{{list.date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
var _account_id = 0;
$(function(){
    $("#select").on("change",function(){
        _account_id = $(this).val();
    });
});
export default {
    props:['id'],
    data(){
        this.getList()
        this.accountList()
        return {
            name:"演題一覧",
            showContent: false,
            last:0,
            endainame: '',
            items: [],
            lists: [],
            accountLists: [],
            endai_name: '',
            endai_account: '',
            page:1,
            showLoading:true,
            account_id:0
        }
    },
  methods: {
    onClickDelete:function(id, endai_id){
        if (confirm("データの削除をおこないます。")){
            location.href='/admin/endai/delete/'+id+'/'+endai_id;
        }
        return false;
    },
    accountList:function(){
        let postData = {};
        axios.get("/admin/endai/accountList/"+this.id, postData).then(response => {
            // 成功
            this.accountLists = response[ 'data' ];
        }).catch(error => {
            // 失敗
            alert("error");
        });
    },
    onSearch:function(){
        this.page = 1;
        this.getList();
    },
    move:function(page){
        this.page = page;
        this.getList();
    },
    getList: function() {
        this.showLoading = true;

        let postData = {
            'endai_name':this.endai_name,
            'account_id':_account_id
        };
        let page = (this.page)?this.page:1;
        axios.post("/admin/endai/list/"+this.id+"?page="+page, postData).then(response => {
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
