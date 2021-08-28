<template>
    <div>
        <header-nav></header-nav>
        <div id="main">
            <div class="row">
                <div class="col s12">
                    <div class="container" style="min-height: 70vh">
                        <div class="section">
                            <div v-if="!cart.length" class="row center-align">
                                <div>
                                    <h5>
                                        <span>Cart is empty!</span>
                                    </h5>
                                    <i class="material-icons">sentiment_dissatisfied</i>
                                    <br>
                                    <router-link :to="{name: 'products.index'}" class="btn btn-small">Continue Shopping</router-link>
                                </div>
                            </div>
                            <div class="row animate fadeLeft" v-else>
                                <div class="col s4">
                                    <div class="card-panel" style="min-height: 70vh">
                                        <h6>Customer Info</h6>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="name" name="name" type="text" class="validate" v-model="customer.name">
                                                <label for="name">Name</label>
                                                <span v-if="nameError" class="red-text">Name field is required.</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="email" name="email" type="text" class="validate" v-model="customer.email">
                                                <label for="email">Email</label>
                                                <span v-if="emailError" class="red-text">Email field is required.</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="phone" name="phone" type="text" class="validate" v-model="customer.phone">
                                                <label for="phone">Phone</label>
                                                <span v-if="phoneError" class="red-text">Phone field is required.</span>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="address" name="address" class="materialize-textarea" v-model="customer.address">{{ customer.address }}</textarea>
                                                <label for="address">Address</label>
                                                <span v-if="addressError" class="red-text">Address field is required.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="card-panel" style="min-height: 70vh">
                                        <h6>Shipping Method</h6>
                                        <span v-if="shippingMethodError" class="red-text">Please Select a shipping method</span>

                                        <p>
                                            <label>
                                                <input name="shipping" v-model="orderDetails.shippingMethod" @click="checkDeliveryCharge('home')" value="home" class="with-gap" type="radio"  checked/>
                                                <span>Home Delivery (within 2 hours)</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                                <input name="shipping" v-model="orderDetails.shippingMethod" @click="checkDeliveryCharge('restaurant')" value="restaurant" class="with-gap" type="radio" />
                                                <span>Restaurant Pickup</span>
                                            </label>
                                        </p>
                                        <h6>Payment Method</h6>
                                        <span v-if="paymentMethodErrors" class="red-text">Please Select a Payment method</span>
                                        <p>
                                            <label>
                                                <input name="payment" v-model="orderDetails.paymentMethod" value="cash" class="with-gap" type="radio" checked />
                                                <span>Cash Payment</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                                <input name="payment" v-model="orderDetails.paymentMethod" value="card" type="radio" disabled="disabled" />
                                                <span>Card Payment</span>
                                            </label>
                                        </p>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea name="additional_note" v-model="orderDetails.additionalNote" id="note" row="6" class="materialize-textarea">{{ orderDetails.additionalNote }}</textarea>
                                                <label for="note">Additional Note</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="card-panel" style="min-height: 70vh">
                                        <h6>Order Summery</h6>
                                        <div class="row">
                                            <div class="col s12">
                                                <ul>
                                                    <li class="display-flex justify-content-between" v-for="product in $store.state.cart" :key="product.id">
                                                        <span class="invoice-subtotal-title"><img :src="productImage(product.image)" class="responsive-img" alt="" width="30px" height="30px"></span>
                                                        <span>{{ product.name.substring(0,6)+" ..."}}</span>
                                                        <span>{{ product.quantity}}</span>
                                                        <h6 class="invoice-subtotal-value">$ {{ (product.price * product.quantity).toFixed(2) }}</h6>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li class="divider mt-2 mb-2"></li>
                                                    <li class="display-flex justify-content-between">
                                                        <span class="invoice-subtotal-title">Subtotal</span>
                                                        <h6 class="invoice-subtotal-value">${{ orderDetails.subtotal.toFixed(2) }}</h6>
                                                    </li>
                                                    <li class="display-flex justify-content-between">
                                                        <span class="invoice-subtotal-title">Discount</span>
                                                        <h6 class="invoice-subtotal-value">- $ {{ orderDetails.discount.toFixed(2)}}</h6>
                                                    </li>
                                                    <li class="display-flex justify-content-between">
                                                        <span class="invoice-subtotal-title">Delivery Charge</span>
                                                        <h6 class="invoice-subtotal-value" v-model="orderDetails.deliveryCharge">$ {{ orderDetails.deliveryCharge.toFixed(2) }}</h6>
                                                    </li>
                                                    <li class="divider mt-2 mb-2"></li>
                                                    <li class="display-flex justify-content-between">
                                                        <span class="invoice-subtotal-title">Invoice Total</span>
                                                        <h6 class="invoice-subtotal-value" v-model="orderDetails.total" >$ {{ orderDetails.total.toFixed(2) }}</h6>
                                                    </li>
                                                    <li class="divider mt-2 mb-2"></li>
                                                    <li class="display-flex justify-content-between">
                                                        <button @click="confirmOrder" class="btn btn-block btn-light-indigo waves-effect waves-ligh">Confirm Order</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <footer-section></footer-section>
    </div>
</template>

<script>
export default {
    name: "CheckoutOrder",
    data: () => {
        return {
            cart: [],
            customer: {
                name: '',
                email: '',
                phone: '',
                address: '',
            },
            orderDetails: {
                shippingMethod: '',
                paymentMethod: '',
                additionalNote: '',
                subtotal: 0.00,
                discount: 0.00,
                deliveryCharge: 60.00,
                total: 0.00,
            },
            nameError: false,
            emailError: false,
            phoneError: false,
            addressError: false,
            shippingMethodError: false,
            paymentMethodErrors: false,

        }
    },
    methods: {
        productImage: (image) =>{
            if(image){
                return "/storage/"+image[0];
            }
            return '/app-assets/images/gallery/no-image.png';
        },
        calculateSubtotal(){
            let subtotal = 0.00;
            this.cart.forEach((product) => {
                subtotal += product.quantity * product.price;
            })
            return subtotal;
        },
        invoiceTotal(){
            let total = 0.00;
            return total + this.calculateSubtotal() + this.orderDetails.deliveryCharge + this.orderDetails.discount;
        },
        checkDeliveryCharge(type){
            if (type == 'restaurant'){
                this.orderDetails.deliveryCharge = 0.00;
                this.orderDetails.total = this.invoiceTotal();
                return;
            }
            this.orderDetails.deliveryCharge = 60.00;
            this.orderDetails.total = this.invoiceTotal();
            return;
        },
        checkInputs(){
            if(!this.customer.name){
                this.nameError = true;
            } else {
                this.nameError = false;
            }
            if (!this.customer.email){
                this.emailError = true;
            } else {
                this.emailError = false;
            }
            if (!this.customer.phone){
                this.phoneError = true;
            } else {
                this.phoneError = false;
            }
            if(!this.customer.address){
                this.addressError = true;
            } else {
                this.addressError = false;
            }
            if(this.orderDetails.paymentMethod == ''){
                this.paymentMethodErrors = true;
            } else {
                this.paymentMethodErrors = false;
            }
            if(this.orderDetails.shippingMethod == ''){
                this.shippingMethodError = true;
            } else {
                this.shippingMethodError = false;

            }
        },
        confirmOrder(){
            this.checkInputs();
            if (!this.nameError && !this.emailError && !this.phoneError && !this.addressError && !this.paymentMethodErrors && !this.shippingMethodError){

                axios.post('/api/v1/orders/', {
                    cart: this.$store.state.cart,
                    order_details: this.orderDetails,
                    customer: this.customer,
                })
                    .then((response)=>{
                        if (response.data.status == 'success'){
                            this.$store.dispatch('clearCart');
                            this.$router.push({
                                name: 'orders.thank-you',
                                params: {
                                    success: true,
                                }
                            });
                        }
                }).catch((error) => {
                    console.error(error);
                })

            }
        }
    },
    mounted() {
        this.cart = this.$store.state.cart;
        this.orderDetails.subtotal = this.calculateSubtotal();
        this.orderDetails.total = this.invoiceTotal();
    },
}
</script>
