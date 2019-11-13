<template>
  <div class="main col-md-12">
    <div class="row">
        <div class="col-md-12" >
            <h3 class="text-center">POST JAMB PAST QUESTION AVAILABLE HERE. IF YOU ARE INTERESTED, CLICK HERE TO DOWNLOAD. JUST 1K ONLY</h3>
            <div class="download-buttons">
                <span>
                <button v-if="!files.funaab" @click.prevent="payWithPaystack($event)" id="funaab" class="btn btn-lg btn-default" >Download Past Questions (FUNAAB)</button>
                    <a v-else href="https://res.cloudinary.com/invitro/image/upload/v1563953269/paradise/FUNAAB_SCIENCE_PAST_QUESTION_AND_ANSWER_FINAL.pdf">Download</a>
                </span>
                <span>
                    <button v-if="!files.oou" @click.prevent="payWithPaystack($event)" id="oou" class="btn btn-lg btn-default" >Download Past Questions (OOU)</button>
                    <a v-else href="https://res.cloudinary.com/invitro/image/upload/v1565140767/paradise/OOU_Past_Questions._Olawale.pdf">Download</a>
                </span>
                <span>
                    <button v-if="!files.unilorin" @click.prevent="payWithPaystack($event)" id="unilorin" class="btn btn-lg btn-default" >Download Past Questions (UNILORIN)</button>
                    <a v-else href="https://res.cloudinary.com/invitro/image/upload/v1565140767/paradise/DOC-20190620-WA0010.pdf">Download</a>
                </span>
            </div>
        </div>
    </div>
</div>
</template>

<script>
  export default {
    data () {
      return {
          selected: null,
        files: {
           oou: false,
           funaab: false,
           unilorin: false
        },
        showLink: false,
        payObj: {
          email:     'support@paradisedigitalworld.net',
          amount:    1000 * 100,
          format:    '',
          reference: '',
          // psKey: 'pk_test_19aea219c7afdf61293b3cdeed729a8dce1fc5ac',
          psKey: 'pk_live_967e39181d8db4c87169f67f633802a96d120849',
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
    },
    mounted () {
      if (this.embed) {
        this.payWithPaystack()
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
      payWithPaystack(event) {
          this.selected = event.target.id;
        this.scriptLoaded.then(() => {
          const paystackOptions = {
            key: this.payObj.psKey,
            email: this.payObj.email,
            amount: this.payObj.amount,
            ref: this.payObj.reference,
            callback: (response) => {
              if (response.status === "success")
                this.files[this.selected] = true;
                console.log(response);
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
    }
  }
</script>

<style>
    .download-buttons {
        display:flex;
        justify-content: space-between;
    }
    @media(max-width: 960px) {
        .download-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }
</style>