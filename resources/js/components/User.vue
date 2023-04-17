<template>
    <br>
    <div v-for="detail in user" :key="detail.id">
        <img v-if="detail.photo" :src="'/images/' + detail.photo" width="200" class="mx-auto mb-4">
        <h1 class="text-center font-bold text-2xl" v-text="detail.name"></h1>
        <p class="text-center">Email : {{ detail.email }}</p>

        <div class="flex justify-center">
            <router-link :to="'/user/edit/' + detail.id" class="hover:text-blue-500 text-xl">Edit User</router-link>
        </div>
    </div>

    <br><br><br>
</template>

<script>
import axios from 'axios';
export default {
    props : ['id'],
    data() {
        return {
            user : [],
        }
    },
    mounted() {
        axios.get('/api/users/' + this.id).then((response) => {
                this.user = response.data
            })
    },
}
</script>
<!-- axios.post('/api/users/' + id_user, id_user).then((response) => {
    console.log(response)
    // refresh data
    axios.get('/api/users').then((response) => {
        console.log(response),
        this.users = response.data
    })
}).catch((error) => {
    console.log(error)
}) -->
<style>
</style>