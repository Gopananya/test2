<template>
<div class="container">
    <div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="title">
        </div>
        <p class="text-danger err"></p>
        <button class="btn btn-success" @click="save">Edit</button>
    </div>
</div>
</template>

<script>
    import * as productService from '../../services/productService.js'
    export default {
        data() {
            return {
                id: this.$route.params.id,
                title: ''
            }
        },
        methods: {
            save(){
                console.log(this.title)
                this.$store.dispatch('edit', [{title: this.title}, this.id])
                .catch(function(err){
                    document.querySelector('.err').innerHTML = "The title field is required."
                })
            }

        },
        created: async function(){
            let result = await productService.getById(this.id);
            this.title = result.title;
        }

    }
</script>

<style scoped>

</style>
