<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active4"></shared-menu-component>
        <div class="row mt-3">
            <div class="col-md-2">タイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="title"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">説明文</div>
            <div class="col-md-8">
                <textarea class="form-control w-100" v-model="explain" rows=8 ></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">リンク名</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="button"  />
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
            title:"",
            explain:"",
            button:"",
        }
    },
    methods: {
        getData:function()
        {
            let postData = {};
            axios.get("/admin/master/defineBook/"+this.id, postData).then(response => {
                // 成功

                response[ 'data' ].forEach(element => {
                    if(element['type'] == "title") this.title = element[ 'text' ];
                    if(element['type'] == "explain") this.explain = element[ 'text' ];
                    if(element['type'] == "button") this.button = element[ 'text' ];
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
                title:this.title,
                explain:this.explain,
                button:this.button,
            };
            axios.post("/admin/master/defineEditBook/"+this.id, postData).then(response => {
                // 成功
                console.log(response);
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
