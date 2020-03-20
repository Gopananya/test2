<template>
<div class="container">
    <h1>Percentage</h1>
    <div v-if='productList.length > 0'>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Purchased Amount</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="product in productList" :key="product.id">
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
    import * as productService from '../../services/productService.js'
    export default {

       data() {
            return {
                productList: []
            }
        },
        
        created: async function(){
            this.productList = await productService.percentage()
            console.log(this.productList)
        }

    }
</script>

<style scoped>

</style>
