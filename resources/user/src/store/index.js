import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// import auth from './modules/auth'
// import todos from './modules/todos'
import home from './modules/home/index'

const storeData = {
    modules: {
        // auth,
        // todos,
        home
    }
}

const store = new Vuex.Store(storeData)

export default store