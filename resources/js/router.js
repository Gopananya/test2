import Vue from 'vue';
import VueRouter from 'vue-router';
import LoginComponent from './components/auth/LoginComponent.vue';
import DashboardComponent from './components/account/DashboardComponent.vue';
import FindProductComponent from './components/products/FindProductComponent.vue';
import AddProductComponent from './components/products/AddProductComponent.vue';
import EditProductComponent from './components/products/EditProductComponent.vue';
import AllProductComponent from './components/products/AllProductComponent.vue';
import PercentageProductComponent from './components/products/PercentageProductComponent.vue';



import store from './store';

Vue.use(VueRouter);

const routes = [
	{
		path: '/',
		redirect: '/login',
	},
	{
		path: '/login',
		component: LoginComponent
	},
	{
		path: '/dashboard',
		component: DashboardComponent,
		children: [{
      		path: '/',
      		component: FindProductComponent,
			meta: {mustBeAuth: true}
    	},
    	{
      		path: '/dashboard/products/percentage',
      		component: PercentageProductComponent,
			meta: {mustBeAuth: true}
    	},
    	{
      		path: '/dashboard/products/all',
      		component: AllProductComponent,
			meta: {mustBeAuth: true}
    	},
    	{
      		path: '/dashboard/products/add',
      		component: AddProductComponent,
			meta: {mustBeAuth: true}
    	},
    	{
      		path: '/dashboard/products/edit/:id',
      		component: EditProductComponent,
			meta: {mustBeAuth: true},
			name: 'ProductEdit'
    	},
    	]
	}


]

export const router = new VueRouter({
	routes,
	mode: 'history'
})

router.beforeEach((to, from, next) => {
	if(to.meta.mustBeAuth){
		if(store.state.user.isAuth) {
			// console.log(store.state.user.isAuth)
			next()
		}else{
			next('/login')
		}
	}else{
		if(store.state.user.isAuth && (to.path === '/login' || to.path === '/') ) {
			next('/dashboard')
		}else{
			next()
		}
	}
})