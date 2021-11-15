<template>
    <b-dropdown toggle-class="transparent-btn" right style="padding-top:5px">
        <template #button-content>
            <span class="user-name">{{ userInitials }}</span>
        </template>
        <b-dropdown-item-button variant="info" @click="$inertia.visit(route('dashboard'))"><span
            class="text-capitalize">{{ $t('label.dashboard') }}</span>
        </b-dropdown-item-button>
        <b-dropdown-item-button variant="info" @click.prevent="logout"><span class="text-capitalize">{{
                $t('label.sign_out')
            }}</span></b-dropdown-item-button>
    </b-dropdown>
</template>

<script>
export default {
    name: "UserNavItem",
    methods: {
        logout() {
            axios.post(route('logout').url()).then(_ => {
                this.$inertia.visit(this.route('home'))
            })
        },
    },
    computed: {
        userInitials(){
            let rgx = new RegExp(/(\p{L}{1})\p{L}+/, 'gu');

            let initials = [...this.$page.user.name.matchAll(rgx)] || [];

            return (
                (initials.shift()?.[1] || '') + (initials.pop()?.[1] || '')
            ).toUpperCase();
        }
    }
}
</script>
<style>
.user-name {
    display: inline-block;
    text-overflow: ellipsis;
    overflow: hidden;
    color: #ffffffba;
    text-transform: uppercase;
}
</style>
