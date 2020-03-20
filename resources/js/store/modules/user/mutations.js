export default {
	SET_USER(state, user){
		state.currentUser = user;
	},
	SET_TOKEN(state, token){
		state.jwt_token = token;
	},
	LOGIN(state){
		state.isAuth = true;
	}
}
	