<template>
    <div class="create-training">
        <div class="row">
            <div class="col-xs-12">
                <div v-if="error.status" class="alert alert-danger">
                    {{ error.message }}
                    <a href="#" data-dismiss="alert" class="close">×</a>
                </div>
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="fa fa-medkit"></i></span>
                        <h5>New Transaction </h5>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                          <form @submit.prevent="submitCourse" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-2 control-label">Transaction</label>
                                <div class="col-sm-9 col-md-9 col-lg-10">
                                    <input type="text" required v-model="form.title" placeholder="Photocopy, online registration, " class="form-control input-sm" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-2 control-label">Transaction Charge</label>
                                <div class="col-sm-9 col-md-9 col-lg-10">
                                    <input
                                      type="number"
                                      required
                                      min="20"
                                      v-model.numnber="form.price"
                                      placeholder="Amount"
                                      class="form-control input-sm" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-2 control-label">Customer Name</label>
                                <div class="col-sm-9 col-md-9 col-lg-10">
                                    <input type="text" required v-model="form.name" placeholder="" class="form-control input-sm" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-2 control-label">Customer Phone</label>
                                <div class="col-sm-9 col-md-9 col-lg-10">
                                    <input type="number" required v-model="form.phone" placeholder="" class="form-control input-sm" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-2 control-label">Customer Email</label>
                                <div class="col-sm-9 col-md-9 col-lg-10">
                                    <input type="email" required v-model="form.email" placeholder="" class="form-control input-sm" />
                                </div>
                            </div>
<!--                            <div class="form-actions" v-if="btn.state">-->
<!--                                <loader></loader>-->
<!--                            </div>-->

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-sm">{{btn.text}}</button>
                            </div>
                          </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
  import loader from '../../../helpers/loader.vue'
  // import Bus from '../../../../helpers/bus.js'
  // import moment from 'moment';
  export default {
    data () {
      return {
        btn: {
            state: false,
            text: 'Submit'
        },
        form: {},
        error: {
            status: false,
            message: ""
        }
      }
    },
    components: {
      loader
    },
    methods: {
      submitCourse ()
      {

        this.btn.state = true;
        let api = axios.create({
            baseURL: '/'
        });

        api.post('api/create', this.form)
        .then((response) => {
            this.btn.state = !this.btn.state;
            console.log(response.data.message);

        })
        .catch((error) => {
            this.errors = error.response.data.errors
            console.log(error.response.data)
        });
      }
    }
  }
</script>