<template>
    <div class="container  p-3 ">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}</nav>
        <div class="row mt-2">
            <div class="col-2" v-for="spaceList of spaceLists" :key="spaceList.id">
                <a href="" class="btn btn-outline-success w-100 text-nowrap mt-1"><small>{{ spaceList }}</small></a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-success w100 " v-bind:class="{ 'active': active1 }"  v-on:click="able(1)" >有効</button>
                    <button class="btn btn-sm btn-outline-success w100" v-bind:class="{ 'active': active0 }" v-on:click="able(0)">無効</button>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8">
                <p>Web用URL</p>
                <input type="text" name="weburl" value="" class="form-control w-50" placeholder="動画配信用URLを入力してください"/>
            </div>
            <div class="col-md-4">
                <p>要旨原稿用アップロードファイル</p>
                <input type="file">
            </div>
        </div>
        <div class="row mt-2">
            <table class="table table-bordered">
                <tr class="bg-primary text-white">
                    <th>時刻</th>
                    <th>講演者選択</th>
                    <th>演題名</th>
                    <th>ダウンロード資料</th>
                </tr>
                <tr>
                    <td class="w-50">
                        <div class="row">
                            <div class="col-5">
                                <input type="datetime-local" name="start_ts" value="" class="form-control" />
                            </div>
                            <div class="col-1 text-center">～</div>
                            <div class="col-5">
                                <input type="datetime-local" name="end_ts" value="" class="form-control" />
                            </div>
                        </div>
                    </td>
                    <td>
                        <select name="" class="form-control">
                            <option value="" ></option>
                            <option value="" >佐藤太郎</option>
                            <option value="" >伊藤花子</option>
                        </select>
                    </td>
                    <td>
                        サンプル演題名
                    </td>
                    <td>
                        <ol>
                            <li>ダウンロード資料1</li>
                            <li>ダウンロード資料2</li>
                            <li>ダウンロード資料3</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td class="w-50">
                        <div class="row">
                            <div class="col-5">
                                <input type="datetime-local" name="start_ts" value="" class="form-control" />
                            </div>
                            <div class="col-1 text-center">～</div>
                            <div class="col-5">
                                <input type="datetime-local" name="end_ts" value="" class="form-control" />
                            </div>
                        </div>
                    </td>
                    <td>
                        <select name="" class="form-control">
                            <option value="" ></option>
                            <option value="" >佐藤太郎</option>
                            <option value="" >伊藤花子</option>
                        </select>
                    </td>
                    <td>
                        サンプル演題名
                    </td>
                    <td>
                        <ol>
                            <li>ダウンロード資料1</li>
                            <li>ダウンロード資料2</li>
                            <li>ダウンロード資料3</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td class="w-50">
                        <div class="row">
                            <div class="col-5">
                                <input type="datetime-local" name="start_ts" value="" class="form-control" />
                            </div>
                            <div class="col-1 text-center">～</div>
                            <div class="col-5">
                                <input type="datetime-local" name="end_ts" value="" class="form-control" />
                            </div>
                        </div>
                    </td>
                    <td>
                        <select name="" class="form-control">
                            <option value="" ></option>
                            <option value="" >佐藤太郎</option>
                            <option value="" >伊藤花子</option>
                        </select>
                    </td>
                    <td>
                        サンプル演題名
                    </td>
                    <td>
                        <ol>
                            <li>ダウンロード資料1</li>
                            <li>ダウンロード資料2</li>
                            <li>ダウンロード資料3</li>
                        </ol>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        this.spaceListsData();
        return {
            name: "タイムテーブル",
            spaceLists: '',
            active1: true,
            active0: false,
        }
    },
    methods: {
        //会場取得
        spaceListsData:function(){
            let postData = {};
            axios.post("/getSpaceList", postData).then(response => {
                // 成功
                this.spaceLists = response['data'];
            }).catch(error => {
                // 失敗
                alert("error");
            });

        },
        able:function(type){
            this.active1 = false;
            this.active0 = false;
            if (type == 1) this.active1 = true;
            if (type == 0) this.active0 = true;
        }
    }
}
</script>
