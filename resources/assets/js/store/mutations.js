export const setProducts = (state, products) => {
    state.store = products
    if (localStorage.getItem('cart')) {
        state.cart = JSON.parse(localStorage.getItem('cart'))
    }
}

export const appendToCart = (state, product) => {
    const existing = state.cart.find(item => {
        return item.product.id === product.id
    })

    if (existing){
        existing.quantity++
    }else {
        state.cart.push({
            product,
            quantity: 1
        })
    }
    if (localStorage.getItem('cart')){
        localStorage.setItem('cart', JSON.stringify(state.cart))
    }else {
        localStorage.setItem('cart', JSON.stringify(state.cart))
    }
}
