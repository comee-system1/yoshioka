<template>
    <main role="main" class="container">
        <h1 class="h3 mb-3 font-weight-normal mt-3">{{name}}</h1>
        <div class="row">
            <div class="col-2" v-for="spaceList of spaceLists" :key="spaceList.id">
                <a href="" class="btn btn-outline-success w-100 text-nowrap mt-1"><small>{{ spaceList }}</small></a>
            </div>
        </div><!-- /.row -->
        <div class="row mt-3">
            <div class="col-6">
                <a href="" class="btn btn-danger">オンラインプレゼンテーションページ</a>
            </div>
            <div class="col-6 text-end">
                <a href="" class="btn btn-danger">要旨PDFダウンロード</a>
            </div>
        </div>
        <div class="row mt-3">
            <table class="table table-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col" class="text-center">時刻</th>
                        <th scope="col" class="text-center">講演者</th>
                        <th scope="col" class="text-center">演題名</th>
                        <th scope="col" class="text-center w-50">ダウンロード資料</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>09:00～09:15</td>
                        <td></td>
                        <td>開会の挨拶</td>
                        <td class="text-center"></td>
                    </tr>
                    <tr>
                        <td>09:15～09:30</td>
                        <td>佐藤太郎</td>
                        <td>演題1</td>
                        <td class="text-center">
                            <a href="" class="btn btn-primary">配布資料1</a>
                            <a href="" class="btn btn-primary">配布資料2</a>
                            <a href="" class="btn btn-primary">配布資料3</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main><!-- /.container -->
</template>
<script>
export default {
    data(){
        this.spaceListsData();
        return {
            name: "タイムテーブル",
            spaceLists: '',
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
    }
}
</script>
