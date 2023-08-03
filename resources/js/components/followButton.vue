<template>
    <div>
       <button class="btn btn-primary" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>



    export default {

        props: ['userId','follows'],

        data: function(){
            return{
                status:this.follows,
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods:{
          followUser(){
           axios.post('/follow/'+this.userId).then((response) => {
            this.status = !this.status
           })
           .catch(errors=>{
            if (errors.response.status==401){
                window.location='/login';
            }
           })
          }
        },

        computed:{
            buttonText(){
            return (this.status) ? 'Unfollow' :'follow';
            }
        }


    }
</script>
