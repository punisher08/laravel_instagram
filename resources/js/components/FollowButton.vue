<template>
    <div >
    <button class="btn btn-primary"  @click="FollowUser"  >{{buttonText}}  </button>
    
    </div>
</template>

<script>
    export default{
    props: ['userid','follow'],
    mounted() {
        console.log('Component mounted.')
        this.status = this.follow;
    },
     data: function(){
         return {
             status: '' ,
            
         }
     },
    methods: {
        FollowUser(){
            axios.post('follow/' + this.userid)
                .then(response => {
                    // console.log(res.data);
                    this.status = !this.status;
                    console.log(this.status)
                })
                .catch(errors => {
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });

        }
    },
    computed:{
        buttonText(){

            // return (this.status.toString() == "true") ? 'UnFollow' : 'Follow'
            return (this.status) ? 'UnFollow' : 'Follow'
        }
    },
}
</script>
