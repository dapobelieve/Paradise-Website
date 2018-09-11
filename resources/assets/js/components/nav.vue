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
                <router-link style="color: black; font-weight: 700" :to="{name: 'home'}">
                    {{ cart.length }} <small>items in Cart</small>
                </router-link>
            </li>
        </ul>
    </div>
</template>
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