export const store =  (state) => {
    return state.store
}

export const cart = (state) => {
    return state.cart
}

export const cartTotal = (state) => {
    return state.cart.reduce((a, b) => {
        return a + b.product.price * b.quantity
    }, 0).toFixed(2);
}