<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-info alert-block">
          <span style="display: flex; align-items: center; justify-content: space-between">
            <div style="display: grid">
              <label for="agent">Select Agent</label>
              <select id="agent" v-model="agent" name="agent" style="padding: 12px">
                <option value="" selected></option>
                <option v-for="agent in agents" :value="agent.id" :key="agent.id">{{ agent.name }}</option>
              </select>
            </div>
            <div style="display: grid">
              <label for="start">From:</label>
              <datetime :week-start="0" min-datetime="01-01-2019" v-model="start" class="form-control" id="start" format="dd-MMM-yyyy" placeholder="Start date"></datetime>
            </div>
            <div>
              <label for="end">To:</label>
              <datetime v-model="end" class="form-control" id="end" format="dd-MMM-yyyy" placeholder="End date"></datetime>
            </div>
          </span>
          <button @click="getRecords" class="btn btn-success btn-md">Search</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="fa fa-signal"></i></span>
            <h5>{{this.user}} Transactions</h5>
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
                <th>Customer</th>
                <th>Email</th>
                <th>Service</th>
                <th>Service code</th>
                <th>Price</th>
                <th>Status</th>
                <th>Time</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(record, index) in records" :key="record.id" class="gradeC">
                <td>{{ index + 1 }}</td>
                <td>{{ record.name }}</td>
                <td>{{ record.email }}</td>
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
  import Api from '../../../helpers/Api'
  import moment from 'moment';
  export default {
    name: "SalesByDate",
    data () {
      return {
        records: [],
        user: null,
        agents: [],
        start: null,
        end: null,
        agent: null,
        admin: null
      }
    },
    methods: {
      async getRecords() {
        if (typeof this.agent !== "number") {
          alert("Please select an agent")
          return
        }

        if (this.start == "" || this.end == "") {
          alert("Please select date range")
          return
        }

        let start = Date.parse(new Date(this.start))
        let end = Date.parse(new Date(this.end))
        let today = Date.now()

        if (start > end) {
          alert("Start date cannot be greater than end date")
          return
        }

        if (end > today) {
          alert("You cannot search beyond today's date")
          return
        }

        try {
          let {data:data} = await Api.get(`api/search/${parseInt(this.agent)}`, {
            params: {
              start: moment(this.start).format('YYYY-MM-DD'),
              end: moment(this.end).format('YYYY-MM-DD')
            }
          })

          let {records, user} = data
          this.records = records
          this.user = user
        }catch (e) {
          console.log(e)
        }
      },
      async getAgents () {

        try {
          let {data:data} = await Api.get(`api/${this.admin}/agents`)
          this.agents = data.data
        }catch (e) {
          console.log(e)
        }
      }
    },
    mounted() {
      this.admin = JSON.parse(localStorage.getItem('paraUser'));
      this.getAgents()
    }
  }
</script>

<style scoped>

</style>