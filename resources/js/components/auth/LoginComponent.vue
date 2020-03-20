<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form @submit.prevent='onSubmit'>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">name</label>

                            <div class="col-md-6">
                                <input id="name" v-model='name' type="text" class="form-control" value="" required autocomplete="name" autofocus>
                                <span class="error" role="alert"  v-if="error">
                                    <strong>user not found</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        data() {
            return {
                name: 'User_1',
                error: false
            }
        },
        methods: {
            onSubmit() {
                this.$store.dispatch('login', {name:this.name})
                .catch(e => this.error = true)
            },

        },
        computed: {
            ...mapGetters(['getUser', 'getToken', 'isLoggedIn'])
        }

    }
</script>

<style scoped>
    .container{
        margin-top: 20px!important;
    }
    .error{
        width: 100%;
        margin-top: 0.5rem;
        font-size: 80%;
        color: #e3342f;
    }
</style>
