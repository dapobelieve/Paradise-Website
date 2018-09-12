import axios from 'axios'


export const getProducts = ({ commit }) => {

    return axios.get('api/store')
    .then(response => {
        commit('setProducts', response.data)
    })
}

export const getCart = ({ commit }) => {
    commit('setCart', JSON.parse(localStorage.getItem('cart')))
}

export const addProductToCart = ({ commit }, { product, quantity }) => {
    commit('appendToCart', product);
    alert('Added to cart')
}

export const updateCart = ({ commit }, { cart }) => {
    commit('updateCart', cart)
}

export const removeFromCart = ({ commit }, productId) => {
    commit('removeItem', productId)
}