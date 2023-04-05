<template>
    <br>
    <div v-for="detail in user" :key="detail.id">
        <h1 class="text-center font-bold text-2xl" v-text="detail.name"></h1>
        <p class="text-center">Email : {{ detail.email }}</p>
    </div>

    <br><br><br>

    <h1 class="text-xl">Edit User</h1>
    <br>
    <form action="/users" @submit.prevent="handleSubmit" method="POST" v-for="detail in user" :key="detail.id">
        <div class="mb-3">
            <label for="name">Name : </label>
            <input type="text" v-model="detail.name" id="name" class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-3">
            <label for="email">Email : </label>
            <input type="email" id="email" v-model="detail.email" class="peer shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
            <p class="invisible peer-invalid:visible text-pink-600 text-sm">Please provide a valid email address.</p>
        </div>
        <div class="mb-3">
            <label for="password">Password : </label>
            <input type="password" id="password" v-model="form.password" class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button class="bg-blue-300 p-2 rounded-full peer-invalid:invisible">Register</button>
    </form>
</template>

<script>
import axios from 'axios';
export default {
    props : ['id'],
    data() {
        return {
            params : this.$route.params.id,
            user : [],
            form: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    mounted() {
        axios.get('/api/users/' + this.params).then((response) => {
                console.log(response)
                this.user = response.data
            })
    },
    methods: {
        handleSubmit() {

        }
    }
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