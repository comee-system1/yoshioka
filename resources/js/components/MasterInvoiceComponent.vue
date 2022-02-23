<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active6"></shared-menu-component>
        <div class="row mt-3">
            <div class="col-md-2">請求書タイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="invoice"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">領収書タイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="receipt"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">お振込先項目名</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="payee"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">金額項目名</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="bill"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">敬称</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="honor"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">領収書メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="recipe_message"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">請求書メッセージ</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="invoice_message"  />
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
            invoice:"",
            receipt:"",
            payee:"",
            bill:"",
            honor:"",
            recipe_message:"",
            invoice_message:"",
        }
    },
    methods: {
        getData:function()
        {
            let postData = {};
            axios.get("/admin/master/defineInvoice/"+this.id, postData).then(response => {
                // 成功
                response[ 'data' ].forEach(element => {
                    console.log(element);
                    if(element['type'] == "invoice") this.invoice = element[ 'title' ];
                    if(element['type'] == "receipt") this.receipt = element[ 'title' ];
                    if(element['type'] == "payee") this.payee = element[ 'title' ];
                    if(element['type'] == "bill") this.bill = element[ 'title' ];
                    if(element['type'] == "honor") this.honor = element[ 'title' ];
                    if(element['type'] == "recipe_message") this.recipe_message = element[ 'title' ];
                    if(element['type'] == "invoice_message") this.invoice_message = element[ 'title' ];
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
                invoice:this.invoice,
                receipt:this.receipt,
                payee:this.payee,
                bill:this.bill,
                honor:this.honor,
                recipe_message:this.recipe_message,
                invoice_message:this.invoice_message,
            };
            axios.post("/admin/master/defineEditInvoice/"+this.id, postData).then(response => {
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
