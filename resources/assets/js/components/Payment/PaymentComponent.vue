<template>
    <div class="payment">
        <button @click="payWithPaystack">Pay Now</button>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                activeNav: true,
                bookRef: '',
                button: {
                    enable: false,
                },
                payObj: {
                    addAmount: 2500,
                    stdAmount: 19750,
                    email:     'dredsn@gmail.com',
                    amount:    0,
                    format:    '',
                    reference: '',
                    psKey: 'pk_test_19aea219c7afdf61293b3cdeed729a8dce1fc5ac',
                    // secretKey: 'pk_test_19aea219c7afdf61293b3cdeed729a8dce1fc5ac',
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
                    return 'Please wait...'
                }else{
                    return `Pay NGN ${this.payObj.format}`;
                }
            }
        },
        methods: {
            payNow (response) {
                alert('Processing your Payment. This would take few seconds, Please wait...');

                axios.post('api/payment', {
                    ref: response,
                    admin: false
                })
                .then(response => {
                    window.location = window.url+`success/${this.bookRef}`;
                    // console.log(response.data);
                })
                .catch(error => {
                    alert(error.data)
                })
            },
            close: function(){
                console.log("Payment closed")
            },
            loadScript(callback) {
                // load paystack's inline js script
                const script = document.createElement('script')
                script.src = 'https://js.paystack.co/v1/inline.js'
                document.getElementsByTagName('head')[0].appendChild(script)
                if (script.readyState) {
                    // IE
                    script.onreadystatechange = () => {
                        if (script.readyState === 'loaded' || script.readyState === 'complete') {
                            script.onreadystatechange = null
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
                            this.payNow(response.trxref)
                        },
                        onClose: () => {
                            this.close()
                        },
                        metadata: this.metadata,
                        currency: this.currency,
                    }

                    if (this.embed) {
                        paystackOptions.container = 'paystackEmbedContainer'
                    }

                    const handler = window.PaystackPop.setup(paystackOptions)
                    if (!this.embed) {
                        handler.openIframe()
                    }
                })
            }
        },
        mounted() {
            this.payObj.amount = this.payObj.stdAmount * 100;
            alert(this.payObj.amount);
            if (this.embed) {
                this.payWithPaystack()
            }
        },
        beforeRouteEnter(to, from, next)
        {
            axios.get(`api/verify/${to.params.id}`)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error.response);
            });

            next();
        }
        // beforeRouteEnter(to, from, next)
        // {
        //     let bookRef = to.params.bookRef;

        //     axios.get('/api/getpay/'+bookRef)
        //     .then( response => {
        //         // console.log(response.data);
        //         next(vm => {
        //             vm.payObj.amount = parseInt(response.data.amount * 100);
        //             vm.payObj.format = response.data.format;
        //             vm.payObj.email  = response.data.email;
        //             vm.payObj.key    = response.data.psKey;
        //             vm.payObj.reference = response.data.ref;
        //             vm.bookRef = bookRef;

        //         });
        //     })
        //     .catch( error => {
        //         alert('Couldnt get your booking details. Unauthorised Access!');
        //     });
        // }
    }
</script>