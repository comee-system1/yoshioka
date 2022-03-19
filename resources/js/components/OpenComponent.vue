<template>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 blog-main">
                <div class="blog-post mt-3" v-show="seminer.title.information.status == 1">
                    <h3 v-if="lang=='JP'">{{seminer.title.information.title}}</h3>
                    <h3 v-if="lang=='EN'">{{seminer.title.information.title2}}</h3>
                    <div v-for='info in seminer.information' v-bind:key="info.id" >
                    <p class="blog-post-meta">{{info.date}}</p>
                    <p class="h5" v-if="info.display_type == 'title'" v-html=info.title></p>
                    <p class="h5" v-if="info.display_type == 'note'" >
                        <a v-bind:href="'/open/'+seminer.id+'/'+seminer.open_key
                        +'/'+info.id+'/info'" v-html=info.title></a>
                    </p>
                    <p class="h5" v-if="info.display_type == 'link'">
                        <a v-bind:href="info.link" target=_blank v-html=info.title></a>
                    </p>
                    <p class="h5" v-if="info.display_type == 'file'"><a v-bind:href="'/storage/file/'+info.file" target=_blank v-html=info.title ></a></p>

                    <hr>
                    </div>
                </div>

                <div class="blog-post mt-3" >
                    <div v-show="seminer.title.date.status == 1">
                        <h3 v-if="lang=='JP'">{{seminer.title.date.title}}</h3>
                        <h3 v-if="lang=='EN'">{{seminer.title.date.title2}}</h3>
                        <p>{{seminer.st_op_date_format}}</p>
                    </div>
                    <div v-show="seminer.title.address.status == 1">
                        <p class="h4" v-if="lang=='JP'">{{seminer.title.address.title}}</p>
                        <p class="h4" v-if="lang=='EN'">{{seminer.title.address.title2}}</p>
                        <pre v-if="seminer.address && seminer.address != 'null'">{{ seminer.address }}</pre>
                    </div>
                    <div v-show="seminer.title.place.status == 1">
                        <p class="h4" v-if="lang=='JP'">{{seminer.title.place.title}}</p>
                        <p class="h4" v-if="lang=='EN'">{{seminer.title.place.title2}}</p>
                        <iframe v-bind:[attribute]="url" height="200" style="border:0;width:100%;" allowfullscreen="" loading="lazy" v-if="seminer.map_status"></iframe>
                    </div>
                </div>

                <div class="blog-post">
                    <div class="h4" v-if="lang=='JP'">{{seminer.title.sponser.title}}</div>
                    <div class="h4" v-if="lang=='EN'">{{seminer.title.sponser.title2}}</div>
                    <div class="row">
                        <div class="col-md-2  border border-1 border-light text-center" v-for="sponser in seminer.sponser" v-bind:key="sponser.id" >
                            <a v-bind:href="[sponser.link_type == 1 ?sponser.link:'/storage/sponser/'+sponser.link_file]" target=_blank class="h-100">
                            <img v-if="sponser.file_type==2" v-bind:src="'/storage/sponser/'+sponser.file" class="w-100 " />
                            <span v-if="sponser.file_type==1">{{sponser.file_text}}</span>
                            </a>
                        </div>
                    </div>
                </div><!-- /.blog-post -->


            </div><!-- /.blog-main -->
        </div><!-- /.row -->

    </main><!-- /.container -->
</template>
<script>
export default {
    props:['seminer', 'lang'],
    data(){
        return {
            isActive:true,
            infokey:0,
            attribute: 'src',
	        url: 'https://www.google.com/maps?output=embed&z=15&q='+this.seminer.address
        }
    },
    mounted:function(){

      //  console.log(this.$el)
    },
    methods:{
        addInfo:function(info_id){
            this.isActive = true;
            this.infokey = info_id;
        }
    }
}
</script>
