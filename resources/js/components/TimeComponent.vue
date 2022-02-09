<template>
    <div class="container  p-3 ">
        <nav class="navbar navbar-dark bg-primary mb-2 text-white p-2">{{name}}設定</nav>

        <div class="row mt-2">
            <div class="col-md-3">
                <p class="m-0">日付選択</p>
                <select class="form-control" v-model="selected" >
                    <option v-for="item in selectItems" v-bind:key="item.key">{{item.date}}</option>
                </select>
            </div>
        </div>

        <div class="row mt-2">
            <p class="m-0">設定会場選択</p>
            <div class="col-2" v-for="placeList in placeLists" :key="placeList.id">
                <a v-bind:class="['btn btn-outline-success w-100 text-nowrap mt-1', active_id == placeList.master_id ? 'active' : '']" v-on:click="href(placeList.master_id)" ><small>{{ placeList.text }}</small></a>
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
                <tr v-for="n in 20" v-bind:key="n" >
                    <td class="text-center">
                        <input type="checkbox"  v-model="$data['enabled' + n]" />
                    </td>
                    <td class="w-25">
                        <div class="row">
                            <div class="col-12">
                                <input type="time" v-model="$data['start_time' + n]" class="form-control" />
                            </div>
                            <div class="col-12 mt-1">
                                <input type="time" v-model="$data['end_time' + n]" class="form-control" />
                            </div>
                        </div>
                    </td>
                    <td class="w-25">
                        <select  v-model="$data['account_name' + n]" class="js-attachSelect2 selectpos w-100" >
                            <option value="" >選択・自由入力可</option>
                            <option value="" >佐藤太郎1</option>
                            <option value="" >佐藤太郎2</option>
                            <option value="" >佐藤太郎3</option>
                            <option value="" >佐藤太郎4</option>
                            <option value="" >佐藤太郎5</option>

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
    props:['id'],
    data(){
        this.dateListData();
        return {
            name: "タイムテーブル",
            placeLists: '',
            active1: true,
            active0: false,
            program_url:true,
            display_show:true,
            button_show:true,
            filtertable:false,
            active_id:'1',
            selectItems:[],
            selected:'',
            programLists:[],
            enabled1:false,
            enabled2:false,
            enabled3:false,
            enabled4:false,
            enabled5:false,
            enabled6:false,
            enabled7:false,
            enabled8:false,
            enabled9:false,
            enabled10:false,
            enabled11:false,
            enabled12:false,
            enabled13:false,
            enabled14:false,
            enabled15:false,
            enabled16:false,
            enabled17:false,
            enabled18:false,
            enabled19:false,
            enabled20:false,
            start_time1:false,
            start_time2:false,
            start_time3:false,
            start_time4:false,
            start_time5:false,
            start_time6:false,
            start_time7:false,
            start_time8:false,
            start_time9:false,
            start_time10:false,
            start_time11:false,
            start_time12:false,
            start_time13:false,
            start_time14:false,
            start_time15:false,
            start_time16:false,
            start_time17:false,
            start_time18:false,
            start_time19:false,
            start_time20:false,
            end_time1:false,
            end_time2:false,
            end_time3:false,
            end_time4:false,
            end_time5:false,
            end_time6:false,
            end_time7:false,
            end_time8:false,
            end_time9:false,
            end_time10:false,
            end_time11:false,
            end_time12:false,
            end_time13:false,
            end_time14:false,
            end_time15:false,
            end_time16:false,
            end_time17:false,
            end_time18:false,
            end_time19:false,
            end_time20:false,
            account_name1:'',
            account_name2:'',
            account_name3:'',
            account_name4:'',
            account_name5:'',
            account_name6:'',
            account_name7:'',
            account_name8:'',
            account_name9:'',
            account_name10:'',
            account_name11:'',
            account_name12:'',
            account_name13:'',
            account_name14:'',
            account_name15:'',
            account_name16:'',
            account_name17:'',
            account_name18:'',
            account_name19:'',
            account_name20:'',
        };
    },
    methods: {
        href:function(key){
            this.active_id = key;
        },
        //日付
        dateListData:function()
        {
            let postData = {};
            axios.get("/getDateLists/"+this.id, postData).then(response => {
                // 成功
                this.selectItems = response['data'];
                this.selected = response['data'][0]['date'];
                this.placeListsData();
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        //会場取得
        placeListsData:function(){
            let postData = {};
            axios.post("/getPlaceLists/"+this.id, postData).then(response => {
                // 成功
                this.placeLists = response['data'];
                this.timetableData();
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        //タイムテーブル
        timetableData:function(){
            let postData = {
                seminer_id:this.id,
                place_master_id:this.active_id,
                date:this.selected
            };
            axios.post("/admin/getTimeTable", postData).then(response => {
                // 成功
               this.programLists = response['data'];
               this.checkedList();
               this.starttimeList();
               this.endtimeList();
               this.accountNameList();

            }).catch(error => {
                // 失敗
                alert("errorw");
            });
        },
        checkedList:function(){
            this.enabled1 = this.programLists[0][ 'enabled' ];
            this.enabled2 = this.programLists[1][ 'enabled' ];
            this.enabled3 = this.programLists[2][ 'enabled' ];
            this.enabled4 = this.programLists[3][ 'enabled' ];
            this.enabled5 = this.programLists[4][ 'enabled' ];
            this.enabled6 = this.programLists[5][ 'enabled' ];
            this.enabled7 = this.programLists[6][ 'enabled' ];
            this.enabled8 = this.programLists[7][ 'enabled' ];
            this.enabled9 = this.programLists[8][ 'enabled' ];
            this.enabled10 = this.programLists[9][ 'enabled' ];
            this.enabled11 = this.programLists[10][ 'enabled' ];
            this.enabled12 = this.programLists[11][ 'enabled' ];
            this.enabled13 = this.programLists[12][ 'enabled' ];
            this.enabled14 = this.programLists[13][ 'enabled' ];
            this.enabled15 = this.programLists[14][ 'enabled' ];
            this.enabled16 = this.programLists[15][ 'enabled' ];
            this.enabled17 = this.programLists[16][ 'enabled' ];
            this.enabled18 = this.programLists[17][ 'enabled' ];
            this.enabled19 = this.programLists[18][ 'enabled' ];
            this.enabled20 = this.programLists[19][ 'enabled' ];
        },
        starttimeList:function(){
            this.start_time1 = this.programLists[0][ 'start_time' ];
            this.start_time2 = this.programLists[1][ 'start_time' ];
            this.start_time3 = this.programLists[2][ 'start_time' ];
            this.start_time4 = this.programLists[3][ 'start_time' ];
            this.start_time5 = this.programLists[4][ 'start_time' ];
            this.start_time6 = this.programLists[5][ 'start_time' ];
            this.start_time7 = this.programLists[6][ 'start_time' ];
            this.start_time8 = this.programLists[7][ 'start_time' ];
            this.start_time9 = this.programLists[8][ 'start_time' ];
            this.start_time10 = this.programLists[9][ 'start_time' ];
            this.start_time11 = this.programLists[10][ 'start_time' ];
            this.start_time12 = this.programLists[11][ 'start_time' ];
            this.start_time13 = this.programLists[12][ 'start_time' ];
            this.start_time14 = this.programLists[13][ 'start_time' ];
            this.start_time15 = this.programLists[14][ 'start_time' ];
            this.start_time16 = this.programLists[15][ 'start_time' ];
            this.start_time17 = this.programLists[16][ 'start_time' ];
            this.start_time18 = this.programLists[17][ 'start_time' ];
            this.start_time19 = this.programLists[18][ 'start_time' ];
            this.start_time20 = this.programLists[19][ 'start_time' ];
        },
        endtimeList:function(){
            this.end_time1 = this.programLists[0][ 'end_time' ];
            this.end_time2 = this.programLists[1][ 'end_time' ];
            this.end_time3 = this.programLists[2][ 'end_time' ];
            this.end_time4 = this.programLists[3][ 'end_time' ];
            this.end_time5 = this.programLists[4][ 'end_time' ];
            this.end_time6 = this.programLists[5][ 'end_time' ];
            this.end_time7 = this.programLists[6][ 'end_time' ];
            this.end_time8 = this.programLists[7][ 'end_time' ];
            this.end_time9 = this.programLists[8][ 'end_time' ];
            this.end_time10 = this.programLists[9][ 'end_time' ];
            this.end_time11 = this.programLists[10][ 'end_time' ];
            this.end_time12 = this.programLists[11][ 'end_time' ];
            this.end_time13 = this.programLists[12][ 'end_time' ];
            this.end_time14 = this.programLists[13][ 'end_time' ];
            this.end_time15 = this.programLists[14][ 'end_time' ];
            this.end_time16 = this.programLists[15][ 'end_time' ];
            this.end_time17 = this.programLists[16][ 'end_time' ];
            this.end_time18 = this.programLists[17][ 'end_time' ];
            this.end_time19 = this.programLists[18][ 'end_time' ];
            this.end_time20 = this.programLists[19][ 'end_time' ];
        },
        accountNameList:function(){
            this.account_name1 = this.programLists[0][ 'account_name' ];
            this.account_name2 = this.programLists[1][ 'account_name' ];
            this.account_name3 = this.programLists[2][ 'account_name' ];
            this.account_name4 = this.programLists[3][ 'account_name' ];
            this.account_name5 = this.programLists[4][ 'account_name' ];
            this.account_name6 = this.programLists[5][ 'account_name' ];
            this.account_name7 = this.programLists[6][ 'account_name' ];
            this.account_name8 = this.programLists[7][ 'account_name' ];
            this.account_name9 = this.programLists[8][ 'account_name' ];
            this.account_name10 = this.programLists[9][ 'account_name' ];
            this.account_name11 = this.programLists[10][ 'account_name' ];
            this.account_name12 = this.programLists[11][ 'account_name' ];
            this.account_name13 = this.programLists[12][ 'account_name' ];
            this.account_name14 = this.programLists[13][ 'account_name' ];
            this.account_name15 = this.programLists[14][ 'account_name' ];
            this.account_name16 = this.programLists[15][ 'account_name' ];
            this.account_name17 = this.programLists[16][ 'account_name' ];
            this.account_name18 = this.programLists[17][ 'account_name' ];
            this.account_name19 = this.programLists[18][ 'account_name' ];
            this.account_name20 = this.programLists[19][ 'account_name' ];
        },
        //表示/非表示
        able:function(type){
            this.active1 = false;
            this.active0 = false;
            if (type == 1) this.active1 = true;
            if (type == 0) this.active0 = true;
        },
        program:function(){
            this.display_show = false;
         //   this.filtertable = false;
            this.button_show = false;
         //   this.program_url = true;
            this.timetableData();
        },
        back:function(){

            this.display_show = true;
          //  this.filtertable = true;
            this.button_show = true;
         //   this.program_url = false;

        },
    }
}
</script>
