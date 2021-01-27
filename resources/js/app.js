require('./bootstrap');

import Vue from 'vue'
import App from './vue/app.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import router from './router/index'

const app = new Vue({
  el: '#app',
  router,
  components: {
    App
  }
});
