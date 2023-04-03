import { createRouter, createWebHistory } from 'vue-router'
import homeView from '../components/Home.vue'
import aboutView from '../components/About.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: homeView,
    },
    {
      path: '/about',
      component: aboutView,
    },
  ]
})

export default router