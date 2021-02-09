const state = {
    url: null,
    genre: null,
}

const getters = {
    url: state => state.url ? state.url : '/photo',
    genre: state => state.genre ? state.url : 0,
}

const mutations = {
    setUrl(state, url) {
        state.url = url;
    },
    setGenre(state, genre) {
        state.genre = genre;
    }
}

const actions = {}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
}

