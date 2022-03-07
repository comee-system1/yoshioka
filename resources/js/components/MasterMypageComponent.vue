<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active8"></shared-menu-component>
        <div class="h4 mt-3">マイページ</div>
        <div class="row mt-3">
            <div class="col-md-2">項目名</div>
            <div class="col-md-2">表示</div>
            <div class="col-md-4"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">マイページ</div>
            <div class="col-md-1"><input type="checkbox" v-model="mypage_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="mypage"  />
                <textarea class="form-control w-100 mt-2" v-model="mypage_text" rows=4 ></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">参加情報更新</div>
            <div class="col-md-1"><input type="checkbox" v-model="join_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="join"  />
                <textarea class="form-control w-100 mt-2" v-model="join_text" rows=4 ></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">演題一覧</div>
            <div class="col-md-1"><input type="checkbox" v-model="endai_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="endai"  />
                <textarea class="form-control w-100 mt-2" v-model="endai_text" rows=4 ></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">請求書</div>
            <div class="col-md-1"><input type="checkbox" v-model="invoice_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="invoice"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">領収書</div>
            <div class="col-md-1"><input type="checkbox" v-model="recipe_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="recipe"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">プログラム</div>
            <div class="col-md-1"><input type="checkbox" v-model="program_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="program"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">資料一括DL</div>
            <div class="col-md-1"><input type="checkbox" v-model="download_status" /></div>
            <div class="col-md-8">
                <input type="text" class="form-control w-100" v-model="download"  />
            </div>
        </div>


        <div class="row mt-3">
            <button class="btn btn-primary w-25" v-on:click="edit" >更新</button>
        </div>

    </div>
</template>
<script>
export default {
    props:['id'],
    data(){
        this.getData();
        return {
            name:"マスター一覧",
            showLoading:true,
            mypage:"",
            mypage_status:"",
            mypage_text:"",
            join:"",
            join_status:"",
            join_text:"",
            endai:"",
            endai_status:"",
            endai_text:"",
            invoice:"",
            invoice_status:"",
        }
    },
    methods: {
        getData:function()
        {
            let postData = {};
            axios.get("/getMypage/"+this.id, postData).then(response => {
                // 成功
                response[ 'data' ].forEach(element => {
                    console.log(element);
                    if(element['type'] == "mypage"){
                        this.mypage = element.title;
                        this.mypage_status = Number(element.status);
                        this.mypage_text = element.text;
                    }
                    if(element['type'] == "join"){
                        this.join = element.title;
                        this.join_status = Number(element.status);
                        this.join_text = element.text;
                    }
                    if(element['type'] == "endai"){
                        this.endai = element.title;
                        this.endai_status = Number(element.status);
                        this.endai_text = element.text;
                    }
                    if(element['type'] == "invoice"){
                        this.invoice = element.title;
                        this.invoice_status = Number(element.status);
                    }
                    if(element['type'] == "recipe"){
                        this.recipe = element.title;
                        this.recipe_status = Number(element.status);
                    }
                    if(element['type'] == "program"){
                        this.program = element.title;
                        this.program_status = Number(element.status);
                    }
                    if(element['type'] == "download"){
                        this.download = element.title;
                        this.download_status = Number(element.status);
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
                mypage:this.mypage,
                mypage_status:this.mypage_status,
                mypage_text:this.mypage_text,
                join:this.join,
                join_status:this.join_status,
                join_text:this.join_text,
                endai:this.endai,
                endai_status:this.endai_status,
                endai_text:this.endai_text,
                invoice:this.invoice,
                invoice_status:this.invoice_status,
                recipe:this.recipe,
                recipe_status:this.recipe_status,
                program:this.program,
                program_status:this.program_status,
                download:this.download,
                download_status:this.download_status,
            };
            axios.post("/admin/master/mypage/edit/"+this.id, postData).then(response => {
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
