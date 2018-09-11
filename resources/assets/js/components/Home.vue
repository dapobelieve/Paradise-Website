<template>
    <div class="store-home">
        <div class="row">
            <div class="main col-md-12">
                <h1 class="page-title text-center"><strong>Products</strong></h1>
                <div class="separator"></div>
                <!-- Nav shoud go here -->
                <navy></navy>
                <!-- <br> -->
                <div class="tab-content clear-style">
                    <div class="tab-pane active" id="pill-1">                       
                        <div class="row masonry-grid-fitrows grid-space-10">
                            <div v-for="product in store" class="col-md-3 col-sm-6 masonry-grid-item">
                                <div class="listing-item white-bg bordered mb-20">
                                    <div class="overlay-container">
                                        <img src="/assets/images/product-1.jpg" alt="">
                                    </div>
                                    <div class="body">
                                        <h5><a href="#">{{ product.title }}</a></h5>
                                        <p class="small">
                                            
                                        </p>
                                        <div class="elements-list clearfix">
                                            <span class="price">
                                                <span>&#x20A6</span>{{ product.price }}
                                            </span>
                                            <a href="#" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import nav from './nav.vue'
export default {
    components: {
        'navy': nav
    },
    data () {
        return {

        }
    },
    computed: {
        ...mapGetters({
            store: 'store'
        })
    },
    methods: {
        ...mapActions({
            getProducts: 'getProducts'
        })
    },
    mounted() {
        this.getProducts()
    },
}
</script>