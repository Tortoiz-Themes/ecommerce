import Vuex from 'vuex';
const store = new Vuex.Store({
    state: {
        count: 0
    },
    getters : {
        getallCategory() {
            return this.state.count;
        }
    },
    actions: {
        increment(s)
        {
            this.mutations.
        }
    },
    mutations: {
        increment (state) {
            state.count++
        }
    }
})