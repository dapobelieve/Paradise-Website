<template>
    <div class="listing-item white-bg bordered mb-20">
        <div class="overlay-container">
            <img src="/assets/images/product-1.jpg" alt="">
        </div>
        <div class="body">
            <h6><a href="#">{{ product.title }}</a></h6>
            <p class="small">
                
            </p>
            <div class="elements-list clearfix">
                <span class="price">
                    <span>&#x20A6</span>{{ product.price }}
                </span>
                <a @click.prevent="addToCart" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    props: ['product'],
    methods: {
        ...mapActions({
            addProductToCart: 'addProductToCart'
        }),
        addToCart () {
            this.addProductToCart({
                product: this.product,
                quantity: 1
            })
        }
    }
}
</script>