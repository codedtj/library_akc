<template>
    <b-nav-item-dropdown>
        <template #button-content>
            <span class="user-name">{{ $page.user.name }}</span>
        </template>
        <b-dropdown-item variant="info" :href="route('dashboard')"
                         :active="route().current('dashboard')">Шарҳ
        </b-dropdown-item>
        <b-dropdown-item variant="info" @click.prevent="logout" href="#">Баромад</b-dropdown-item>
    </b-nav-item-dropdown>
</template>

<script>
export default {
    name: "UserNavItem",
    methods: {
        logout() {
            axios.post(route('logout').url()).then(_ => {
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
    max-width: 130px;
    overflow: hidden;
}
</style>
