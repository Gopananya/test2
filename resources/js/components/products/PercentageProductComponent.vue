<template>
<div class="container">
    <h1>Percentage</h1>
    <div v-if='percentage.length > 0'>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Purchased Amount</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="product in percentage" :key="product.id">
                    <th scope="row">{{product.id}}</th>
                    <td>{{product.title}}</td>
                    <td>{{product.percentage ? product.percentage : '0%'}}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {

       created(){
            this.$store.dispatch('percentage')
                .catch(e => console.log(e))
        },
        computed: {
            ...mapGetters(['percentage'])
        }

    }
</script>

<style scoped>

</style>
