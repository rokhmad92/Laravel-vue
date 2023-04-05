<template>
    <h1 class="text-xl">List Users :</h1>
    <p>Click For Delete User!</p>
    <br>
    <ul>
        <li v-for="user in users" :key="user.id">
            <p v-text="user.name" class="hover:text-red-500 cursor-pointer" @click="handleButton(user.id)"></p>
        </li>
    </ul>
</template>

<script>
import axios from 'axios';
export default {
    mounted () {
        axios.get('/api/users').then((response) => {
            console.log(response),
            this.users = response.data
        })
    },
    data() {
        return {
            users : []
        }
    },
    methods: {
        handleButton(id_user) {
            axios.post('/api/users/' + id_user, id_user).then((response) => {
                    console.log(response)
                    // refresh data
                    axios.get('/api/users').then((response) => {
                        console.log(response),
                        this.users = response.data
                    })
                }).catch((error) => {
                    console.log(error)
                })
        }
    }
}
</script>

<style>
</style>