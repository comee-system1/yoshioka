<template>
    <div class="row mt-3">
        <div class="col-md-2"><a v-bind:href="'/admin/master/'+id" v-bind:class="[active == 'active1' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">参加設定</a></div>
        <div class="col-md-2"><a v-bind:href="'/admin/master/endai/'+id" v-bind:class="[active == 'active2' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">演題設定</a></div>
        <div class="col-md-2"><a v-bind:href="'/admin/master/time/'+id" v-bind:class="[active == 'active3' ? 'btn btn-outline-success w-100 active' : 'btn btn-outline-success w-100']">タイムテーブル</a></div>
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
