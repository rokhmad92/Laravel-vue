<template>
    <h1 class="text-xl">Register User</h1>
    <br>
    <form action="/users" @submit.prevent="handleSubmit" method="POST">
        <div class="mb-3">
            <label for="name">Name : </label>
            <input type="text" v-model="form.name" id="name" class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-3">
            <label for="email">Email : </label>
            <input type="email" id="email" v-model="form.email" class="peer shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
            <p class="invisible peer-invalid:visible text-pink-600 text-sm">Please provide a valid email address.</p>
        </div>
        <div class="mb-3">
            <label for="password">Password : </label>
            <input type="password" id="password" v-model="form.password" class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button class="bg-blue-300 p-2 rounded-full">Register</button>
    </form>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            axios.post('/api/users', this.form).then((response) => {
                    console.log(response)
                }).catch((error) => {
                    console.log(error)
                })
        }
    },
}
</script>