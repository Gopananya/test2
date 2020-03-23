import * as productService from '../../../services/productService'
import {router} from '../../../router'
export default {

	add(ctx, data) {
		return new Promise((response, rej) => {
			productService.add(data).then(res => {
				router.push('/dashboard/products/all');
				return response;
			}).catch(err => {
				console.log('error ',err);
				rej(err)
			})
		})
	},

	all(ctx) {
		return new Promise((response, rej) => {
			productService.getAll().then(res => {
				// console.log(res);
				ctx.commit('SET_PRODUCT_LIST', res);
				return response;
			}).catch(err => {
				console.log('error ',err);
				rej(err)
			})
		})
	},

	edit(ctx, [data, id]) {
		return new Promise((response, rej) => {
			productService.edit(id, data).then(res => {
				router.push('/dashboard/products/all');
				return response;
			}).catch(err => {
				console.log('error ',err);
				rej(err)
			})
		})
	},

	find(ctx, date) {
		return new Promise((response, rej) => {
			productService.getByDate(date).then(res => {
				// console.log(res);
				ctx.commit('SET_PRODUCTS', res);
				return response;
			}).catch(err => {
				console.log('error ',err);
				rej(err)
			})
		})
	},

	percentage(ctx) {
		return new Promise((response, rej) => {
			productService.percentage().then(res => {
				ctx.commit('SET_PERCENTAGE', res);
				response(res);
			}).catch(err => {
				console.log('error ',err);
				rej(err)
			})
		})
	},

	delete(ctx, id) {
		return new Promise((response, rej) => {
			productService.del(id).then(res => {
				ctx.commit('DELETE_PRODUCT', res);
				response(res);
			}).catch(err => {
				console.log('error ',err);
				rej(err)
			})
		})
	},
}
