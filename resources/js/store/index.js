
export default {
    state: {
        categories : [],
    },
    getters : {
        getAllCategories(state) {
            return state.categories;
        }
    },
    actions: {
        allCategories(context){
            axios.get('/api/v1/categories')
                .then( response => {
                    context.commit('allCategory', response.data.data);
                })
        }
    },
    mutations: {
        allCategory(state, data){
            state.categories = data;
        }
    }
}