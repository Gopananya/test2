import {router} from '../router'
export function percentage(){
	return new Promise((res, rej) => {
		axios.get('/api/products/percentage').then(resopnse => {
			// console.log(resopnse.data)
			res(resopnse.data);
		}).catch(err => rej(err))
	})
}

export function getAll(){
	return new Promise((res, rej) => {
		axios.get('/api/products').then(resopnse => {
			// console.log(resopnse.data)
			res(resopnse.data);
		}).catch(err => rej(err))
	})
}

export function getByDate(date){
	return new Promise((res, rej) => {
		axios.get('/api/products/get-by-date/'+date).then(resopnse => {
			// console.log(resopnse.data)
			res(resopnse.data);
		}).catch(err => rej(err))
	})
}

export function getById(id){
	return new Promise((res, rej) => {
		axios.get(`/api/products/${id}/edit`).then(resopnse => {
			// console.log(resopnse.data)
			res(resopnse.data);
		}).catch(err => rej(err))
	})
}


export function del(id){
	axios.delete('/api/products/'+id)
}

export function add(data){
	return new Promise(function(res, rej){
		axios.post('/api/products', data).then(resopnse => {
			router.push('/dashboard/products/all');
			res(resopnse.data);
		}).catch(function(err){rej(err)})
	})
}

export function edit(id, date){
	return new Promise((res, rej) => {
		axios.put('/api/products/' + id,date).then(resopnse => {
			router.push('/dashboard/products/all');
			res(resopnse.data);
		}).catch(function(err){rej(err)})
	})
}