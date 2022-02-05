<template>
    <div class="container  p-3 ">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}設定</nav>

        <div class="row mt-2">
            <p class="m-0">表示・非表示設定</p>
            <div class="col-md-6">
                <div class="btn-group mr-2" v-if="display_show">
                    <button class="btn btn-sm btn-outline-danger w100 " v-bind:class="{ 'active': active1 }"  v-on:click="able(1)" >有効</button>
                    <button class="btn btn-sm btn-outline-danger w100" v-bind:class="{ 'active': active0 }" v-on:click="able(0)">無効</button>
                </div>
                <div v-else>
                    aaa
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-3">
                <p class="m-0">日付選択</p>
                <select name="date" class="form-control">
                    <option></option>
                    <option value="">2022/01/01</option>
                    <option value="">2022/01/02</option>
                </select>
            </div>
        </div>

        <div class="row mt-2">
            <p class="m-0">設定会場選択</p>
            <div class="col-2" v-for="spaceList of spaceLists" :key="spaceList.id">
                <a href="" class="btn btn-outline-success w-100 text-nowrap mt-1"><small>{{ spaceList }}</small></a>
            </div>
        </div>

        <div class="row mt-5 d-grid gap-2 col-6 mx-auto" v-if="button_show">
            <button class="btn btn-success w-100" v-on:click="program">プログラム入力</button>
        </div>
        <div class="row mt-5 col-6 mx-auto" v-else >
            <div class="col-md-6">
                <button class="btn btn-danger w-100" v-on:click="back" >戻る</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-success w-100" >登録</button>
            </div>
        </div>

        <div class="row mt-2" v-if="program_url" >
            <div class="col-md-8">
                <p class="m-0">Web用URL</p>
                <input type="text" name="weburl" value="" class="form-control w-50" placeholder="動画配信用URLを入力してください"/>
            </div>
        </div>

        <div class="row mt-5 position-relative">
            <div class="filtertable" v-if="filtertable"  ></div>
            <table class="table table-bordered">
                <tr class="bg-primary text-white">
                    <th>有効/無効</th>
                    <th>時刻</th>
                    <th>講演者選択</th>
                    <th>演題名</th>
                    <th>ダウンロード資料</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <input type="checkbox"  />
                    </td>
                    <td class="w-25">
                        <div class="row">
                            <div class="col-5">
                                <input type="time" name="start_ts" value="" class="form-control" />
                            </div>
                            <div class="col-1 text-center">～</div>
                            <div class="col-5">
                                <input type="time" name="end_ts" value="" class="form-control" />
                            </div>
                        </div>
                    </td>
                    <td class="w-25">
                        <select  name="" class="js-attachSelect2-tag selectpos w-100" >
                            <option value="" >選択・自由入力可</option>
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
            program_url:false,
            display_show:true,
            button_show:true,
            filtertable:true,
        };

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
        },
        program:function(){
            this.display_show = false;
            this.filtertable = false;
            this.button_show = false;
            this.program_url = true;
        },
        back:function(){

            this.display_show = true;
            this.filtertable = true;
            this.button_show = true;
            this.program_url = false;

        },
    }
}
</script>
