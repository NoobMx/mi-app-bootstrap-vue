import Vue from 'vue';
import Router from 'vue-router';

import Login from '@/views/Login.vue';
import Home from '@/views/Home.vue';

Vue.use(Router);

const rutas = new Router({
  mode: 'history', // evita el hash (#) en las URLs
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/home',
      name: 'Home',
      component: Home
    }
  ]
});

// Protección de ruta
rutas.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('auth');

    if (to.matched.some(record => record.meta.requiresAuth) && !loggedIn) {
        next('/');
    } else {
        next();
    }
});

export default rutas;