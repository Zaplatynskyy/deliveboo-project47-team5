import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home";
import AdvancedSearch from "./components/pages/AdvancedSearch";
import RestaurantDetails from "./components/pages/RestaurantDetails";

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
            path: "/restaurant/:slug",
            name: "restaurant-details",
            component: RestaurantDetails
        },
        
    ]
});

export default router