import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        products: [],
        categories: [],
        cart: [],
    },
    mutations: {
        updateProducts: function (state, products) {
            state.products = products;
        },
        updateCategories: function (state, categories) {
            state.categories = categories;
        },
        addToCart: function (state, product) {
            let productInCartIndex = state.cart.findIndex(item => item.slug === product.slug);
            if (productInCartIndex !== -1) {
                state.cart[productInCartIndex].quantity++;
                return;
            }
            product.quantity = 1;
            state.cart.push(product);
        },
        decreaseCartProductQuantity: function (state, product) {
            let productInCartIndex = state.cart.findIndex(item => item.slug === product.slug);
            if (productInCartIndex !== -1) {
                state.cart[productInCartIndex].quantity--;
            }
            if (state.cart[productInCartIndex].quantity <= 0) {
                state.cart.splice(productInCartIndex, 1);
            }
        },
        removeFromCart(state, index) {
            state.cart.splice(index, 1);
        },
        updateCart(state, cart) {
            state.cart = cart;
        }
    },
    actions: {
        getProducts({commit}) {
            axios.get('/api/v1/products')
                .then((response) => {
                    commit('updateProducts', response.data.data);
                })
                .catch((error) => console.error(error));
        },
        getCategories({commit}) {
            axios.get('/api/v1/categories')
                .then((response) => {
                    commit('updateCategories', response.data.data);
                })
                .catch((error) => console.error(error));
        },
        clearCart({commit}) {
            commit('updateCart', []);
        }
    }
});
