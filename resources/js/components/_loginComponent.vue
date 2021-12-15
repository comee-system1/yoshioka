<template>
    <div class="hello">
        <h1>{{ msg }}</h1>
        <button v-on:click="toggle">toggle</button>
        <h2 v-show="showText">表示項目</h2>

        <input type="text" name="text" v-model="count" />
        <h3>現在の文字数:{{ charaCount }}</h3>
    </div>
</template>

<script>

export default{
    name: 'HelloWorld',
    data(){
        return {
            msg: 'welcome to your vue.js App',
            showText: false,
            count: ''
        }
    }
    ,methods: {
        toggle: function(){
            this.showText = !this.showText
        }
    }
    ,computed: {
        charaCount: function(){
            return this.count.length
        }
    }
}
</script>

<style scoped>

</style>
