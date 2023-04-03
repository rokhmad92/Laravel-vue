import { createRouter, createWebHistory } from 'vue-router'
import homeView from '../components/Home.vue'
import usersView from '../components/Users.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: homeView,
    },
    {
      path: '/users',
      component: usersView,
    },
  ]
})

export default router