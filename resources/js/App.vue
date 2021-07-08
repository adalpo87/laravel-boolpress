<template>
        
    <main class="container">
        <Header />
        <!-- qui inseriamo le nostre pages -->
        <!-- tag view che riceve tutti i componenti iniettati da routes.js -->
        <router-view></router-view>


    </main>
</template>

<script>

import Header from './components/Header.vue'

export default {
    name: 'App',
    components: {
       Header
    }
}
</script>

<style lang="scss">
@import "../sass/frontoffice/global";


</style>