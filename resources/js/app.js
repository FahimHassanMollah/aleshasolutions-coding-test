require('./bootstrap');
import Vue from 'vue';

import router from './router';
import store from './store';


Vue.component('HeaderNav', require('./components/common/HeaderNav').default);
Vue.component('FooterSection', require('./components/common/FooterSection').default);
Vue.component('ProductIndex', require('./components/products/ProductIndex').default);
Vue.component('ProductShow', require('./components/products/ProductShow').default);
Vue.component('CartItem', require('./components/orders/CartItem').default);
Vue.component('CheckoutOrder', require('./components/orders/CheckoutOrder').default);
Vue.component('ThankYou', require('./components/orders/ThankYou').default);

const app = new Vue({
    store,
    router,
    el: '#app',
    created() {
        store.dispatch('getProducts')
            .then(_ => {})
            .catch((error) => console.error(error));
        store.dispatch('getCategories')
            .then(_ => {})
            .catch((error) => console.error(error));

    }

})

