<template>

    <section id="main">
        <header>
            <span class="avatar"><img :src="'/images/users/'+user.id+'.jpg'" alt="" /></span>
            <h1>{{ user.name }}</h1>
            <div v-if="comment">
                <button @click="comment = false">Hide Comment</button><br>
                <i v-for="(error, index) in errors" :key="index">
                    {{ error.toString() }}<br>
                </i>
                <i v-if="submitted">
                    Submitted
                </i>
                <form @submit.prevent="addComment">
                    <input type="password" v-model="form.password" placeholder="Password">
                    <input type="text" v-model="form.comments" placeholder="Comment">
                    <input :disabled="loading" type="submit" value="submit">
                </form>
                <i v-if="loading" class="text-center text-danger">submitting......</i>
            </div>
            <button v-else @click="comment = true">Add Comment</button><br>
            <div v-if="user.comments">
                <p><strong>Comments</strong></p>
                <span v-for="(comment, index) in user.comments.split('|')" :key="index">
                    {{ comment }}<br><hr>
                </span>
            </div>
        </header>
    </section>

</template>

<script>
    export default {
        props: {
            user_id: Number
        },
        data(){
          return {
              form: {
                    password: '',
                    comments: ''
                },
              comment: false,
              errors: [],
              loading: false,
              submitted: false,
              user: {}
          }
        },
        methods: {
            addComment(){
                this.submitted = false;
                this.loading = true;
                this.errors = [];
                console.log(this.form);
                axios.put('/api/user/'+this.user.id+'/comment', this.form)
                    .then((response) => {
                        if(response.data.success === true){
                            console.log(response.data.user);
                            this.submitted = true;
                            //Iterate and clear all fields
                            let self = this;
                            Object.keys(this.form).forEach(function(value,index) {
                                self.form[value] = '';
                            });
                            this.getUserComments(); // update comments
                        }else{
                            this.errors = response.data.errors;
                        }
                        console.log(response.data.errors);
                    }).catch((error) => {
                    console.log(error);
                }).finally(() => {
                    this.loading = false;
                });
            },

            getUserComments(){
                axios.get('/api/user/'+this.user_id+'/comments')
                    .then((response) => {
                        if(response.data.success === true){
                            console.log(response.data.user);
                            this.user = response.data.user;
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
            this.getUserComments();
        }
    }
</script>

<style scoped>

</style>
