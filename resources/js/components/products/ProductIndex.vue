<template>
    <div>
        <header-nav></header-nav>
        <div id="main">
            <div class="row">
                <div class="col s12">
                    <div class="container" style="min-height: 70vh">
                        <div class="section">
                            <div class="row" id="ecommerce-products">
<!--                                categories-->
                                <div class="col s12 m3 l3 pr-0 hide-on-med-and-down animate fadeLeft categories">
                                    <div class="card">
                                        <div class="card-content">
                                            <span class="card-title">Categories</span>
                                            <a @click="getAllProducts" href="#">All Categories</a>
                                            <hr class="p-0 mb-10">
                                            <div v-if="categories.length">
                                                <ul v-for="category in categories" :key="category.id">
                                                    <li>
                                                        <a href="#"  @click="filterProductByCategory(category.slug)">{{ category.name }}</a>
                                                        <ul v-if="category.child_categories" v-for="childCategory in category.child_categories" :key="childCategory.id">
                                                            <li>
                                                                <a href="#" @click="filterProductByCategory(childCategory.slug)">&emsp;{{'-- '+childCategory.name }}</a>
                                                                <ul v-if="childCategory.child_categories" v-for="childChildCategory in childCategory.child_categories" :key="childChildCategory.id">
                                                                    <li>
                                                                        <a href="#" @click="filterProductByCategory(childChildCategory.slug)">&emsp; &emsp;{{'-- --'+childChildCategory.name }}</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div v-else>No Category Found.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l9 pr-0" v-if="$store.state.products.length">
                                    <div v-for="product in $store.state.products" :key="product.id">
                                        <div class="col s12 m4 l4">
                                            <div class="card animate fadeLeft">
                                                <div class="card-content">
                                                    <p class="card-title text-ellipsis">{{ product.name }}</p>
                                                    <img :src="hasImage(product.image)" class="center responsive-img" alt="">
                                                    <div class="display-flex flex-wrap justify-content-center">
                                                        <h5 class="mt-3">${{ product.price.toFixed(2) }}</h5>
                                                        <router-link class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4" :to="{name: 'products.show', params: {slug: product.slug}}">
                                                            View
                                                        </router-link>
                                                        <a class="mt-2 waves-effect waves-light gradient-45deg-deep-blue btn  modal-trigger z-depth-4" :class="checkProductIsInCart(product.id)" @click="$store.commit('addToCart', product)">Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12 l9 pr-0" v-else>
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
    name: 'ProductIndex',
    computed: {
        products(){
           return this.$store.state.products;
        },
        categories(){
            return this.$store.state.categories;
        }
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
        filterProductByCategory(slug){
            axios.get('/api/v1/categories/'+slug)
                .then((response) => {
                    this.$store.commit('updateProducts', response.data.data);
                })
                .catch((error) =>{
                console.log(error);
                });
        },

        getAllProducts(){
            axios.get('/api/v1/products')
                .then((response) => {
                    this.$store.commit('updateProducts', response.data.data);
                })
                .catch((error) =>{
                    console.log(error);
                });
        }

    },
}
</script>
