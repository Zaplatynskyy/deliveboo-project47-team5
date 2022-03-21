import Vue from 'vue'

export default Vue.observable = {
    restaurants: [],
    categories: [],
    tags: [],
    query: '',
    lastQuery: '',
    noResultsFound: null
}