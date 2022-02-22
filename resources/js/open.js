/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios'
import VueAxios from 'vue-axios'
import Router from 'vue-router'


require('./bootstrap');

$(function(){
    $(".delete").on("click",function(){
        if(confirm($("#delete_check").val())){
            return true;
        }else{
            return false;
        }
    });
});
