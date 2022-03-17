<template>
    <div>
        <div class="row mt-3">
            <div class="col-md-3"><a v-bind:href="'/admin/master/'+id" v-bind:class="[active == 'active1' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">参加設定</a></div>
            <div class="col-md-3"><a v-bind:href="'/admin/master/endai/'+id" v-bind:class="[active == 'active2' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">演題設定</a></div>
            <div class="col-md-3"><a v-bind:href="'/admin/master/time/'+id" v-bind:class="[active == 'active3' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">タイムテーブル</a></div>
            <!-- <div class="col-md-2"><a v-bind:href="'/admin/master/book/'+id" v-bind:class="[active == 'active4' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">予稿原稿</a></div> -->
            <div class="col-md-3"><a v-bind:href="'/admin/master/mail/'+id" v-bind:class="[active == 'active5' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">メール設定</a></div>
            <div class="col-md-3 mt-1"><a v-bind:href="'/admin/master/invoice/'+id" v-bind:class="[active == 'active6' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">請求書/領収書設定</a></div>
            <div class="col-md-3 mt-1"><a v-bind:href="'/admin/master/title/'+id" v-bind:class="[active == 'active7' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">ページ項目設定</a></div>
            <div class="col-md-3 mt-1"><a v-bind:href="'/admin/master/mypage/'+id" v-bind:class="[active == 'active8' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">マイページ設定</a></div>
            <div class="col-md-3 mt-1"><a v-bind:href="'/admin/master/password/'+id" v-bind:class="[active == 'active9' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">パスワード再設定</a></div>
            <div class="col-md-3 mt-1"><a v-bind:href="'/admin/master/join/'+id" v-bind:class="[active == 'active10' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">参加者一括登録</a></div>
        </div>
        <div class="text-end" v-if="lang==3">
            <a v-if="urlcode" v-bind:href="'/admin/master'+urlcode+''+id+''" v-bind:class="[active1 == true ? 'active':'','btn btn-outline-secondary']">{{language1}}</a>
            <a v-if="urlcode" v-bind:href="'/admin/master'+urlcode+''+id+'/lang/2'" v-bind:class="[active2 == true ? 'active':'','btn btn-outline-secondary']">{{language2}}</a>
        </div>
    </div>
</template>
<script>
export default {
    props:[
        'id',
        'active',
        'urlcode'
        ],
    data(){
        return {
            name:"お知らせ一覧",
            lang:0,
            active1:true,
            active2:false
        }
    },
    computed:{
    },
    mounted:function(){
        let str = location.pathname.match(/lang\/\d+$/)[0];
        if(str == "lang/2"){
            this.active1 = false
            this.active2 = true
        }
    },
    created : function(){
        let postData = {};
        axios.get("/admin/master/seminer/"+this.id, postData).then(response => {
            this.lists = response[ 'data' ];
            this.language1 = response[ 'data' ][0][ 'language1' ];
            this.language2 = response[ 'data' ][0][ 'language2' ];
            this.lang = response[ 'data' ][0][ 'template' ];
        }).catch(error => {
            // 失敗
            alert("error");
        });

    }

}
</script>
