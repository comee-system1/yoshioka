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
                            <button class="btn btn-primary" v-on:click="openModal(0,1)">作成</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Seminer Template</h4>
                        </div>
                        <div class="card-body">
                            <ul class="mt-3 mb-4">
                                <li class="text-start pr-2">Participant / abstract registration</li>
                                <li class="text-start pr-2">timetable</li>
                                <li class="text-start pr-2">Payment</li>
                                <li class="text-start pr-2">Information</li>
                                <li class="text-start pr-2">receipt</li>
                                <li class="text-start pr-2">Sponsorship management</li>
                            </ul>
                            <button class="btn btn-primary" v-on:click="openModal(0,2)">作成</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center m-2 w-100 p-3">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">セミナテンプ(切替)</h4>
                        </div>
                        <div class="card-body">
                            <ul class="mt-3 mb-4">
                                <li class="text-start pr-2">Participant / abstract registration</li>
                                <li class="text-start pr-2">timetable</li>
                                <li class="text-start pr-2">Payment</li>
                                <li class="text-start pr-2">Information</li>
                                <li class="text-start pr-2">receipt</li>
                                <li class="text-start pr-2">Sponsorship management</li>
                            </ul>
                            <button class="btn btn-primary" v-on:click="openModal(0,3)">作成</button>
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
                        <div class="card-body position-relative open1image" :style="{ 'background-image': 'url(/storage/open/' + seminer.image + ')' }">
                            <div class="position-relative">
                                <button type="button" class="menu-btn" @click="menuclick(seminer.id)">
                                    menu
                                </button>
                                <div v-if="loginType === seminer.id" class="menu">
                                    <div class="menu__item"><a v-bind:href="'/admin/join/'+seminer.id">管理画面</a></div>
                                    <div class="menu__item"><a href='javascript:void(0);' v-on:click="openModal(seminer.id)">編集</a></div>
                                    <div class="menu__item"><a href='javascript:void(0);' v-on:click="deleteSeminer(seminer.id)">削除</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <h6 v-html=seminer.name></h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 clearfix">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" :value="seminer.id" type="checkbox" @click="onDisplayChange" :checked="seminer.display_status" >
                                    </div>
                                </div>
                                <p class="text-end">登録日: {{seminer.date}} </p>
                            </div>
                            <div class="row text-start">
                                <small><a v-bind:href="domain+'/open/'+seminer.id+'/'+seminer.open_key" target=_blank>{{domain}}/open/{{seminer.id}}/{{seminer.open_key}}</a></small>
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
                            <editor
                            :api-key=api_code
                            :init=init
                            v-model="name"
                            name="name"
                            placeholder="セミナー名を入力してください。"
                            />
                            <p v-if="error.require" class="text-danger">セミナー名は4文字以上で入力してください</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="name">サブタイトル</label>
                        <div class="col-12">
                            <editor
                            :api-key=api_code
                            :init=init
                            v-model="sub_title"
                            name="sub_title"
                            id="sub_title"
                            placeholder="セミナーのサブタイトルを入力してください"
                            />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="note">説明文</label>
                        <div class="col-12">
                            <editor
                            :api-key=api_code
                            :init=init
                            v-model="note"
                            name="note"
                            id="note"
                            />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="address">住所</label>
                        <div class="col-12 ">
                            <textarea name="address" v-model="address" id="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label for="map">地図表示</label>
                        <div class="col-3">
                            <input type="radio" v-model="map_status" name="map_status" id="map-1" value="1" />
                            <label for="map-1">有効</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" v-model="map_status" name="map_status" id="map-0" value="0" />
                            <label for="map-0">無効</label>
                        </div>
                    </div>
                    <div class="row mt-2" >
                        <label >セミナー日時</label>
                        <small class="text-primary">セミナーの期間設定は100日以内としてください</small>
                        <p class="text-danger" v-show="error.dateErrorMessage">期間設定に誤りがあります。</p>
                        <div class="col-6">
                            <p>開始日時</p>
                            <input type="datetime-local" v-model="start_date" class="w-100 form-control" name="start_date" value="2016-12-23T02:00" >
                        </div>
                        <div class="col-6">
                            <p>終了日時</p>
                            <input type="datetime-local" v-model="end_date" class="w-100 form-control" name="end_date">
                        </div>
                    </div>
                    <div class="row mt-2" v-if="template == 3">
                        <label >表示言語名</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" v-model="language1" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <input type="text" v-model="language2" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2"><button v-on:click="closeModal" class="btn btn-danger">閉じる</button></div>


                        <div class="col-md-2" v-if="seminer_id > 0" ><button v-on:click="post" class="btn btn-primary">更新</button></div>
                        <div class="col-md-2" v-else><button v-on:click="post" class="btn btn-primary">登録</button></div>
                    </div>
                </div>
            </div>
        </transition>

    </div>
</template>


<script>
import {Mixin} from '../mixin'
import Editor from '@tinymce/tinymce-vue'
export default {
    mixins:[Mixin],
    props:['api_code'],

    data(){

        return {
            language1: 'JP',
            language2: 'EN',
            name: '',
            sub_title: '',
            url:"",
            fileInfo:"",
            return:"",
            note:"",
            map_status:0,
            start_date:"",
            end_date:"",
            address:"",
            error: {
                require: false,
                over: false,
                dateErrorMessage:false,
            },
            showLoading:false,
            seminer_id:0,
            seminers: [],
            domain:"",
            init:{
                height: 120,
                menubar: false,
                plugins: [
                'textcolor'
                ],
                force_br_newlines : true,
                force_p_newlines : false,
                forced_root_block : '',
                toolbar:
                'forecolor | bold italic backcolor | subscript superscript'
            }
        };
    },
    components: {
        'editor': Editor
    },
    mounted(){

        this.setLists();
        this.domain = window.location.protocol + '//' + window.location.host;
    },
    methods: {
        deleteSeminer(key){
            if(confirm("データの削除を行います。よろしいですか？")){
                this.showLoading = true;
                 let postData = {
                    'id': key,
                };
                axios.post("/admin/deleteData", postData).then(response => {
                    // 成功
                    this.showLoading = false;
                    alert("データ削除しました。");
                    this.setLists();
                }).catch(error => {
                    // 失敗
                    alert("error");
                });
            }
        },
        setLists(){
            var url = '/admin/getDataLists';
            axios.get(url).then(response =>
                this.seminers = response.data
            )
        },
        onDisplayChange(e){
            this.showLoading = true;
            let postData = {
                'id': e.target.value,
                'display_status': e.target.checked,
            };
            axios.post("/admin/editStatusData", postData).then(response => {
                // 成功
                this.showLoading = false;
                alert("データ更新しました。");
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
        slicedate: function(date){
            let year = date.substr(0,4);
            let month = date.substr(5,2);
            let day = date.substr(8,2);
            return [year, month, day];
        },
        difference: function(start, end){
            let st = this.slicedate(start);
            let ed = this.slicedate(end);
            var distDate = new Date(st[0], st[1], st[2]);
            var loadDate = new Date(ed[0], ed[1], ed[2]);
            var diffMilliSec = loadDate - distDate;
            var diffDays = parseInt(diffMilliSec / 1000 / 60 / 60 / 24);
            return diffDays;
        },
        postDateConfirm:function(){
            let diff = this.difference(this.start_date, this.end_date);
            if(diff >= 100){
                this.error.dateErrorMessage = true;
                return false;
            }
            if(!this.start_date || !this.end_date){
                this.error.dateErrorMessage = true;
                return false;
            }
            if(this.start_date > this.end_date){
                this.error.dateErrorMessage = true;
                return false;
            }
            return true;
        },
        post:function(key,value){
            this.error.require = false;
            this.error.dateErrorMessage = false;
            if(!this.postConfirm()) return false;
            if(!this.postDateConfirm()) return false;
            this.showLoading = true;
            const formData = new FormData();
            formData.append('file',this.fileInfo);
            formData.append('name',this.name);
            formData.append('sub_title',this.sub_title);
            formData.append('note',this.note);
            formData.append('map_status',this.map_status);
            formData.append('start_date',this.start_date);
            formData.append('end_date',this.end_date);
            formData.append('address',this.address);
            formData.append('seminer_id',this.seminer_id);
            formData.append('template',this.template);
            formData.append('language1',this.language1);
            formData.append('language2',this.language2);
            let config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };
            axios.post("/admin/saveData", formData, config).then(response => {
                // 成功
                this.showLoading = false;
                this.showContent = false;
                if(this.seminer_id > 0){
                    alert("セミナー情報の更新をおこないました。");
                }else{
                    alert("セミナーの追加をおこないました。");
                }
                this.setLists();
            })
            .then(response => {
                console.log(response)
            })
            .catch(error => {
                // 失敗
                alert("error");
                console.log(error.response)
            });
        }
    }
};
</script>
