<template>
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
</template>
<script>
export default {
    props:['id','active'],
    data(){
        return {
            name:"お知らせ一覧",
        }
    },
}
</script>
