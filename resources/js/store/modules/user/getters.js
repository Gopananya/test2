export default {
	getUser(state){
		return state.currentUser;
	},
	getToken(state){
		return state.jwt_token;
	},
	isLoggedIn(state){
		return state.isAuth;
	}
	
}