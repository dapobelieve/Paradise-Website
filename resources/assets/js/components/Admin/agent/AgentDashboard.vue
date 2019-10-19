<template>
    <div class="container-fluid">
        <agent-dashboard-statistics :stats="stats"></agent-dashboard-statistics>
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-info">
                    Welcome in the <strong>Unicorn Admin Theme</strong>. Don't forget to check all the pages!
                    <a href="#" data-dismiss="alert" class="close">×</a>
                </div>
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="fa fa-signal"></i></span>
                        <h5>Todays Transactions</h5>
                        <div class="buttons">
                            <a href="#" class="btn">
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
    import AgentDashboardStatistics from "./AgentDashboardStatistics";
    export default {
        name: "AgentDashboard",
        data () {
            return {
                stats: {},
                today: []
            }
        },
        components: {
            AgentDashboardStatistics
        },
        created () {
            let user = JSON.parse(localStorage.getItem('paraUser'));

            let data = axios.get(`api/${user}/statistics`).then(response => {
                this.stats = response.data.stats;
                this.today = response.data.todaysRecords;
            });
        }
    }
</script>

<style scoped>

</style>