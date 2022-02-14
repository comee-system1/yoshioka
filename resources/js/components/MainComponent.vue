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
            <a v-bind:href="'/admin/join/new/'+id" class="btn btn-primary">新規登録</a>
        </div>
        <form @submit.prevent="Search">
            <div class="row">
                <div class="col-md-2">
                    <label>参加者名</label>
                    <input type="text" class="form-control" v-model="join_name" />
                </div>
                <div class="col-md-2">
                    <label>メールアドレス</label>
                    <input type="text" class="form-control" v-model="join_email" />
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary ">検索</button>
                </div>
            </div>
        </form>
        <ul class="pagination mt-3">
            <li class="page-item" v-for="i in last" v-bind:key="i">
                <a class="page-link" v-on:click="move(i)" >{{i}}</a>
            </li>
        </ul>
        <table class="table table-hover  mt-3">
            <thead>
                <tr>
                    <th scope="col">機能</th>
                    <th scope="col">参加者名</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">支払状況</th>
                    <th scope="col">請求/領収</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="list in lists" v-bind:key="list.id">
                    <td>
                        <a v-bind:href="'/admin/join/edit/'+id+'/'+list.id" class="btn btn-success">更新</a>
                        <a v-bind:href="'/admin/endai/edit/'+id+'/'+list.id" class="btn btn-warning">演題</a>
                        <a v-bind:href="'/admin/join/delete/'+id+'/'+list.id" class="btn btn-danger">削除</a>
                    </td>
                    <td>{{list.name}}</td>
                    <td>{{list.email}}</td>
                    <td>
                        <select class="form-control" v-model="list.payment_flag" v-on:change="payment(list.id, $event)">
                            <option v-for="option in options" v-bind:value="option.value" :key="option.value" >
                            {{ option.text }}
                            </option>
                        </select>
                    </td>
                    <td>
                    <button class="btn btn-outline-primary">請求書</button>
                    <button class="btn btn-outline-success">領収書</button>
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
        this.getLists();
        return {
            name:"参加者一覧",
            lists:[],
            showLoading:true,
            last:0,
            join_name:"",
            join_email:"",
            options: [
                { text: '未払い', value: '0' },
                { text: '支払済み', value: '1' }
            ]
        }
    },
    mounted : function(){
        this.page = 1;
    },
    methods: {
        payment:function(id, event){
            this.showLoading = true;
            let postData = {
                'account_id':id,
                'payment_flag':event.target.value
            };
            axios.post("/admin/join/payment/"+this.id, postData).then(response => {
                // 成功
                alert("支払い状況の更新を行いました。");
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        move:function(page){
            this.page = page;
            this.getLists();
        },
        getLists: function(){
            this.showLoading = true;
            let postData = {
                'join_name':this.join_name,
                'join_email':this.join_email
            };
            let page = (this.page)?this.page:1;
            axios.post("/admin/join/list/"+this.id+"?page="+page, postData).then(response => {
                // 成功
                this.lists = response[ 'data' ][ 'list' ][ 'data' ];
                this.last = response[ 'data' ][ 'last' ];
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        Search: function () {
            this.join_name = this.join_name;
            this.join_email = this.join_email;
            this.getLists();
        }
    }
}
</script>
