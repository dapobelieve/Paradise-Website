<template>
    <div class="container-fluid">
        <agent-dashboard-statistics :stats="stats"></agent-dashboard-statistics>
        <div class="row">
            <div class="col-xs-12">
                
                <div class="widget-box">
                    <div style="display: flex;  align-items: center" class="widget-title">
                        <span class="icon"><i class="fa fa-signal"></i></span>
                        <h5>Todays Transactions</h5>
                        <div>
                            <input class="search" v-model="search" type="text" placeholder="Search service code">
                            <button @click.prevent="searchRecord" class="btn btn-xs btn-primary">Search</button>
                        </div>
                        <div style="margin-left: auto; align-self: flex-end;" class="buttons">
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
                            <cashier-dashboard-record v-for="(record, index) in today" :record="record" :index="index" :key="record.id"></cashier-dashboard-record>
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
    import CashierDashboardRecord from "./CashierDashboardRecord";
    export default {
        name: "AgentDashboard",
        data () {
            return {
                search: '',
                stats: {},
                today: []
            }
        },
        components: {
            AgentDashboardStatistics,
            CashierDashboardRecord
        },
        methods: {
            searchRecord () 
            {
                axios.get(`api/q=${this.search}`)
                .then(response => {
                    console.log(response.data)
                })
            },
            getRecords() 
            {
                let user = JSON.parse(localStorage.getItem('paraUser'));

                let data = axios.get(`api/${user}/paid-records`).then(response => {
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
.search {
    height: 22px;
    width: 300px;
    border: 1px solid grey;
    border-width: thin;
    border-radius: 3px;
    font-size: smaller;
    padding: 8px
}

</style>

<style>

</style>