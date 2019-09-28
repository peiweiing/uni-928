import Vue from 'vue'
import App from './App'

// import Router from 'uni-simple-router'
// Vue.use(Router)


import routerLink from './node_modules/uni-simple-router/component/router-link.vue'
Vue.component('router-link',routerLink)

Vue.config.productionTip = false

App.mpType = 'app'

const app = new Vue({
    ...App
})
app.$mount()
