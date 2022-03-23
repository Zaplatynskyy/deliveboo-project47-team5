import Vue from 'vue'

export default Vue.observable = {
    restaurants: [],
    categories: [],
    tags: [],
    query: '',
    lastQuery: '',
    orderOptions: [
        'rilevanza',
        'costo consegna (basso-alto)',
        'costo consegna (alto-basso)',
        'ordine minimo (basso-alto)',
        'ordine minimo (alto-basso)',
    ],
    order: 'rilevanza',
    noResultsFound: null,
    loaded: false
}