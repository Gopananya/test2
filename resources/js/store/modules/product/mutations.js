export default {
	SET_PRODUCT_LIST(state, productList){
		state.productList = productList;
	},
	SET_PERCENTAGE(state, percentage){
		state.percentage = percentage;
	},
	SET_PRODUCTS(state, products){
		state.products = products;
	},
	DELETE_PRODUCT(state , id){
		state.productList = state.productList.filter(e => {
            return e.id !== id
        })
	}
}
	