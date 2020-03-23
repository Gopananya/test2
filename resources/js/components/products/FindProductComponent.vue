<template>
<div class="container">
     <div class="form-group col-md-3">
        <label>Enter date</label>
        <input type="date" class="form-control" name="" v-model="date" @change="search">
    </div>
        <div v-if='products.length > 0'>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Purchased Amount</th>
                    <th scope="col">Total Views</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <th scope="row">{{product.id}}</th>
                    <td>{{product.title}}</td>
                    <td>{{product.purchased_amount ? product.purchased_amount : 0}}</td>
                    <td>{{product.total_views ? product.total_views : 0 }}</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        name: 'FindProductComponent',
        data() {
            return {
                date: ''
            }
        },
        methods: {
            search(){
                if(this.date !== '') {find
                   this.$store.dispatch('find',this.date)
                   .catch(e => console.log(e));
                }
            }

        },
        computed: {
            ...mapGetters(['products'])
        }

    }
</script>

<style scoped>

</style>
