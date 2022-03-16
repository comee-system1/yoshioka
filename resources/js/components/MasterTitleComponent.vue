<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active7" urlcode="/title/" ></shared-menu-component>
        <div class="h4 mt-3">トップページ</div>
        <div class="row mt-3">
            <div class="col-md-2">項目名</div>
            <div class="col-md-2">表示</div>
            <div class="col-md-4"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">お知らせタイトル</div>
            <div class="col-md-1"><input type="checkbox" v-model="information_status" /></div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="information"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">開催日時・場所</div>
            <div class="col-md-1"><input type="checkbox" v-model="date_status" /></div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="date"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">住所</div>
            <div class="col-md-1"><input type="checkbox" v-model="address_status" /></div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="address"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">場所</div>
            <div class="col-md-1"><input type="checkbox" v-model="place_status" /></div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="place"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">協賛企業</div>
            <div class="col-md-1"><input type="checkbox" v-model="sponser_status" /></div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="sponser"  />
            </div>
        </div>

        <div class="row mt-3">
            <button class="btn btn-primary w-25" v-on:click="edit" >更新</button>
        </div>

    </div>
</template>
<script>
export default {
    props:['id', 'lang'],
    data(){
        this.getData();
        return {
            name:"マスター一覧",
            showLoading:true,
            information:"",
            information_status:"",
            date:"",
            date_status:"",
            address:"",
            address_status:"",
            place:"",
            place_status:"",
            sponser:"",
            sponser_status:"",

        }
    },
    methods: {
        getData:function()
        {
            let postData = {};
            axios.get("/getTitle/"+this.id, postData).then(response => {
                // 成功
                response[ 'data' ].forEach(element => {
                    if(element['type'] == "information"){
                        this.information = (this.lang==2)?element.title2:element.title;
                        this.information_status = Number(element.status);
                    }
                    if(element['type'] == "date"){
                        this.date = (this.lang==2)?element.title2:element.title;
                        this.date_status = Number(element.status);
                    }
                    if(element['type'] == "address"){
                        this.address = (this.lang==2)?element.title2:element.title;
                        this.address_status = Number(element.status);
                    }
                    if(element['type'] == "place"){
                        this.place = (this.lang==2)?element.title2:element.title;
                        this.place_status = Number(element.status);
                    }
                    if(element['type'] == "sponser"){
                        this.sponser = (this.lang==2)?element.title2:element.title;
                        this.sponser_status = Number(element.status);
                    }

                });
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        edit:function()
        {
            this.showLoading = true;
            let postData = {
                lang:this.lang,
                information:this.information,
                information_status:this.information_status,
                date:this.date,
                date_status:this.date_status,
                address:this.address,
                address_status:this.address_status,
                place:this.place,
                place_status:this.place_status,
                sponser:this.sponser,
                sponser_status:this.sponser_status
            };
            axios.post("/admin/master/title/edit/"+this.id, postData).then(response => {
                // 成功
                alert("データの更新を行いました");
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
}
</script>
