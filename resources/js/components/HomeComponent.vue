<template>
    <div class="container">
        <p>新しいセミナーを作成</p>
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
        <p>最近登録したセミナー</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body position-relative open1image">

                            <div class="position-relative">
                                <button type="button" class="menu-btn" @click="menuclick">
                                    menu
                                </button>
                                <div class="menu" v-bind:class="{menushow:enhance}" >
                                    <div class="menu__item"><a href='/admin/join'>管理画面</a></div>
                                    <div class="menu__item"><a href=''>編集</a></div>
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
                            <div class="row">
                                <p>http://www.aaaa.co.jp/open/AessE1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <transition>
            <div id="overlay" v-show="showContent" >
                <div class="row modalbox">

                    <div class="row">
                        <label for="name">セミナー名</label>
                        <div class="col-12">
                            <input type="text" class="form-control" v-model="name" name="name" placeholder="セミナー名を入力してください">
                            <p v-if="error.require" class="text-danger">セミナー名は4文字以上で入力してください</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="explain">説明文</label>
                        <div class="col-12">
                            <textarea name="explain" id="explain" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="explain">住所</label>
                        <div class="col-12 ">
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="explain">地図表示</label>
                        <div class="col-3">
                            <input type="radio" name="map" id="map-1" value="1" />
                            <label for="map-1">有効</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" name="map" id="map-0" value="0" />
                            <label for="map-0">無効</label>
                        </div>
                    </div>
                    <div class="row mt-2">
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
