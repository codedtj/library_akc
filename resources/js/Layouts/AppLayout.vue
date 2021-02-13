<template>
    <div class="position-relative">
        <b-navbar sticky class="main-nav shadow-light" toggleable="md" type="dark" variant="info">
            <b-navbar-brand :href="route('home')" class="d-none d-md-block">Китобхона</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <user-nav-item v-if="$page.user" class="d-md-none"></user-nav-item>
                    <b-nav-item v-else :href="route('login')" class="d-md-none">Воридшавӣ</b-nav-item>

                    <b-nav-item :href="route('home')" :active="route().current('resources.index')" class="d-md-none">
                        Китобхона
                    </b-nav-item>

                    <b-nav-item-dropdown v-if="$page.user && $page.menu.resources" text="Маводҳо" right>
                        <b-dropdown-item variant="info" :href="route('resources.create')"
                                         :active="route().current('resources.create')">Илова
                        </b-dropdown-item>
                    </b-nav-item-dropdown>
                    <b-nav-item :href="route('grade-resources.index')"
                                :active="route().current('grade-resources.index')">
                        Синфҳо
                    </b-nav-item>
                    <b-nav-item :href="route('category-resources.index')"
                                :active="route().current('category-resources.index')">
                        Фанҳо
                    </b-nav-item>

                    <b-nav-item :href="route('theme-resources.index')"
                                :active="route().current('theme-resources.index')">
                        Мавзӯҳо
                    </b-nav-item>
                </b-navbar-nav>
            </b-collapse>

            <b-navbar-nav class="ml-auto">
                <user-nav-item v-if="$page.user" class="d-none d-md-block"></user-nav-item>
                <b-nav-item v-else :href="route('login')" class="d-none d-md-block">Воридшавӣ</b-nav-item>

            </b-navbar-nav>
        </b-navbar>
        <main>
            <b-container fluid="md">
                <b-row class="my-3">
                    <div class="search-box ml-auto mr-3">
                        <b-input size="sm" placeholder="Ҷустуҷӯи маводҳо" v-model="query" @keyup.enter="search"
                                 autocomplete="search"></b-input>
                        <b-icon-search class="search-icon" @click="search"></b-icon-search>
                    </div>
                </b-row>
                <b-row>
                    <slot></slot>
                </b-row>
            </b-container>
        </main>
        <div class="supporters shadow-light">
            <a href="https://parlament.tj/ru">
                <b-img style="padding: 6px" src="/images/emblem-tjk.png"></b-img>
            </a>
            <a href="https://www.akdn.org/our-agencies/aga-khan-foundation">
                <b-img src="/images/akf-logo-tjk.png"></b-img>
            </a>
            <ul>
                <li>
                    <a class="text-secondary text-decoration-none" :href="route('about')">О проекте</a>
                </li>
                <li>
                    <a class="text-secondary text-decoration-none" :href="route('user-agreement')">Условия использования</a>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
import UserNavItem from "@/Layouts/UserNavItem";

export default {
    components: {
        UserNavItem,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },

    data() {
        return {
            showingNavigationDropdown: false,
            query: null
        }
    },

    methods: {
        search() {
            if (this.query)
                this.$inertia.visit(this.route('search', this.query))
            else
                this.$inertia.visit(this.route('home'))
        }
    }
}
</script>
