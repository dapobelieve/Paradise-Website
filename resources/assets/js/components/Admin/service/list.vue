<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="fa fa-signal"></i></span>
            <h5>Services</h5>
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
                <th>Service Title</th>
                <th>Posted</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(record, index) in data" :key="record.id" class="gradeC">
                <td>{{index + 1}}</td>
                <td>{{record.name}}</td>
                <td>{{record.created_at | customizedTime}}</td>
                <td>
                  <router-link :to="{ name: 'edit-service', params: {id: record.id} }" class="btn btn-xs btn-primary">Edit</router-link>
                  <button @click="deleteProp(record.id)" class="btn btn-xs btn-danger">Delete</button>
                </td>
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
  export default {
    data () {
      return {
        data: []
      }
    },
    methods: {
      async getAllProperties() {
        try {
          let response = await Api.get('api/service')
          this.data = response.data.data
        }catch (e) {
          console.log(e)
        }
      },
      async deleteProp(id) {
        if (confirm("Are you want to delete this record?")) {
          try {
            await Api.delete(`api/property/${id}`)
            alert("Record deleted");
            this.data = this.data.filter((e) => {
              return e.id !== id
            })
          }catch (e) {
            console.log(e)
          }
        }
      }
    },
    mounted() {
      this.getAllProperties()
    }
  }
</script>

<style scoped>
  tr > td {
    text-align: center;
    content: "Dapo Believe";
  }
</style>