<template>
    <div class="container-fluid">
        <agent-dashboard-statistics :stats="stats"></agent-dashboard-statistics>
        <div class="col-xs-12">
            <div class="col-md-3"><router-link :to="{name: 'admin-today'}">view more</router-link></div>
            <div class="col-md-3"><router-link :to="{name: 'admin-analytics-yesterday'}">view more</router-link></div>
            <div class="col-md-3"><router-link :to="{name: 'admin-analytics-week'}">view more</router-link></div>
            <div class="col-md-3"><router-link :to="{name: 'admin-analytics-30'}">view more</router-link></div>
        </div>
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
    import AgentDashboardStatistics from "../agent/AgentDashboardStatistics";
    export default {
        name: "AdminDashboardComponent",
        data () {
            return {
                stats: {},
                today: []
            }
        },
        components: {
            AgentDashboardStatistics
        },
        methods: {
            getRecords()
            {
                let user = JSON.parse(localStorage.getItem('paraUser'));

                axios.get(`api/admin-stats/${user}`).then(response => {
                    this.stats = response.data.stats;
                    this.today = response.data.todaysRecords;
                });
            }
        },
        created () {
            this.getRecords();
        }
    }
</script>

<style scoped>

</style>