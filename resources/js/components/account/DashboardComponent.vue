<template>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        name: 'DashboardComponent',
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

</style>
