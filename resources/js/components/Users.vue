<template>
    <h1 class="text-xl">List Users :</h1>
    <br>
    <ul>
        <li v-for="user in users" :key="user.id">
            <router-link :to="'/user/' + user.id" v-text="user.name" class="hover:text-sky-500"></router-link>
        </li>
    </ul>
</template>

<script>
import axios from 'axios';
export default {
    mounted () {
        // menggunakan fetch = lebih ringan
        // fetch('/api/users')
        // .then(response => response.json())
        // .then(data => {   
        //     console.log(data),
        //     this.users = data
        // })
        // .catch(error => console.error(error));

        // menggunakan axio = lebih mudah dan canggih
        axios.get('/api/users').then((response) => {
            console.log(response),
            this.users = response.data
        })
    },
    data() {
        return {
            users : []
        }
    }
}
</script>

<style>
</style>