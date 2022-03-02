<template>
    <div class="container ">
        <div class="position-fixed w-100 h-100 top-0 start-0 bg-secondary bg-opacity-75 zindex-100" v-show="showLoading">
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div class="spinner-border text-primary " style="width: 6rem; height: 6rem;" role="status">
                <span class="sr-only ">Loading...</span>
                </div>
            </div>
        </div>
        <shared-menu-component v-bind:id=id active="active5"></shared-menu-component>
        <div class="row mt-3">
            <div class="col-md-2">メール配信型</div>
            <div class="col-md-4">
                <select class="form-control" v-on:change="selectedItem">
                    <option v-for="(type, i ) in types" v-bind:value="i" :key="i">
                    {{ type }}
                    </option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">メールタイトル</div>
            <div class="col-md-4">
                <input type="text" class="form-control w-100" v-model="subject"  />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">メール本文</div>
            <div class="col-md-6">
                <textarea class="form-control w-100" v-model="body" rows=18 ></textarea>
            </div>
            <div class="col-md-4">
                <p>置き換え記号</p>
                <div class="row" v-for="replace of replaces[ 'endai' ]" :key="replace.id">
                    <div class="col-md-6">{{replace['title']}}</div>
                    <div class="col-md-6">##{{replace[ 'type' ]}}##</div>
                </div>
                <div class="row" v-for="replace of replaces[ 'join' ]" :key="replace.id">
                    <div class="col-md-6">{{replace['title']}}</div>
                    <div class="col-md-6">##{{replace[ 'type' ]}}##</div>
                </div>
                <div class="row" v-for="replace of replaces[ 'password_renew' ]" :key="replace.id">
                    <div class="col-md-6">{{replace['title']}}</div>
                    <div class="col-md-6">##{{replace[ 'type' ]}}##</div>
                </div>
                <div class="row" v-for="replace of replaces[ 'information' ]" :key="replace.id">
                    <div class="col-md-6">{{replace['title']}}</div>
                    <div class="col-md-6">##{{replace[ 'type' ]}}##</div>
                </div>
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
        this.getMailType();
        return {
            name:"マスター一覧",
            showLoading:true,
            subject:"",
            body:"",
            types:"",
            type:"join",
            replaces:"",
        }
    },
    methods: {
        selectedItem:function(e)
        {
            this.type = e.target.value;
            this.getMailReplace();
        },
        getMailType:function()
        {
            let postData = {};
            axios.get("/getMailType", postData).then(response => {
                // 成功
                this.types = response['data'];
                this.getMailReplace();
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        getMailReplace:function()
        {
            let postData = {};
            this.replace = "";
            this.showLoading = true;
            axios.get("/admin/master/getMailReplace/"+this.id+"/"+this.type, postData).then(response => {
                // 成功
                this.replaces = response['data'];
                this.showLoading = false;
                this.getMail();
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        getMail:function()
        {
            let postData = {};
            this.showLoading = true;
            axios.get("/admin/master/getMail/"+this.id+"/"+this.type, postData).then(response => {
                // 成功
                this.subject = response['data'][ 'subject' ];
                this.body = response['data'][ 'body' ];
                this.showLoading = false;
            }).catch(error => {
                // 失敗
                alert("error");
            });
        },
        edit:function()
        {
            let postData = {
                type:this.type,
                subject:this.subject,
                body:this.body
            };
            this.showLoading = true;
            axios.post("/admin/master/editMail/"+this.id, postData).then(response => {
                this.showLoading = false;
                alert("データの更新を行いました。");
            }).catch(error => {
                // 失敗
                alert("error");
            });
        }
    }
}
</script>
