import axios  from "axios"

const state = {
    todos: []
}
const getters = {
    todos: state => state.todos
}

const mutations = {
    SET_TODOS(state, todos) {
        state.todos = todos
    },
    GET_LIST_TASKS(state, newTodo) {
        state.todos.unshift(newTodo)
    },
    DELETE_TODO(state, todoId) {
        state.todos = state.todos.filter(todo => todo.id !== todoId)
    },
}

const actions = {
    async getTodos({commit}) {
        try {
            const response = await axios.get('http://127.0.0.1:8000/api/index')
            commit('SET_TODOS', response.data.data)
        } catch (error) {
            console.log(error)
        }
    },
    async addTask({commit}, newTodo) {
        try {
            await axios.post('http://127.0.0.1:8000/api/add', newTodo)
            commit('GET_LIST_TASKS', newTodo)
        } catch (error) {
            console.log(error)
        }   
    },
    async deleteTask({commit}, id) {
        if (confirm("Are you sure delete this Task?")) {
            try {
                await axios.post('http://127.0.0.1:8000/api/delete', { id: id })
                commit('DELETE_TODO', id)
            } catch (error) {
                console.log(error)
            }
        }
    },
    async deleteAll({commit}, params) {
        params = this.todos;
        try {
            await axios.post('http://127.0.0.1:8000/api/add', {params})
            commit('GET_LIST_TASKS', params)
        } catch (error) {
            console.log(error)
        }   
    },
}

export default {
    state,
    getters,
    mutations,
    actions
}
