<template>
    <div class="row">
        <div class="main col-md-12">
            <h1 class="page-title">Shopping Cart</h1>
            <div class="separator-2"></div>
            <!-- page-title end -->

            <table class="table cart table-hover table-colored">
                <thead>
                    <tr>
                        <th>Product </th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Remove </th>
                        <th class="amount">Total </th>
                    </tr>
                </thead>
                <tbody v-if="cart.length">
                    <tr v-for="item in cart" class="remove-data">
                        <td class="product"><a href="#">{{ item.product.title }}</a></td>
                        <td class="price"><span>&#x20A6</span>{{ item.product.price }} </td>
                        <td class="quantity">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="item.quantity">
                            </div>                                          
                        </td>
                        <td class="remove"><a @click.prevent="removeFromCart(item.product.id)" class="btn  btn-sm btn-default">Remove</a></td>
                        <td class="amount"><span>&#x20A6</span>{{ item.product.price * item.quantity }} </td>
                    </tr>
                    <tr>
                        <td v-if="cart.length > 0" class="total-quantity" colspan="4">Total {{ cart.length }} Items</td>
                        <td  class="total-amount"><span>&#x20A6</span>{{cartTotal}}</td>
                    </tr>
                </tbody>
                <tbody v-else>
                    No items in cart
                </tbody>
            </table>
            <div class="text-right">    
                <button :disabled="!cart.length" @click.prevent="update" class="btn btn-group btn-default">Update Cart</button>
                <button :disabled="!cart.length" class="btn btn-group btn-default">Checkout</button>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    computed: {
        ...mapGetters({
            cart: 'cart',
            cartTotal: 'cartTotal'
        })
    },
    methods: {
        ...mapActions({
            getCart: 'getCart',
            updateCart: 'updateCart',
            removeFromCart: 'removeFromCart'
        }),
        update () {
            this.updateCart({
                cart: this.cart
            })
        }
    },
    mounted() {
        this.getCart()
    }
}
</script>