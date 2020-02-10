
export default {
    state: {
        categories : [],
        brands : [],
    },
    getters : {
        getAllCategories(state) {
            return state.categories;
        },
        getAllBrands(state) {
            return state.brands;
        },
    },
    actions: {
        allCategories(context){
            axios.get('/api/v1/categories')
                .then( response => {
                    context.commit('allCategories', response.data.data);
                })
        },
        allBrands(context){
            axios.get('/api/v1/brands')
                .then( response => {
                    context.commit('allBrands', response.data.data);
                })
        },
    },
    mutations: {
        allCategories(state, data){
            state.categories = data;
        },
        allBrands(state, data){
            state.brands = data;
        },
    }
}