<template>
<div class="container">
    <div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="name">
        </div>
        <p class="text-danger err"></p>
        <button class="btn btn-success" @click="save">Save</button>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                name: ''
            }
        },
        methods: {
            save(){
                this.$store.dispatch('add', {title: this.name})
                .catch(function(err){
                    document.querySelector('.err').innerHTML = "The title field is required."
                })
            }

        }

    }
</script>

<style scoped>

</style>
