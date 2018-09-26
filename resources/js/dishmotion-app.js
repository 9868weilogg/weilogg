import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/dishmotion/dishmotion-app'
import Home from './components/dishmotion/dishmotion-home'





const router = new VueRouter({
    mode:'history',
    routes:[
    	{
    		path:'/dishmotion',
    		name:'home',
    		component: Home,
    	}

    ]

});

const app = new Vue({
	el:'#dishmotionApp',
	components: { App },
	router,
});
