<template>
    <div class="main-app">
        <section class="main-container">
            <div class="container">
                <transition name="slide-fade">
                    <router-view></router-view>
                </transition>
                
            </div>
        </section>
        
    </div>
</template>

<style>
    .slide-fade-enter-active {
      transition: all .3s ease;
    }
    .slide-fade-leave-active {
      transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
      transform: translateX(10px);
      opacity: 0;
    }
</style>

<script>

export default {
    
}
</script>