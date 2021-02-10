const state = {
    url: null,
    genre: null,
    card: true,
}

const getters = {
    url: state => state.url ? state.url : '/photo',
    genre: state => state.genre ? state.genre : 0,
    card: state => state.card ? state.card : false
}

const mutations = {
    setUrl(state, url) {
        state.url = url;
    },
    setGenre(state, genre) {
        state.genre = genre;
    },
    setCard(state, card) {
        state.card = card;
    },
}

const actions = {}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
}

