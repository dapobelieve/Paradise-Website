<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="fa fa-signal"></i></span>
                        <h5>Transactions Breakdown for this week</h5>
                        <div class="buttons">
                            <a @click.prevent="getBreakdown()" href="#" class="btn">
                                <i class="fa fa-refresh"></i>
                                <span class="text">Refresh</span>
                            </a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped table-hover data-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Agent</th>
                                <th>Transactions</th>
                                <th>Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(record, index) in records" :key="record.id" class="gradeC">
                                <td style="text-align: center">{{ index + 1 }}</td>
                                <td style="text-align: center">@{{ record.name }}</td>
                                <td style="text-align: center">{{ record.transactions }}</td>
                                <td style="text-align: center">{{ record.amount }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AdminWeek",
        data () {
            return {
                user: null,
                records: []
            }
        },
        methods: {
            getBreakdown () {
                axios.get(`/api/admin-stats/${this.user}/week`)
                    .then (response => {
                        this.records = response.data.stats
                    })
            }
        },
        mounted() {
            this.user = JSON.parse(localStorage.getItem('paraUser'));
            this.getBreakdown();
        }
    }
</script>

<style scoped>

</style>