import Vuex from 'vuex';
const store = new Vuex.Store({
    state: {
        count: 0
    },
    getters : {
        getcount() {
            return this.state.count;
        }
    },
    actions: {
        increment(s)
        {
            this.commit('increment');
        }
    },
    mutations: {
        increment (state) {
            state.count++
        }
    }
})