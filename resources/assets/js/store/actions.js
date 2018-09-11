import axios from 'axios'


export const getProducts = ({ commit }) => {

    return axios.get('api/store')
    .then(response => {
        commit('setProducts', response.data)
    })
}

export const addProductToCart = ({ commit }, { product, quantity }) => {
    commit('appendToCart', product);
    alert('Added to cart')
}