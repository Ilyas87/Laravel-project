<template>
    <div>
        <button type="button" class="btn btn-primary w-100 border-0" @click="friendUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'friends'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function (){
            return {
                status: this.friends
            }
        },

        methods: {
            friendUser() {
                axios.post('/friends/' + this.userId)
                    .then(response => {
                        this.status = !this.status;
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? "Удалить с друзей" : 'Добавить в друзья';
            }
        }
    }
</script>
