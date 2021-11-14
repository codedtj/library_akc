const state = {
    language: 'tj'
};
const getters = {};
const mutations = {};
const actions = {
    CHANGE_LANGUAGE: (context, language) => {
        context.state.language = language;
    }
};

export default {
    state,
    getters,
    mutations,
    actions,
};
