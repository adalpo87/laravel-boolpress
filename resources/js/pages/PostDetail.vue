
<template>
   <div>
         <div v-if="!loaded" class="text-center mt-5">
            <Loader />
     </div>      
          <div class="card mb-3">
             <div class="card-body">
                 <div class="d-flex justify-content-between"> 
                     <h5 class="card-title">{{ post.title }}</h5>
                     <span v-if="post.category" class="badge badge-dark custom-badge">{{post.category.name}}</span>
                 </div>
                 <i>{{ FormatDate.format(post.created_at) }}</i>
                 <p class="card-text">{{ post.content }}</p>
                  <div>
                 <i class="badge badge-success"
                 v-for="tag in post.tags"
                  :key="'t'+tag.id"
                  >{{ tag.name }}</i>
                 </div>
             </div>

         </div>
     </div>
</template>

<script>
import axios from 'axios';
import FormatDate from '../classes/FormatDate'
import Loader from '../components/Loader.vue'

export default {
    name: 'PostDetail',
    components:{
        Loader
    },
    data(){
        return{
            post:{},
            FormatDate,
            loaded : false
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/posts/'+this.$route.params.slug)
                .then(res => {
                    this.post = res.data.result;
                    if(res.data.success) {
                    this.post = res.data.result;
                    } else {
                        // redirect alla pagina 404
                        this.$router.push({ name: 'error404' })
                    }
                    this.loaded = true;
                })
                .catch(err => {
                    console.log(err);
                })
    }
}
</script>

<style lang="scss" scoped>
 i{
     display: inline-block;
     margin: 5px;
 }
</style>