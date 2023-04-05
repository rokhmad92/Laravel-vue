<template>
    <div class="flex justify-center">
        <router-link class="mx-3" to="/">Home</router-link>|
        <router-link class="mx-3" to="/users">Show All Users</router-link>|
        <router-link class="mx-3" to="/users/register">Register</router-link>|
        <router-link class="mx-3" to="/users/delete">Delete</router-link>
    </div>
    <router-view></router-view>
</template>

<script>
    export default {
        name: 'app',
    }
</script>
