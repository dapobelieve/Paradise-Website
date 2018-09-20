<template>
    <div class="info">
        <fieldset>
            <legend>Billing information</legend>
            <form @submit.prevent="send()" role="form" class="form-horizontal" id="billing-information">
                <div class="row">
                    <div class="col-lg-3">
                        <h3 class="title">Personal Info</h3>
                    </div>
                    <div class="col-lg-8 col-lg-offset-1">
                        <div class="form-group">
                            <label for="billingFirstName" class="col-md-2 control-label">Full Name<small class="text-default">*</small></label>
                            <div class="col-md-10">
                                <input type="text" required v-model="form.name" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billingLastName" class="col-md-2 control-label">Phone Number<small class="text-default">*</small></label>
                            <div class="col-md-10">
                                <input type="text" required class="form-control" v-model="form.phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billingTel" class="col-md-2 control-label">Email Address<small class="text-default">*</small></label>
                            <div class="col-md-10">
                                <input type="email" required class="form-control" v-model="form.email" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <button class="btn btn-default">Submit</button>
            </form>
        </fieldset>
        <div class="text-right">    
            <a class="btn btn-group btn-default"><i class="icon-left-open-big"></i> Go Back To Cart</a>
            <a class="btn btn-group btn-default">Next Step <i class="icon-right-open-big"></i></a>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    data() {
        return {
            form: {
                name: null,
                phone: null,
                email: null
            },
        }
    },
    computed: {
        ...mapGetters({
                cart: 'cart',
                cartTotal: 'cartTotal'
            })
    },
    methods: {
        ...mapActions({
            getCart: 'getCart',
            userData: 'userData',
        }),
        send () {

            this.userData({
                data: this.form
            });

            axios.post('api/record-transaction', {
                'userData': this.form,
                'cart'    : this.cart,
                'total'   : this.cartTotal
            })
            .then(response => {
                console.log(response.data)
            })
            .catch(error => {
                console.log(error.response)
            })
        }
    },
    mounted() {
        this.getCart()
    }
}
    
</script>