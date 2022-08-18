const state = {
    auth: {
        isAuthentication: false 
    }
}

const getters = {
    isAuthentication: state => state.auth.isAuthentication
}

const actions = {

}

const mutations = {
    TOGGLE_AUTH(state) {
        state.auth.isAuthentication = !state.auth.isAuthentication
    }
}

export default {
    state,
    getters,
    mutations,
    actions
}