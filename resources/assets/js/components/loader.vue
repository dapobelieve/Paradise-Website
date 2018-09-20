<template>
    <div v-if="loading" class="loader">
    </div>
</template>

<style>
    .loader {
    position: fixed;
    top: 55px; left: 0;
    z-index: 10000;
    height: 4px;
    width: 100%;
    overflow: hidden;
    background-color: #31a3a3
    }

    .loader:before {
        display: block;
        position: absolute;
        content: " ";
        left: -200px;
        width: 200px;
        height: 4px;
        background-color: #71e45a;
        animation: loading 2s linear infinite;
    }

    @keyframes loading {
        from {
            left: -200px;
            width: 30%;
        }

        50% {
            width: 30%
        }

        70% {
            width: 70%;
        }

        80% {
            left: 50%;
        }

        95% {
            left: 120%;
        }

        to {
            left: 100%;
        }
    }
</style>

<script>

import bus from '../bus.js'
export default {
    data () {
        return {
            loading: null
        }
    },
    mounted() {
        bus.$on('loading', (loadingOrNot) => {
            this.loading = loadingOrNot
        })
    }
}
</script>