<template>
    <div>
        <b-navbar toggleable="md" type="dark" variant="info">
            <b-navbar-brand :href="route('home')">AKF Library</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item-dropdown text="Ресурсы" right>
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

                <b-nav-item-dropdown right v-if="$page.user">
                    <!-- Using 'button-content' slot -->
                    <template #button-content>
                        <em>{{ $page.user.name }}</em>
                    </template>
                    <!--                    <b-dropdown-item :href="route('profile.show')" :active="route().current('profile.show')">Profile-->
                    <!--                    </b-dropdown-item>-->
                    <b-dropdown-item :href="route('dashboard')"
                                     :active="route().current('dashboard')">Обзор</b-dropdown-item>
                    <b-dropdown-item @click.prevent="logout" href="#">Выйти</b-dropdown-item>
                </b-nav-item-dropdown>
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

export default {
    components: {
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
        },
        logout() {
            axios.post(route('logout').url()).then(response => {
                window.location = '/';
            })
        },
    }
}
</script>
