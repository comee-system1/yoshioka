<template>
    <main role="main" class="container">
        <h1 class="h3 mb-3 font-weight-normal mt-3">{{name.title}}</h1>
        <div class="row mt-3">
            <div class="col-3">
                <select class="form-control" v-model="selectedItem">
                    <option v-for="day of name.daylist" :key="day.key">{{day.date}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-2" v-for="spaceList of name.place" :key="spaceList.id">
                <a @click="onPage(spaceList.master_id)" v-bind:class="['btn btn-outline-success w-100 text-nowrap mt-1', spaceList.master_id == name.place_master_id ? 'active' : '' ]"><small>{{ spaceList.text }}</small></a>
            </div>
        </div><!-- /.row -->

        <div class="row mt-3">
            <div class="col-6">
                <a v-show="webenable" v-bind:href="name.timetables.weburl" class="btn btn-danger" target=_blank>{{name.button}}</a>
            </div>
        </div>

        <div class="row mt-3">
            <table class="table table-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col" class="text-center">{{name.definetime.td1.title}}</th>
                        <th scope="col" class="text-center">{{name.definetime.td2.title}}</th>
                        <th scope="col" class="text-center">{{name.definetime.td3.title}}</th>
                        <th scope="col" class="text-center w-50">{{name.definetime.td4.title}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data in name.timetable_programes " :key="data.key">
                        <td>{{data.start_time}}～<br />{{data.end_time}}</td>
                        <td>
                            {{data.account_name}}
                            {{data.accountName}}

                        </td>
                        <td>{{data.endai_name}}</td>
                        <td class="text-center">
                            <a v-bind:href="'/storage/file/'+data.file1" class="btn btn-outline-primary" v-show="data.file1_name" target=_blank>{{data.file1_name}}</a>
                            <a v-bind:href="'/storage/file/'+data.file2" class="btn btn-outline-primary" v-show="data.file2_name" target=_blank>{{data.file2_name}}</a>
                            <a v-bind:href="'/storage/file/'+data.file3" class="btn btn-outline-primary" v-show="data.file3_name" target=_blank>{{data.file3_name}}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main><!-- /.container -->
</template>
<script>
export default {
    props:[
        'data',
    ],
    data(){
        return {
            name: this.data,
            selectedItem: this.data.day,
            webenable:this.data.timetables.enabled
        }
    },

    methods: {
        onPage:function(master_id){
            let link = '/open/'+this.name.id+'/'+this.name.uniqcode+'/program/'+master_id+"?date="+this.selectedItem;
            location.href = link;
        }
    }
}
</script>
