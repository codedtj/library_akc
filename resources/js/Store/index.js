import Vue from 'vue';
import Vuex from 'vuex';
import preferences from "./modules/preferences";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        preferences
    }
});
