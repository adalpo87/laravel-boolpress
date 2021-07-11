<template>
    <div class="container">
      <h1>BLOG</h1>

        <div 
        v-if="!loaded"
         class="text-center mt-5">
            <Loader />
        </div>
     <div
     v-if="loaded"
     >
     <Card 
     v-for="post in posts"
      :key="'p'+ post.id"
      :title="post.title"
      :category="post.category"
      :date="formatDate(post.date)"
      :content="post.content"
      :slug="post.slug"
     />
      
     </div>

    <!-- PAGINAZIONE -->

    <div v-if="loaded">
        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li 
    :class="{'disabled': pagination.current === 1}"
    class="page-item">
        <button
        @click="getPosts(pagination.current -1)"
         class="page-link" href="#">Previous</button> 
        <!-- non abbiamo bisogno di un link, ma di un modo per richiamare la funzione, quindi button -->
    </li>

    <li
        v-for="i in pagination.last"
        :key="'i'+i"
        :class="{'active' : pagination.current === i}"
        class="page-item">
      <button
      @click="getPosts(i)"
      class="page-link">{{ i }}
      </button>
    </li>

    
    <li 
    :class="{'disabled': pagination.current === pagination.last}"
    class="page-item">
        <button
        @click="getPosts(pagination.current +1)"
         class="page-link" href="#">Next</button> 
    </li>
  </ul>
</nav>
    </div>

 
  </div>
</template>

<script>

import axios from 'axios';
import Loader from '../components/Loader.vue';
import Card from '../components/Card.vue'

export default {
    name: 'Blog',
    components:{
        Loader,
        Card
    },
    data(){
        return{
            posts: [],
            pagination: [],
            loaded: false

        }
    },
    methods:{
        getPosts(page = 1){ //di base mi carica la pagina 1, poi sotto con params gli posso definire la pagina
            this.loaded= false;
           axios.get('http://127.0.0.1:8000/api/posts', {
               params:{
                   page: page
               }
           })
                .then(res => {
                    console.log(res.data.data);
                    this.posts = res.data.data;
                    this.pagination ={
                        current: res.data.current_page,
                        last: res.data.last_page
                    }
                    this.loaded= true
                })
                .catch(err=>{
                    console.log(err);
                })
        },
        formatDate(date){
            let d = new Date(date); //ottengo la data dei post dal api
            let dy = d.getDate(); //gli passo la data e mi restituisce i giorni
            let m = d.getMonth() + 1; //gli passo la data e mi restituisce i mesi da 0 a 11, per questo gli mettiamo +1
            let y = d.getFullYear(); //gli passo la data e mi restituisce l anno per intero
            if (dy < 10) dy = '0'+dy;
            if (m < 10) m = '0'+m;
            return `${dy}/${m}/${y}`;
        }
    },
    created(){
        this.getPosts();
    }
}   
</script>

<style lang="scss" scoped>
    .custom-badge{
    display: inline-block;
    height: 2rem;
    line-height: 2rem;
}


</style>