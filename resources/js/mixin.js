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
            enhance:false
        };
    },
    methods: {
        menuclick: function () {
            this.enhance = !this.enhance
        },
        openModal: function () {
            this.showContent = !this.showContent

        },
        closeModal: function () {
            this.showContent = false
        }
    }
};
