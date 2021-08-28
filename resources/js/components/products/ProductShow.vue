<template>
    <div>
        <header-nav></header-nav>
        <div id="main">
            <div class="row">
                <div class="col s12">
                    <div class="container" style="min-height: 70vh">
                        <div class="section">
                            <div class="row" id="ecommerce-products">
                                <div class="col s12 m12 pr-0" v-if="products.length">
                                    <div class="col s12">
                                        <div class="card animate fadeUp">
                                            <div class="card-content">
                                                <div class="row" id="product-four">
                                                    <div class="col m6 s12">
                                                        <img :src="hasImage(product.image)" class="responsive-img"  :alt="product.name">
                                                    </div>
                                                    <div class="col m6 s12">
                                                        <h5>{{ product.name }}</h5>
                                                        <span class="new badge left ml-0 mr-2" data-badge-caption="">4.2 Star</span>
                                                        <p>Availability: <span class="green-text">Available</span></p>
                                                        <hr class="mb-5">
                                                        <h6>Product Description</h6>
                                                        <div v-html="product.description"></div>
                                                        <h5 class="red-text">Only at ${{ product.price.toFixed(2) }}</h5>
                                                        <a class="waves-effect waves-light btn gradient-45deg-deep-purple-blue z-depth-4 mt-2 mr-2" :class="checkProductIsInCart(product.id)" @click="$store.commit('addToCart', product)">ADD TO
                                                            CART</a>
                                                        <router-link class="waves-effect waves-light btn gradient-45deg-purple-deep-orange z-depth-4 mt-2" :to="{name: 'products.index'}">Continue Shopping</router-link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 pr-0" v-else>
                                    <div class="col s12 m12 l12">
                                        <div class="card animate fadeLeft">
                                            <div class="card-content">
                                                <h6 class="center">No Product Found!</h6>
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
    name: 'ProductShow',
    computed: {
        products() {
            return this.$store.state.products;
        },
        product() {
            return this.products.find(product => product.slug === this.$route.params.slug);
        },

    },
    methods: {
        hasImage: (image) =>{
            if(image){
                return "/storage/"+image[0];
            }
            return '/app-assets/images/gallery/no-image.png';
        },
        checkProductIsInCart(productId){
            let hasProduct = this.$store.state.cart.find(product => product.id === productId);
            if (hasProduct){
                return "disabled";
            }
        },
    },
}
</script>
