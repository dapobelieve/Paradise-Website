<template>
    <div class="store-nav">
        <ul class="nav nav-pills" role="tablist">
            <li class="active">
                <router-link :to="{name: 'home'}"><i class="icon-star"></i> Internet Security </router-link>
            </li>
            <li>
                <router-link :to="{name: 'home'}"><i class="icon-star"></i> PDW Broadband </router-link>
            </li>
            <li>
                <router-link :to="{name: 'home'}"><i class="icon-star"></i> Scratch Cards </router-link>
            </li>
            <li>
                <router-link class="checkout" :to="{name: 'info'}"><i class="icon-cart"></i> Checkout </router-link>
            </li>
            <li class="pull-right">
                <div class="btn-group dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-basket-1"></i><span class="cart-count default-bg">{{ cart.length }}</span></button>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
                        <li>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="quantity">QTY</th>
                                        <th class="product">Product</th>
                                        <th class="amount">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in cart">
                                        <td class="quantity">{{ item.quantity }} x</td>
                                        <td class="product">
                                            <h6>{{ item.product.title }}</h6>
                                            <span class="small"></span></td>
                                        <td class="amount"><span>&#x20A6</span>{{ item.product.price * item.quantity }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="panel-body text-right">
                                <router-link class="btn btn-group btn-gray btn-sm" :to="{name: 'cart'}">View Cart</router-link>
                                <a href="#" class="btn btn-group btn-gray btn-sm">Checkout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</template>

<style>
.checkout {
    font-size: 15px !important;
    list-style: arabic-indic;
    color: #2ecc25 !important;
    font-weight: bold !important;
}
</style>
<script>
import { mapGetters } from 'vuex'
export default {
    computed: {
        ...mapGetters({
            cart: 'cart'
        })
    }
}
</script>