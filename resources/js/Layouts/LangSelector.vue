<template>
    <b-dropdown right no-caret toggle-class="transparent-btn">
        <template v-slot:button-content>
            <img class="lng-icon" :src="language.icon">
        </template>
        <b-dropdown-item href="#" @click="changeLanguage('tj')" v-if="language.key !== 'tj'">
            <img class="lng-icon" src="/images/svg/tj-flag.svg"><span> Тоҷикӣ</span>
        </b-dropdown-item>
        <b-dropdown-item href="#" @click="changeLanguage('ru')" v-if="language.key !== 'ru'">
            <img class="lng-icon" src="/images/svg/ru-flag.svg"><span> Русский</span>
        </b-dropdown-item>
        <b-dropdown-item href="#" @click="changeLanguage('en')" v-if="language.key !== 'en'">
            <img class="lng-icon" src="/images/svg/gb-flag.svg"><span> English</span>
        </b-dropdown-item>
    </b-dropdown>
</template>

<script>
    export default {
        name: "LangSelector",
        methods: {
            changeLanguage(language) {
                this.$store.dispatch('CHANGE_LANGUAGE', language);
                this.$i18n.locale = language;
            }
        },
        computed: {
            language() {
                switch (this.$store.state.preferences.language) {
                    case 'tj':
                        return {
                            name: ' Тоҷикӣ',
                            icon: '/icons/tj-flag.svg',
                            key: 'tj'
                        };
                    case 'en':
                        return {
                            name: 'English',
                            icon: '/icons/gb-flag.svg',
                            key: 'en'
                        };
                    case 'ru':
                        return {
                            name: 'Русский',
                            icon: '/icons/ru-flag.svg',
                            key: 'ru'
                        }
                }
            },
        }
    }
</script>

<style scoped>

</style>
