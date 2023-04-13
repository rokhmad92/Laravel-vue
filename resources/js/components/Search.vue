<template>
    <div class="ml-10">
        <h1 class="text-xl">Search Data!</h1>
        <br>
        <label for="Search">Search :</label>
        <input type="text" v-model="search" id="Search" class="border border-slate-500 active:border-slate-900 ml-2">
        <br>
        <br>
        <table cellpadding="5" cellspacing="0" class="border-collapse border">
            <thead class="border-collapse border">
                <tr>
                    <td class="border">Nama</td>
                    <td class="border">email</td>
                </tr>
            </thead>

            <tbody class="border-collapse border">
                <tr v-for="user in users" :key="user.id">
                    <td class="border">{{ user.name }}</td>
                    <td class="border">{{ user.email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    mounted () {
        axios.get('/api/users').then((response) => {
            this.users = response.data
        })
    },
    data() {
        return {
            search : '',
            users : []
        }
    }
}
</script>