<template>
    <div class="container">
      <h1>BLOG</h1>
      <p>Lista post:</p>
  </div>
</template>

<script>

import axios from 'axios';

export default {
    name: 'Blog',
    data(){
        return{
            posts: []
        }
    },
    methods:{
        getPosts(){

           axios.get('http://127.0.0.1:8000/api/posts')
                .then(res => {
                    console.log(res.data.data);
                    this.posts = res.data.data;
                })
                .catch(err=>{
                    console.log(err);
                })
        }
    },
    created(){
        this.getPosts();
    }
}   
</script>

<style>

</style>