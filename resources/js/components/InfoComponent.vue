<template>
    <div class="container p-3">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}</nav>

        <div class="text-end">

            <a href="./info/new" class="btn btn-primary">新規登録</a>
        </div>

        <table class="table table-hover  mt-3">
            <thead>
                <tr>
                    <th scope="col">機能</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">表示期間</th>
                    <th scope="col">タイプ</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>お知らせサンプル</td>
                    <td>2022/01/01 13:00 ～ 2022/01/03 14:00</td>
                    <td>Web掲載</td>
                    <td>2022/01/02 14:10</td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>お知らせサンプル</td>
                    <td>2022/01/01 13:00 ～ 2022/01/03 14:00</td>
                    <td>Web掲載</td>
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
