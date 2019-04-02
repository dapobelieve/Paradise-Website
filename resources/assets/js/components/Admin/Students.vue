<template>
    <div class="students">
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current">Applicants</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-info">
                        <strong>*</strong>
                        <a href="#" data-dismiss="alert" class="close">×</a>
                    </div>
                    <div class="widget-box">
                        <div class="widget-content">
                            <div class="table-responsive widget-content nopadding">
                                <table class="data-table table table-bordered table-striped table-hover with-check">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Sex</th>
                                        <th>Type</th>
                                        <th>Paid?</th>
                                        <th>Date</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(data, index) in filterResource" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ data.email }}</td>
                                        <td>{{ data.phone }}</td>
                                        <td>{{ data.sex }}</td>
                                        <td>{{ data.type }}</td>
                                        <td>
                                            <span v-if="data.payment.id">
                                                Yes
                                            </span>
                                            <span v-else>
                                                No
                                            </span>
                                        </td>
                                        <td>{{ formatDate(data.created_at) }}</td>
                                        <td><router-link :to="{name: 'student-details', params: {studentId: data.id}}">View More</router-link></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <loader></loader>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import loader from '../../helpers/loader.vue'
    import moment from 'moment'
    export default {
        name: "students",
        data () {
            return {
                resource: []
            }
        },
        components: {
            loader
        },
        computed: {
            filterResource () {
                return this.resource;
            }
        },
        methods: {
            getStudents () {
                axios.get('api/get-students')
                    .then(response => {
                        // console.log(response.data);
                        this.resource = response.data;
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            },
            formatDate (date) {
                return moment(date).format('MMM Do YY h:mm a');
            }
        },
        mounted () {
            this.getStudents();
            // console.log('Helloo admin')
        }
    }
</script>

<style scoped>

</style>