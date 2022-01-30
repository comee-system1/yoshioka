<template>
    <div class="container">
        <h3 class="mt-3">新しいセミナーを作成</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">学会テンプレート</h4>
                        </div>
                        <div class="card-body">
                            <ul class="mt-3 mb-4">
                                <li class="text-start pr-2">参加者・演題登録</li>
                                <li class="text-start pr-2">タイムテーブル</li>
                                <li class="text-start pr-2">決済</li>
                                <li class="text-start pr-2">お知らせ</li>
                                <li class="text-start pr-2">領収書</li>
                                <li class="text-start pr-2">協賛管理</li>
                            </ul>
                            <button class="btn btn-primary" v-on:click="openModal">登録</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="mt-3">最近登録したセミナー</h3>
        <div class="row">
            <div class="col-md-4" v-for="seminer in seminers" v-bind:key="seminer.id" >
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body position-relative open1image">

                            <div class="position-relative">
                                <button type="button" class="menu-btn" @click="menuclick(seminer.id)">
                                    menu
                                </button>
                                <div v-if="loginType === seminer.id" class="menu">
                                    <div class="menu__item"><a href='/admin/join'>管理画面</a></div>
                                    <div class="menu__item"><a href=''>編集</a></div>
                                    <div class="menu__item"><a href=''>削除</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <h6>{{seminer.name}}</h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 clearfix">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" :value="seminer.id" type="checkbox" @click="onDisplayChange" :checked="seminer.display_status" >
                                    </div>
                                </div>
                                <p class="text-end">登録日: 2021/01/01 </p>
                            </div>
                            <div class="row">
                                <p>http://www.aaaa.co.jp/open/AessE1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <transition>
            <div id="overlay" v-show="showContent" >
                <div class="row modalbox">

                    <div class="row">
                        <label for="main_image">メイン画像</label>
                        <div class="col-12">
                            <input type="file" ref="preview" @change="uploadFile">
                            <div v-if="url" id='preview-main'>
                                <img :src="url" name="main_image">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="name">セミナー名[<span class="text-danger h6">必須</span>]</label>
                        <div class="col-12">
                            <input type="text" class="form-control" v-model="name" name="name" placeholder="セミナー名を入力してください">
                            <p v-if="error.require" class="text-danger">セミナー名は4文字以上で入力してください</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="explain">説明文</label>
                        <div class="col-12">
                            <textarea v-model="explain" name="explain" id="explain" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="explain">住所</label>
                        <div class="col-12 ">
                            <textarea name="address" v-model="address" id="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="explain">地図表示</label>
                        <div class="col-3">
                            <input type="radio" v-model="map_status" name="map_status" id="map-1" value="1" />
                            <label for="map-1">有効</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" v-model="map_status" name="map_status" id="map-0" value="0" />
                            <label for="map-0">無効</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label >セミナー日時</label>
                        <div class="col-6">
                            <p>開始日時</p>
                            <input type="datetime-local" v-model="start_date" class="w-100 form-control" name="start_date">
                        </div>
                        <div class="col-6">
                            <p>終了日時</p>
                            <input type="datetime-local" v-model="end_date" class="w-100 form-control" name="end_date">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2"><button v-on:click="closeModal" class="btn btn-danger">閉じる</button></div>
                        <div class="col-md-2"><button v-on:click="post" class="btn btn-primary">登録</button></div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>


<script>
import {Mixin} from '../mixin'
export default {
    mixins:[Mixin],
    data(){
        return {
            name: '',
            url:"",
            fileInfo:"",
            return:"",
            explain:"",
            map_status:0,
            start_date:"",
            end_date:"",
            address:"",
            error: {
                require: false,
                over: false,
            },
            showLoading:false,
            seminers: [],
        };
    },
    mounted(){

        this.setLists();
    },
    methods: {
        setLists(){
            var url = '/admin/getDataLists';
            axios.get(url).then(response =>
                this.seminers = response.data
            )
        },
        onDisplayChange(e){
            this.showLoading = true;
            alert(e.target.value);

            let postData = {
                'id': e.target.value,
                'display_status': e.target.checked,
            };
            axios.post("/admin/editData", postData).then(response => {
                // 成功
                this.showLoading = false;
                alert("データ更新成功しました。");
            }).catch(error => {
                // 失敗
                alert("error");
            });

        },
        uploadFile(event){
            const file = this.$refs.preview.files[0];
            this.fileInfo = event.target.files[0]
            this.url = URL.createObjectURL(file)
        },
        postConfirm:function(){
            this.return = true;
            if(this.name.length < 4 ){
                this.error.require = true;
                this.return = false;
            }
            return this.return;
        },
        post:function(key,value){
            this.error.require = false;
            if(!this.postConfirm()) return false;
            this.showLoading = true;
            const formData = new FormData();
            formData.append('file',this.fileInfo);
            formData.append('name',this.name);
            formData.append('explain',this.explain);
            formData.append('map_status',this.map_status);
            formData.append('start_date',this.start_date);
            formData.append('end_date',this.end_date);
            formData.append('address',this.address);
            let config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };
            axios.post("/admin/saveData", formData, config).then(response => {
                // 成功
                this.showLoading = false;
                this.showContent = false;
                console.log(response)
                alert("セミナーの追加をおこないました。");
                this.setLists();
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
};
</script>
