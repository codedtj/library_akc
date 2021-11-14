import Vue from 'vue'
import VueI18n from 'vue-i18n'
import tj from "./languages/tj";
import ru from "./languages/ru";
import en from "./languages/en";

Vue.use(VueI18n)

export const i18n = new VueI18n({
        locale: 'tj',
        fallbackLocale: 'tj',
        messages: {
            tj,
            ru,
            en
        }
    }
);


