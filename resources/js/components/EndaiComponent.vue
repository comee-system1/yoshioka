<template>
    <div class="container p-3">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}</nav>

        <div class="text-end">

            <a v-bind:href="'/admin/endai/new/'+id" class="btn btn-primary">演題新規登録</a>
        </div>
        <form @submit.prevent="onSubmit1">
            <div class="row">
                <div class="col-md-2">
                    <label>演題名</label>
                    <input type="text" name="endai" class="form-control" value="" />
                </div>
                <div class="col-md-2">
                    <label>発表者名</label>
                    <input type="text" name="announce" class="form-control" value="" />
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary ">検索</button>
                </div>
            </div>
        </form>
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
                <tr>
                    <td class="align-middle">
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td class="align-middle">サンプル演題1</td>
                    <td class="align-middle">佐藤太郎<div>sample@sample.co.jp</div></td>
                    <td class="align-middle">
                        <button class="btn btn-outline-dark" v-on:click="report(1)">配布資料</button>
                    </td>
                    <td class="align-middle">2022/01/01 00:00:00</td>
                </tr>
                <tr>
                    <td class="align-middle">
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td class="align-middle">サンプル演題1</td>
                    <td class="align-middle">佐藤太郎<div>sample@sample.co.jp</div></td>
                    <td class="align-middle">
                        <button class="btn btn-outline-dark" v-on:click="report(2)">配布資料</button>
                    </td>
                    <td class="align-middle">2022/01/01 00:00:00</td>
                </tr>
            </tbody>
        </table>

        <div id="overlay" v-show="showContent">
            <div id="content">
                <div class="text-end w-100">
                    <button type="button" v-on:click="close()" class="btn btn-danger">閉じる <i class="fas fa-times"></i></button>
                </div>
                <div class="w-100">
                    <p class="h5 bg-success text-white p-1" >{{endainame}}での配布資料</p>
                    <ul v-for="item of items" v-bind:key="item.name">
                        <li>{{ item.key }}{{ item.name }}{{ item.href }}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    props:['id'],
    data(){
        return {
            name:"演題一覧",
            showContent: false,
            range: 'B',
        }
    },
  methods: {
    report: function (id) {
        this.id = id;
        this.showContent = true;
        this.endainame = 'サンプル演題';
        this.items = [
            {key: '1', name: '資料ダウンロード', href: 'http://yahoo.co.jp' },
            {key: '2', name: '資料ダウンロード2', href: 'http://yahoo.co.jp' }
        ];
    },
    close: function(){
        this.showContent = false;
    }
  }
}


</script>
