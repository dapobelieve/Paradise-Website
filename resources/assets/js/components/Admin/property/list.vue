<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="fa fa-signal"></i></span>
            <h5>All Properties</h5>
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
                <th>Property</th>
                <th>Price</th>
                <th>Posted</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(record, index) in data" :key="record.id" class="gradeC">
                <td>{{index + 1}}</td>
                <td>{{record.title}}</td>
                <td>{{record.price}}</td>
                <td>{{record.created_at | customizedTime}}</td>
                <td>
                  <button class="btn btn-xs btn-primary">Edit</button>
                  <button class="btn btn-xs btn-danger">Delete</button>
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
  export default {
    data () {
      return {
        data: []
      }
    },
    methods: {
      async getAllProperties() {
        let api = axios.create({
          baseURL: '/'
        });

       try {
         let response = await api.get('api/property')
         this.data = response.data.data
       }catch (e) {
         console.log(e)
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