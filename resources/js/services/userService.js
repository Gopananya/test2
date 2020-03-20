export function login(data){
	return new Promise((res, rej) => {
		axios.post('api/auth/login', data).then(resopnse => {
			setUser(JSON.stringify(resopnse.data.user));
			setToken(resopnse.data.access_token);
			res(resopnse.data);
		}).catch(err => rej(err))
	})
}

export function logout(){
	localStorage.removeItem('isAuth');
	localStorage.removeItem('user');
	localStorage.removeItem('token');
}

function setUser(user){
	localStorage.setItem('isAuth', true);
	localStorage.setItem('user', user);
}

function setToken(token){
	localStorage.setItem('token', token);
}
