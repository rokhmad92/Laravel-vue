<template>
    <h1 class="text-xl">Edit User</h1>
    <form @submit.prevent="handleSubmit" v-for="detail in form" :key="detail.id">
        <br>
        <div class="mb-3">
            <label for="name">Name : </label>
            <input type="text" v-model="detail.name" id="name" class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-3">
            <label for="email">Email : </label>
            <input type="email" id="email" v-model="detail.email" class="peer shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
            <p class="invisible peer-invalid:visible text-pink-600 text-sm">Please provide a valid email address.</p>
        </div>
        <button class="bg-blue-300 p-2 rounded-full peer-invalid:invisible px-8">Edit</button>
    </form>
</template>

<script>
import axios from 'axios';
export default {
    props: ['id'],
    mounted() {
        axios.get('/api/users/' + this.id).then((response) => {
                this.form = response.data
            })
    },
    data() {
        return {
            form: {
                name: '',
                email: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            axios.put('/api/users/' + this.id, this.form[0]).then((response) => {
                this.$toast.success(response.data.messages);
                this.$router.go(-1)
            }).catch((error) => {
                console.log(error)
            })
        }
    },
}
</script>