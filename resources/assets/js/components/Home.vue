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
                                <product :product="product"></product>
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
import Product from './product'
export default {
    components: {
        'navy': nav,
        'product': Product
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