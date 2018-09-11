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
        </ul>
    </div>
</template>
<script>
export default {

}
</script>