<template>
    <div class="container p-3">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}</nav>

        <div class="text-end">

            <a href="./sponser/new" class="btn btn-primary">新規登録</a>
        </div>

        <table class="table table-hover  mt-3">
            <thead>
                <tr>
                    <th scope="col">機能</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">リンク先</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>〇〇協賛会社</td>
                    <td>http://www.sample.co.jp</td>
                    <td>2022/01/02 14:10</td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>〇〇協賛会社</td>
                    <td>http://www.sample.co.jp</td>
                    <td>2022/01/02 14:10</td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>〇〇協賛会社</td>
                    <td>http://www.sample.co.jp</td>
                    <td>2022/01/02 14:10</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data(){
        return {
            name:"お知らせ一覧",
            options: [
                { text: '未払い', value: '0' },
                { text: '支払済み', value: '1' }
            ]
        }
    },
  methods: {
    onSubmit1: function () {
      alert("ssss");
    }
  }
}
</script>
