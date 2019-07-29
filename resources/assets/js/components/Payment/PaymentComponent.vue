<template>
    <div class="payment text-xs-center">
        <div v-if="!paySuccess" class="heading">
            <h1>Pay Now</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div v-if="!button.enable" class="form-group">
                            <input v-model="support" type="checkbox" > Select if you want us to follow up your registration process till the very end.
                            <span style="color: green;">&#8358;2,500</span>
                        </div>
                        <div class="form-group">
                            <button v-if="!button.enable" :disabled="button.enable" @click="payWithPaystack" class="btn btn-success btn-lg">Pay &#8358;{{ pricing }}</button>
                            <button v-if="button.enable" disabled class="btn btn-success btn-lg">
                                {{ loadText }}... <i class='fa fa-spinner fa-spin fa-2x'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="paySuccess" class="heading">
            <div class="container">
                <p>Payment Successful, Please check your mail for further instructions.</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                support: false,
                button: {
                    enable: false,
                },
                loadText: 'Processing ',
                paySuccess: false,
                transaction: {},
                payObj: {
                    addAmount: 250000,
                    email:     'support@paradisedigitalworld.net',
                    amount:    1975000,
                    format:    '',
                    reference: '',
                    psKey: 'pk_test_19aea219c7afdf61293b3cdeed729a8dce1fc5ac',
                    bearer: 'ParadiseDigitalWorld'
                },
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
            payBtn () {
                if (this.button.enable){
                    return "Please wait... ";
                }else{
                    return `${this.payObj.format}`;
                }
            },
            pricing () {
                return  (this.payObj.amount / 100).toLocaleString();
            }
        },
        watch: {
            support (newValue, oldValue) {
                if (newValue === true) {
                    this.payObj.amount = this.payObj.amount + this.payObj.addAmount;
                }else if (newValue === false) {
                    this.payObj.amount = 1975000;
                }
            }
        },
        methods: {
            payNow (ref) {
                axios.get('api/verify-payment/'+this.transaction.id+'/'+ref)
                .then(response => {
                    this.paySuccess = true;
                    alert('Payment Successful');
                    console.log(response.data)
                })
                .catch(error => {
                    alert(error.response);
                })
            },
            close (){
                alert("INCOMPLETE PAYMENT!!!");
            },
            loadScript(callback) {
                // load paystack's inline js script
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
                this.button.enable = true;
                this.scriptLoaded.then(() => {
                    const paystackOptions = {
                        key: this.payObj.psKey,
                        email: this.payObj.email,
                        amount: this.payObj.amount,
                        ref: this.payObj.reference,
                        callback: (response) => {
                            this.loadText = 'Verifying your payment';
                            this.payNow(response.trxref)
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
            }
        },
        mounted() {
            this.payObj.format = `Pay NGN ${this.payObj.amount}`;
            if (this.embed) {
                this.payWithPaystack()
            }
        },
        beforeRouteEnter(to, from, next) {
            axios.get(`api/verify/${to.params.id}`)
                .then(response => {
                    next((vm) => {
                        vm.transaction = response.data;
                    });

                })
                .catch(error => {
                    alert(error.response.data)
                    // alert(error.response);
                    // console.log(error.response);
                });
        }
    }
</script>


<style>
    .heading {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>