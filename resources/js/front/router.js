import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home";
import RestaurantDetails from "./components/pages/RestaurantDetails";
import Checkout from "./components/pages/Checkout";
import Success from "./components/pages/Success";
import PageNotFound from "./components/pages/PageNotFound";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/restaurant/checkout",
            name: "checkout",
            component: Checkout
        },
        {
            path: "/restaurant/checkout/success",
            name: "success",
            component: Success
        },
        {
            path: "/restaurant/:slug",
            name: "restaurant-details",
            component: RestaurantDetails
        },
        // error 404
        {
            path: '/404',
            alias: '*',
            name: "not-found",
            component: PageNotFound,
        },
        
        
    ]
});

export default router