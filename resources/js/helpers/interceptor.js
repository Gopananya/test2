export function interceptor(store, router){
	axios.interceptors.response.use(null, err => {
		if(err.response.status === 401){
			store.dispatch('logout');
			router.push('/login');
		}
		return Promise.reject(err)
	});
	axios.interceptors.request.use(
   		config => {
			config.headers['Authorization'] = `Bearer ${store.getters.getToken}`;
			config.headers['Content-Type'] = 'application/json';
			return config;
   		},
   		error => {
       Promise.reject(error)
   });
}