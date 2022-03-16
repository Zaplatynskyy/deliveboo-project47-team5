import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home";
import AdvancedSearch from "./components/pages/AdvancedSearch";
import RestaurantDetails from "./components/pages/RestaurantDetails";
import Checkout from "./components/pages/Checkout";
import Success from "./components/pages/Success";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/advanced-search/:from/:query",
            name: "advanced-search",
            component: AdvancedSearch
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
        
        
    ]
});

export default router