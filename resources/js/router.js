import Vue from "vue";

import vueRouter from "vue-router";
Vue.use(vueRouter);

export default new vueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'products.index',
            component: () => import('./components/products/ProductIndex')
        },
        {
            path: '/product/:slug',
            name: 'products.show',
            component: () => import('./components/products/ProductShow')
        },
        {
            path: '/shopping-cart',
            name: 'orders.cart',
            component: () => import('./components/orders/CartItem')
        },
        {
            path: '/checkout',
            name: 'orders.checkout',
            component: () => import('./components/orders/CheckoutOrder')
        },
        {
            path: '/thank-you',
            name: 'orders.thank-you',
            props: true,
            component: () => import('./components/orders/ThankYou')
        }
    ]
})

