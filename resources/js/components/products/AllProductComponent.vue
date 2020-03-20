<template>
    <div class="container">
        <h1>Products</h1>
        <router-link :to="'/dashboard/products/add'"class="btn btn-success text-white">Add</router-link><br><br>
        <div v-if='productList.length > 0'>
                <table class="table">
                     <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="product in productList" :key="product.id">
                      <th scope="row">{{product.id}}</th>
                      <td>{{product.title}}</td>
                      <td><router-link :to="{name: 'ProductEdit', params: {id: product.id}}" class="btn btn-primary text-white">Edit</router-link></td>
                      <td><button class="btn btn-danger" @click="del(product.id)" >Delete</button></td>

                    </tr>
                  </tbody>
                </table>
        </div>
        <div v-else>Empty</div>
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
        methods: {
            del(id){
              productService.del(id)
              this.productList = this.productList.filter(e => {
                return e.id !== id
              })
            }

        },
        created: async function(){
            this.productList = await productService.getAll()
        },
        computed: {
            // ...mapGetters(['getUser', 'getToken', 'isLoggedIn'])
        }

    }
</script>

<style scoped>

</style>
