<template>
    <section id="main">

        <header v-for="(user, index) in users" :key="user.id">
            <span class="avatar"><img :src="'/images/users/'+user.id+'.jpg'" alt="" /></span>
            <h1>{{ user.name }}</h1>
            <div v-if="user.comments">
                <p><a :href="'/user/'+user.id">{{ user.comments.length }} Comment(s)</a></p>
            </div>
        </header>

    </section>
</template>

<script>
    export default {
        data(){
          return {
              users: []
          }
        },
        methods: {
            getUsers(){
                axios.get('/api/users/')
                    .then((response) => {
                        if(response.data.success === true){
                            console.log(response.data.users);
                            this.users = response.data.users;
                        }else{
                            console.log(response.data.message);
                        }
                    }).catch((error) => {
                    console.log(error);
                }).finally(() => {
                    this.loading = false;
                });
            },
        },

        mounted(){
            this.getUsers();
        }
    }
</script>

<style scoped>

</style>
