<template>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 blog-main">
                <div class="blog-post mt-3" v-show="seminer.title.information.status == 1">
                    <h3>{{seminer.title.information.title}}</h3>
                    <div v-for='info in seminer.information' v-bind:key="info.id" >
                    <p class="blog-post-meta">{{info.date}}</p>
                    <p class="h5">{{info.title}}</p>
                    <!-- <pre v-bind:class="{ info_text: isActive }" >{{info.note}}</pre> -->
                    <pre v-bind:class="[ isActive === true && infokey !== info.id ? 'info_text' : '' ]" >{{info.note}}</pre>
                    【<a v-on:click="addInfo(info.id)">＋</a>】
                    <hr>
                    </div>
                </div>

                <div class="blog-post mt-3" >
                    <div v-show="seminer.title.date.status == 1">
                        <h3>{{seminer.title.date.title}}</h3>
                        <p>{{seminer.st_op_date_format}}</p>
                    </div>
                    <div v-show="seminer.title.address.status == 1">
                        <p class="h4">{{seminer.title.address.title}}</p>
                        <p>{{seminer.address}}</p>
                    </div>
                    <div v-show="seminer.title.place.status == 1">
                        <p class="h4">{{seminer.title.place.title}}</p>
                        <iframe v-bind:[attribute]="url" height="200" style="border:0;width:100%;" allowfullscreen="" loading="lazy" v-if="seminer.map_status"></iframe>
                    </div>
                </div>

                <div class="blog-post">
                    <h2 class="blog-post-title">{{seminer.title.sponser.title}}</h2>
                    <div class="row">
                        <div class="col-md-2" v-for="sponser in seminer.sponser" v-bind:key="sponser.id" >
                            <a v-bind:href="[sponser.link_type == 1 ?sponser.link:'/storage/sponser/'+sponser.link_file]" target=_blank><img v-bind:src="'/storage/sponser/'+sponser.file" class="w-100" /></a>
                        </div>
                    </div>
                </div><!-- /.blog-post -->


            </div><!-- /.blog-main -->
        </div><!-- /.row -->

    </main><!-- /.container -->
</template>
<script>
export default {
    props:['seminer'],
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
