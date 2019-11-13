<template>
    <div class="solar">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="form-block center-block p-30 light-gray-bg border-clear">
                        <h2 style="color: #000" class="center-block">Solar Training Registration</h2>
                        <form class="form-horizontal" role="form">
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label">Full Name <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.name" class="form-control" placeholder="Full Name"  >
                                    <span v-if="errors.name" class="has-error">
                                    {{ errors.name[0] }}
                                </span>
                                </div>

                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.email" class="form-control" placeholder="Email Address"  >
                                    <span v-if="errors.email" class="has-error">
                                    {{ errors.email[0] }}
                                </span>
                                </div>

                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputLastName" class="col-sm-3 control-label">Phone Number <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.phone" class="form-control" placeholder="Phone Number"  >
                                    <span v-if="errors.phone" class="has-error">
                                    {{ errors.phone[0] }}
                                </span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Status <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <select name="status" v-model="form.status" class="form-control">
                                        <option selected>---Select---</option>
                                        <option value="student">Student</option>
                                        <option value="non-student">Not Student</option>
                                    </select>
                                    <span v-if="errors.status" class="has-error">
                                        {{ errors.status[0] }}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Contact Address <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <textarea v-model="form.address" name="address" rows="5" class="form-control" >
                                        {{  }}
                                    </textarea>
                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                    <span v-if="errors.address" class="has-error">
                                        {{ errors.address[0] }}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <div class="checkbox">
                                        <label>
                                            <input v-model="form.agree" type="checkbox" > Accept our <a href="#">privacy policy</a> and <a href="#">customer agreement</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button :disabled="btn.state" @click.prevent="processForm" class="btn btn-group btn-default btn-animated">{{btn.text}} <i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </div>
    
</template>

<script>
    import axios from 'axios';
    export default {
        data () {
            return {
                instance: null,
                errors: {},
                payObj: {
                    email:     'support@paradisedigitalworld.net',
                    amount:    5000 * 100,
                    format:    '',
                    reference: '',
                    // psKey: 'pk_test_19aea219c7afdf61293b3cdeed729a8dce1fc5ac',
                    psKey: 'pk_live_967e39181d8db4c87169f67f633802a96d120849',
                    bearer: 'ParadiseDigitalWorld'
                },
                btn: {
                    state: false,
                    text: 'Register'
                },
                form : {
                    name: "",
                    email: "",
                    phone: "",
                    status: "",
                    address: "",
                    agree: false

                }
            }
        },
        computed: {
            scriptLoaded: function() {
                return new Promise((resolve) => {
                    this.loadScript(() => {
                        resolve();
                    })
                })
            },
        },
        methods: {
            close (){
                alert("INCOMPLETE PAYMENT!!!");
            },
            loadScript(callback) {
                const script = document.createElement('script');
                script.src = 'https://js.paystack.co/v1/inline.js';
                document.getElementsByTagName('head')[0].appendChild(script);
                if (script.readyState) {
                    // IE
                    script.onreadystatechange = () => {
                        if (script.readyState === 'loaded' || script.readyState === 'complete') {
                            script.onreadystatechange = null;
                            callback()
                        }
                    }
                } else {
                    // Others
                    script.onload = () => {
                        callback()
                    }
                }
            },
            payWithPaystack() {
                this.scriptLoaded.then(() => {
                    const paystackOptions = {
                        key: this.payObj.psKey,
                        email: this.payObj.email,
                        amount: this.payObj.amount,
                        ref: this.payObj.reference,
                        callback: (response) => {
                            this.form.payRef = response.reference;
                            this.submitForm();
                        },
                        onClose: () => {
                            this.close()
                        },
                        metadata: null,
                        currency: this.currency,
                    };
                    if (this.embed) {
                        paystackOptions.container = 'paystackEmbedContainer'
                    }
                    const handler = window.PaystackPop.setup(paystackOptions);
                    if (!this.embed) {
                        handler.openIframe()
                    }
                })
            },
            processForm () {
                this.btn.state = !this.btn.state;
                this.btn.text = 'Processing...';
              let form = this.form;
              if (!form.name || !form.address || !form.status || !form.email || !form.phone) {
                  this.showAlertmessage('All fields required!', 'error', 3000);
                  this.btn.state = !this.btn.state;
                  this.btn.text = 'Register';
                  return;
              }

                if (!this.form.agree) {
                    this.showAlertmessage('Accept our privacy policy and customer agreement', 'error', 3000);
                    this.btn.state = !this.btn.state;
                    this.btn.text = 'Register';
                    return;
                }

                this.payWithPaystack();
          },
            submitForm () {
                this.instance.post('api/solar-register', this.form)
                    .then(response => {
                        this.btn.state = !this.btn.state;
                        this.btn.text = 'Register';
                        // console.log(response.data);
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        this.btn.state = !this.btn.state;
                        this.btn.text = 'Register';
                    });
            },
            showAlertmessage(message, type, time=1000) {
                this.$swal({
                    title: message,
                    type: type,
                    showConfirmButton: false,
                    timer: time
                })
            },
        },
        mounted() {
            if (this.embed) {
                this.payWithPaystack();
            }
        },
        created() {
            this.instance = axios.create({
                baseURL: '/'
            });
        }
    }
</script>

<style scoped>

</style>