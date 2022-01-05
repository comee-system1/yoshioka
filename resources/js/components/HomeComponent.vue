<template>
    <div class="container">
        <p>新しいセミナーを作成</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                            </ul>
                            <button class="btn btn-primary" v-on:click="openModal">モーダル表示ボタン</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>最近登録したセミナー</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body position-relative">
                            sss<br />
                            sss<br />
                            sss<br />
                            sss<br />
                            sss<br />
                            <div class="position-relative">
                                <button type="button" class="menu-btn" @click="menuclick">
                                    menu
                                </button>
                                <div class="menu" v-bind:class="{menushow:enhance}" >
                                    <div class="menu__item"><a href=''>参加者管理</a></div>
                                    <div class="menu__item"><a href=''>演題管理</a></div>
                                    <div class="menu__item"><a href=''>タイムテーブル</a></div>
                                    <div class="menu__item"><a href=''>決済ページ</a></div>
                                    <div class="menu__item"><a href=''>お知らせ管理</a></div>
                                    <div class="menu__item"><a href=''>削除</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <h6>テストセミナー</h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 clearfix">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input " type="checkbox" >
                                    </div>
                                </div>
                                <p class="text-end">登録日: 2021/01/01 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <transition>
            <div id="overlay" v-show="showContent" >
                <div class="row">
                    <div class="w-100">
                        <div class="w-100">
                            <div class="row w-100">
                                    <label for="name">セミナー名</label>
                                    <div class="col-12 w-100">
                                        <input type="text" class="form-control" v-model="name" name="name" placeholder="セミナー名を入力してください">
                                        <p v-if="error.require" class="text-danger">セミナー名は4文字以上で入力してください</p>
                                    </div>
                            </div>
                            <div class="row w-100">
                                <label for="explain">説明文</label>
                                <div class="col-12 w-100">
                                    <textarea name="explain" id="explain" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row w-100">
                                <label for="starttime">セミナー開始日時</label>
                                <div class="col-6">
                                    <p>開始日時</p>
                                    <input type="datetime-local" class="w-100 form-control" name="starttime">
                                </div>
                                <div class="col-6">
                                    <p>終了日時</p>
                                    <input type="datetime-local" class="w-100 form-control" name="endtime">
                                </div>
                            </div>
                        </div>


                    </div>
                    <p><button v-on:click="post" class="btn btn-primary">post</button></p>
                    <p><button v-on:click="closeModal" class="btn btn-danger">close</button></p>
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
            error: {
                require: false,
                over: false
            }
        };
    },
    methods: {
        post:function(key,value){
            this.error.require = true;
            let postData = {
                'user_id': 'aaa',
                'key': 1,
                'value': 'vvvv'
            };

            axios.post("/admin/saveData", postData).then(response => {
                // 成功
                alert("success");
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
};
</script>
