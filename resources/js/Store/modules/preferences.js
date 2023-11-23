const state = {
    language: 'en'
};
const getters = {
    LANGUAGE: state => {
        return state.language
    }
};
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
