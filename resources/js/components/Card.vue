<template>
  <div>
          <div class="card mb-3">
             <div class="card-body">
                 <div class="d-flex justify-content-between"> 
                     <h5 class="card-title">{{ title }}</h5>
                     <span class="badge badge-dark custom-badge">{{category}}</span>
                 </div>
                 <i>{{ date }}</i>
                 <p class="card-text">{{ truncateText }}</p>
                 
                 <router-link class="btn btn-primary" :to="{name: 'detail', params:{slug}}">Vedi post</router-link>
             </div>

         </div>
     </div>
</template>

<script>
export default {
    name: 'Card',
    props:['title','content','date','category','slug'],
    data(){
        return{
            maxLengthText: 150
        }
    },
    computed:{
        truncateText(){
            let text = this.content;
            if(text.length > this.maxLengthText){
                text = text.substr(0, this.maxLengthText) + '...';
            }
            return text;
        }
    }
}
</script>

<style>

</style>