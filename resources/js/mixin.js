/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

export const Mixin =  {
    created:function () {
    },
    data() {

        return {
            showContent: false,
            template:0,
            loginType:0,
        };
    },
    methods: {
        menuclick: function (key) {
            if(this.loginType == key){
                this.loginType = 0;
            } else {
                this.loginType = key;
            }
        },
        openModal: function (key = 0,template = 0 ) {
            var today = new Date();
            var year = today.getFullYear();
            var month = ("0" + (today.getMonth()+1)).slice(-2);
            var day = ("0" + today.getDate()).slice(-2);
            var hour = ("0" + today.getHours()).slice(-2);
            var min = ("0" + today.getMinutes()).slice(-2);
            var start_date = year+"-"+month+"-"+day+"T"+hour+":"+min;

            today.setDate(today.getDate() + 1)
            year = today.getFullYear();
            month = ("0" + (today.getMonth()+1)).slice(-2);
            day = ("0" + today.getDate()).slice(-2);
            hour = ("0" + today.getHours()).slice(-2);
            min = ("0" + today.getMinutes()).slice(-2);
            var end_date = year+"-"+month+"-"+day+"T"+hour+":"+min;

            this.template = template;
            this.url = "";
            this.name = "";
            this.sub_title = "";
            this.note = "";
            this.address = "";
            this.map_status = 0;
            this.start_date = start_date;
            this.end_date = end_date;
            this.seminer_id = 0;
            if(key > 0 ){
                this.showLoading = true;
                var url = '/admin/getEditData/'+key;
                axios.get(url).then(response =>{
                    if(response.data[0].image){
                        this.url = "/storage/open/"+response.data[0].image;
                    }else{
                        this.url = "";
                    }
                    this.template = response.data[0].template
                    this.language1 = response.data[0].language1
                    this.language2 = response.data[0].language2
                    this.name = response.data[0].name
                    this.sub_title = response.data[0].sub_title
                    this.note = response.data[0].note
                    this.address = response.data[0].address
                    this.map_status = response.data[0].map_status
                    this.start_date = response.data[0].st_date_format
                    this.end_date = response.data[0].ed_date_format
                    this.showLoading = false
                    this.seminer_id = key
                })
            }
            this.showContent = !this.showContent;
        },
        closeModal: function () {
            this.showContent = false
        }
    }
};
