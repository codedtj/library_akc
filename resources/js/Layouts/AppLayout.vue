<template>
    <div>
        <b-navbar sticky class="shadow-light" toggleable="md" type="dark" variant="info">
            <b-navbar-brand :href="route('home')" class="d-none d-md-block">Библиотека</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <user-nav-item v-if="$page.user" class="d-md-none"></user-nav-item>
                    <b-nav-item v-else :href="route('login')" class="d-md-none">Вход</b-nav-item>

                    <b-nav-item :href="route('home')" :active="route().current('home')">
                        <b-icon-house-door-fill title="На главную"></b-icon-house-door-fill>
                    </b-nav-item>
                    <b-nav-item-dropdown v-if="$page.user" text="Ресурсы" right>
                        <b-dropdown-item :href="route('resources.create')"
                                         :active="route().current('resources.create')">Добавить
                        </b-dropdown-item>
                    </b-nav-item-dropdown>
                    <b-nav-item-dropdown text="Фильтры">
                        <b-dropdown-item :href="route('class-resources.index')"
                                         :active="route().current('class-resources.index')">По классам
                        </b-dropdown-item>
                        <b-dropdown-item :href="route('category-resources.index')"
                                         :active="route().current('category-resources.index')">По категориям
                        </b-dropdown-item>
                    </b-nav-item-dropdown>

                </b-navbar-nav>
            </b-collapse>

            <b-navbar-nav class="ml-auto">
                <div class="search-box">
                    <b-input placeholder="Найти ресурс" v-model="query" @keyup.enter="search"></b-input>
                    <b-icon-search class="search-icon" @click="search"></b-icon-search>
                </div>

                <user-nav-item v-if="$page.user" class="d-none d-md-block"></user-nav-item>
                <b-nav-item v-else :href="route('login')" class="d-none d-md-block">Вход</b-nav-item>

            </b-navbar-nav>
        </b-navbar>
        <main>
            <b-container fluid="md" class="py-5">
                <b-row>
                    <slot></slot>
                </b-row>
            </b-container>
        </main>
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
