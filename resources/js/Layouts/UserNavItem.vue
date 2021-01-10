<template>
    <b-nav-item-dropdown>
        <template #button-content>
            <em>{{ $page.user.name }}</em>
        </template>
        <b-dropdown-item :href="route('dashboard')"
                         :active="route().current('dashboard')">Обзор
        </b-dropdown-item>
        <b-dropdown-item @click.prevent="logout" href="#">Выйти</b-dropdown-item>
    </b-nav-item-dropdown>
</template>

<script>
export default {
    name: "UserNavItem",
    methods: {
        logout() {
            axios.post(route('logout').url()).then(response => {
                window.location = '/';
            })
        },
    }
}
</script>
