<template>
    <div v-for="detail in user" :key="detail.id">
        <h1 class="text-center font-bold text-2xl">{{ detail.name }}</h1>
        <p class="text-center">Email : {{ detail.email }}</p>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props : ['id'],
    data() {
        return {
            params : this.$route.params.id,
            user : []
        }
    },
    mounted() {
        axios.get('/api/users/' + this.params).then((response) => {
                console.log(response)
                this.user = response.data
            })
    },
}
</script>

<style>
</style>