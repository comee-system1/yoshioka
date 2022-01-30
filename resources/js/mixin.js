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
            loginType:0,
        };
    },
    methods: {
        menuclick: function (key) {
            this.loginType = key;
            //this.enhance = !this.enhance
        },
        openModal: function () {
            this.showContent = !this.showContent

        },
        closeModal: function () {
            this.showContent = false
        }
    }
};
