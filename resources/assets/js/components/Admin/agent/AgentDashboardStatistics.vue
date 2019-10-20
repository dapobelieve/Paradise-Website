<template>
    <div class="row" v-if="stats">
        <div class="col-md-12">
            Transactions
        </div>
        <div class="col-md-3">
            <div class="alert alert-info alert-block">
                    <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bolder">Today:</small>
                        <p style="padding-top: 4px; font-weight: bold; font-size: x-large; display: inline"> {{ stats.today.total }}</p>
                    </span>
                <hr>
                <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bold">Total:</small>
                        <p style="font-weight: bold; font-size: x-large; display: inline">&#8358;{{ stats.today.sum }}</p>
                    </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="alert alert-info alert-block">
                    <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bolder">Yesterday:</small>
                        <p style="padding-top: 4px; font-weight: bold; font-size: x-large; display: inline"> {{ stats.yesterday.total }}</p>
                    </span>
                <hr>
                <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bold">Total:</small>
                        <p style="font-weight: bold; font-size: x-large; display: inline">&#8358;{{ stats.yesterday.sum }}</p>
                    </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="alert alert-info alert-block">
                    <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bolder">This Week:</small>
                        <p style="padding-top: 4px; font-weight: bold; font-size: x-large; display: inline"> {{ stats.week.total }}</p>
                    </span>
                <hr>
                <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bold">Total:</small>
                        <p style="font-weight: bold; font-size: x-large; display: inline">&#8358;{{ stats.week.sum }}</p>
                    </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="alert alert-info alert-block">
                    <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bolder">This month:</small>
                        <p style="padding-top: 4px; font-weight: bold; font-size: x-large; display: inline"> {{ stats.month.total }}</p>
                    </span>
                <hr>
                <span style="display: flex; align-items: center; justify-content: space-between">
                         <small style="font-weight: bold">Total:</small>
                        <p style="font-weight: bold; font-size: x-large; display: inline">&#8358;{{ stats.month.sum }}</p>
                    </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AgentDashboardStatistics",
        props: {
            stats: Object
        }
    }
</script>

<style scoped>

</style>