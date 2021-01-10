<template>
    <b-nav-item-dropdown>
        <template #button-content>
            <span class="user-name">{{ $page.user.name }}</span>
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
<style>
.user-name {
    display: inline-block;
    text-overflow: ellipsis;
    width: 130px;
    overflow: hidden;
}
</style>
