<template>
    <div class="container p-3">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}</nav>

        <div class="text-end">

            <a href="./join/new" class="btn btn-primary">新規登録</a>
        </div>
        <form @submit.prevent="onSubmit1">
            <div class="row">
                <div class="col-md-2">
                    <label>参加者名</label>
                    <input type="text" name="join" class="form-control" value="" />
                </div>
                <div class="col-md-2">
                    <label>メールアドレス</label>
                    <input type="text" name="mail" class="form-control" value="" />
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
                    <th scope="col">参加者名</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">支払状況</th>
                    <th scope="col">請求/領収</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-warning">演題</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>佐藤太郎</td>
                    <td>sample@sample.co.jp</td>
                    <td>
                        <select class="form-control">
                            <option v-for="option in options" v-bind:value="option.value" :key="option.value">
                            {{ option.text }}
                            </option>
                        </select>

                    </td>
                    <td>
                    <button class="btn btn-outline-primary">請求書</button>
                    <button class="btn btn-outline-success">領収書</button>
                    </td>
                <td>2022/01/01 00:00:00</td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-success">更新</button>
                        <button class="btn btn-warning">演題</button>
                        <button class="btn btn-danger">削除</button>
                    </td>
                    <td>佐藤太郎</td>
                    <td>sample@sample.co.jp</td>
                    <td><a href="">支払い済み</a></td>
                    <td>
                    <button class="btn btn-outline-primary">請求書</button>
                    <button class="btn btn-outline-success">領収書</button>
                    </td>
                <td>2022/01/01 00:00:00</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data(){
        return {
            name:"参加者一覧",
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
