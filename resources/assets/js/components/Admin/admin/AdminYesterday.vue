<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="fa fa-signal"></i></span>
                        <h5>Todays Transactions</h5>
                        <div class="buttons">
                            <a @click.prevent="getRecords()" href="#" class="btn">
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
                                <th>Name</th>
                                <th>Service</th>
                                <th>Service code</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(record, index) in today" :key="record.id" class="gradeC">
                                <td>{{ index + 1 }}</td>
                                <td>@{{ record.user.name }}</td>
                                <td>{{ record.name }}</td>
                                <td>{{ record.service }}</td>
                                <td>{{ record.ref }}</td>
                                <td>{{ record.price }}</td>
                                <td>{{ record.status }}</td>
                                <td>{{ record.created_at }}</td>
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
        name: "AdminYesterday",
        data () {
            return {
                user: null
            }
        },
        methods: {
            getBreakdown () {
                axios.get(`/api/admin-stats/${this.user}/yesterday`)
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