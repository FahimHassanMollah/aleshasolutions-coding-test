<template>
    <div>
        <header-nav></header-nav>
        <div id="main">
            <div class="row">
                <div class="col s12">
                    <div class="container" style="min-height: 70vh">
                        <div class="section">
                            <div class="row" id="ecommerce-products">
                                <div class="col s12 pr-0">
                                    <div class="row">
                                        <router-link :to="{ name:'products.index' }" class="right waves-effect waves-light gradient-45deg-deep-blue btn z-depth-4">Continue Shopping</router-link>
                                    </div>
                                    <div class="card animate fadeLeft">
                                        <div class="card-content">
                                            <h5>My Cart ({{ cart.length }})</h5>
                                            <div v-if="!cart.length" class="row center-align">
                                                <div>
                                                    <h5>
                                                        <span>Cart is empty!</span>
                                                    </h5>
                                                    <i class="material-icons">sentiment_dissatisfied</i>
                                                </div>
                                            </div>
                                            <div class="row" v-else>
                                                <table class="striped responsive-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th class="right-align">Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(product, index) in cart" :key="product.id">
                                                        <td>
                                                            <span>{{ product.name}}</span>
                                                        </td>
                                                        <td>{{ product.price.toFixed(2)}}</td>
                                                        <td class="center-align valign-wrapper">
                                                            <i title="subtract" class="material-icons" @click="decreaseCartProductQuantity(product)">keyboard_arrow_left</i>
                                                            <span>{{ cart[index].quantity }}</span>
                                                            <i title="add" class="material-icons" @click="increaseCartProductQuantity(product)" >keyboard_arrow_right</i>
                                                        </td>

                                                        <td class="indigo-text right-align">{{ cart[index].quantity * product.price }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="divider mt-3 mb-3"></div>
                                                <div class="invoice-subtotal">
                                                    <div class="row">
                                                        <div class="col m5 s12">
                                                            <p>Thank you for using our site. </p>
                                                        </div>
                                                        <div class="col xl4 m7 s12 offset-xl3">
                                                            <ul>
                                                                <li class="display-flex justify-content-between">
                                                                    <span class="invoice-subtotal-title">Subtotal</span>
                                                                    <h6 class="invoice-subtotal-value">${{ calculateSubtotal().toFixed(2)}}</h6>
                                                                </li>
                                                                <li class="display-flex justify-content-between">
                                                                    <span class="invoice-subtotal-title">Discount</span>
                                                                    <h6 class="invoice-subtotal-value">- $ {{ discount.toFixed(2)}}</h6>
                                                                </li>
                                                                <li class="display-flex justify-content-between">
                                                                    <span class="invoice-subtotal-title">Delivery Charge:</span>
                                                                    <h6 class="invoice-subtotal-value">$ {{ deliveryCharge.toFixed(2) }}</h6>
                                                                </li>
                                                                <li class="divider mt-2 mb-2"></li>
                                                                <li class="display-flex justify-content-between">
                                                                    <span class="invoice-subtotal-title">Invoice Total</span>
                                                                    <h6 class="invoice-subtotal-value" >$ {{ invoiceTotal().toFixed(2) }}</h6>
                                                                </li>
                                                                <li class="divider mt-2 mb-2"></li>
                                                                <li class="display-flex justify-content-between">
                                                                    <router-link :to="{name: 'orders.checkout'}" class="btn btn-light-indigo waves-effect waves-ligh">Proceed to checkout</router-link>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
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
    name: 'CartItem',
    data: () => {
        return {
            cart: [],
            discount: 0.00,
            deliveryCharge: 60.00
        }
    },
    methods: {
        decreaseCartProductQuantity: function (product){
            this.$store.commit('decreaseCartProductQuantity', product);
            this.initCart();
        },
        increaseCartProductQuantity: function (product){
            this.$store.commit('addToCart', product);
            this.initCart();
        },
        initCart(){
            this.cart = [];
            this.cart = this.$store.state.cart;
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
            return total + this.calculateSubtotal() + this.deliveryCharge + this.discount;
        }
    },
    mounted() {
        this.cart = this.$store.state.cart;
    },
}
</script>
