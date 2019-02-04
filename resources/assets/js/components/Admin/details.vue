<template>
    <div class="student">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="heady">Applicants Bio</h5>
                    <p> <strong>Full Name</strong>: {{student.firstname}}, {{ student.middlename }}, {{ student.lastname }}</p>
                    <p><strong>Session</strong>: {{ student.session }}</p>
                    <p><strong>Email</strong>: {{ student.email }}</p>
                    <p><strong>Phone</strong>: {{ student.phone }}</p>
                    <p><strong>Birth place</strong>: {{ student.birth }}</p>
                    <p><strong>DOB</strong>: {{ formatDate(student.dob) }}</p>
                    <p><strong>Sex</strong>: {{ student.sex }}</p>
                    <p><strong>Type of Sponsor</strong>: {{ student.sponsor }}</p>
                    <p><strong>Program Applied for</strong>: {{ student.type }}</p>
                    <p><strong>Religion</strong>: {{ student.religion }}</p>
                    <p><strong>Marital Status</strong>: {{ student.ms }}</p>
                    <p><strong>Nationality</strong>: {{ student.Nationality }}</p>
                    <p><strong>State of origin</strong>: {{ student.state.state }}</p>
                    <p><strong>Lga</strong>: {{ student.lga.lga }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="heady">Preferred Courses</h5>
                    <p><strong>First Choice</strong>: {{ student.courses.fc }}</p>
                    <p><strong>Second Choice</strong>: {{ student.courses.sc }}</p>
                    <p class="heady">Addresses</p>
                    <p><strong>Home Address</strong>: {{ student.address[0][1] }}</p>
                    <p><strong>Mailing Address</strong>: {{ student.address[1][1] }}</p>
                </div>
                <div v-if="student.payment" class="col-md-6">
                    <h5 class="heady">Payment Details</h5>
                    <p><strong>Status</strong>: {{ student.payment ? 'Paid' : 'Not Paid' }}</p>
                    <p><strong>Amount</strong>: &#8358{{ pricing }}</p>
                    <p><strong>Reference Code</strong>: {{ student.payment.trxn_ref }}</p>
                    <p><strong>Support</strong>: {{ student.payment.support === 1 ? 'Yes' : 'No' }}</p>
                    <p><strong>Date Paid</strong>: {{ formatDate(student.payment.updated_at) }}</p>

                </div>
                <div v-else class="col-md-6">
                    <h5 class="heady">Not Paid</h5>
                </div>
                <div class="col-md-6">
                    <span v-if="student.results.length">
                        <h5 v-if="student.results.length" class="heady">O level results</h5>
                        <div v-for="(subject, index) in student.results">
                            {{ index + 1 }}. <p>{{ subject.subject }} | {{ subject.grade }}</p>
                        </div>
                    </span>
                </div>
                <div class="col-md-6">
                    <h5 class="heady">Next of Kin Details</h5>
                    <p><strong>Name</strong>: {{ student.kin_sponsor[0][1].name }}</p>
                    <p><strong>Email</strong>: {{ student.kin_sponsor[0][1].email }}</p>
                    <p><strong>Phone</strong>: {{ student.kin_sponsor[0][1].phone }}</p>
                    <p><strong>Address</strong>: {{ student.kin_sponsor[0][1].address }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="heady">Sponsor Details</h5>
                    <p><strong>Name</strong>: {{ student.kin_sponsor[1][1].name }}</p>
                    <p><strong>Email</strong>: {{ student.kin_sponsor[1][1].email }}</p>
                    <p><strong>Phone</strong>: {{ student.kin_sponsor[1][1].phone }}</p>
                    <p><strong>Address</strong>: {{ student.kin_sponsor[1][1].address }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="heady">Passport Photo</h5>
                    <img class="img-responsive" :src="getPhoto(student.image)" alt="">
                </div>
            </div>
            <!--<p><strong></strong>: {{ student. }}</p>-->
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        name: "details",
        data () {
            return {
                student: {}
            }
        },
        methods: {
            getPhoto (image) {
                return `storage/${image}`
            },
            formatDate(date) {
                return moment(date).format('Do MMMM YYYY');
            }
        },
        computed: {
            photo () {
                return '/storage'+this.student.image
            },
            pricing () {
                return  (this.student.payment.amount / 100).toLocaleString();
            }
        },
        beforeRouteEnter (to, from, next) {
            axios.get('api/student-detail/'+to.params.studentId)
                .then(response => {
                    next(be => {
                        be.student = response.data;
                        be.student.courses     = JSON.parse(response.data.courses);
                        be.student.address     = Object.entries(JSON.parse(response.data.address));
                        be.student.kin_sponsor = Object.entries(JSON.parse(response.data.kin_sponsor));
                    })
                })
                .catch(error => {
                    console.log(error.response);
                })
            }
    }
</script>

<style scoped>
.heady {
    color: #2fda36;
    font-weight: 30px;
    font-size: 30px !important;
}
</style>