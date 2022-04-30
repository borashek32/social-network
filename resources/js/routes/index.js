import { createRouter, createWebHistory } from 'vue-router';
import Container from '../views/layouts/Container';

const routes = [
  {
    path: '/',
    name: Container,
    component: Container
  }
]

export default createRouter({
  history: createWebHistory(),
  routes
})