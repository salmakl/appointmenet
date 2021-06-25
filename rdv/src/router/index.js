import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import New from '../views/New.vue'
import Check from '../views/Check.vue'
import Available from '../views/Available.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    component : About
  },
  {
    path: '/new',
    name: 'New',
    component : New
  },
  {
    path: '/check',
    name: 'Check',
    component : Check
  },
  {
    path: '/available',
    name: 'Available',
    component : Available
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
