<template>
    <router-link to="/">Home</router-link> | 
    <router-link to="/users">Show All Users</router-link>
    <br><br>
    <router-view></router-view>
</template>

<script>
    export default {
        name: 'app',
    }
</script>
