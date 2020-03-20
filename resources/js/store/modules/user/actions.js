import * as userService from '../../../services/userService'
import {router} from '../../../router'
export default {
		login(ctx, data) {
			return new Promise((response, rej) => {
				userService.login(data).then(res => {
					ctx.commit('SET_USER', JSON.parse(localStorage.getItem('user')));
					ctx.commit('SET_TOKEN', localStorage.getItem('token'));
					ctx.commit('LOGIN');
					router.push('/dashboard');
					return response;
				}).catch(err => {
					console.log('error ',err);
					rej(err)
				})
			})
		},
		logout(ctx) {
			userService.logout();
			router.go('/');
		}
}
