<template>
    <b-container fluid class="bg-akf-favourite pb-1">
        <b-row align-h="center" align-v="baseline" class="d-none d-md-flex position-relative">
            <div class="c-nav-left">
                <inertia-link class="c-nav-item" :href="route('home')"
                              :class="{active:route().current('resources.index')}">
                    {{ $t('label.library') }}
                </inertia-link>
            </div>
            <div class="c-navbar">
                <a class="c-nav-item" href="http://maorifvmkb.tj/">{{ $t('label.home_btn') }}</a>

                <inertia-link class="c-nav-item" :href="route('grade-resources.index')"
                              :class="{active:route().current('grade-resources.index')}">
                    {{ $tc('label.grade', 2) }}
                </inertia-link>
                <inertia-link class="c-nav-item" :href="route('category-resources.index')"
                              :class="{active:route().current('category-resources.index')}">{{
                        $tc('label.subject', 2)
                    }}
                </inertia-link>
                <inertia-link class="c-nav-item" :href="route('theme-resources.index')"
                              :class="{active:route().current('theme-resources.index')}">{{ $tc('label.theme', 2) }}
                </inertia-link>
            </div>
            <div class="c-nav-right">
                <user-nav-item v-if="$page.user" class="d-none d-md-block"></user-nav-item>
                <inertia-link v-else :href="route('login')" class="sign-in-btn text-always-akf-favourite mr-1">
                    {{ $t('label.sign_in') }}
                </inertia-link>
                <lang-selector></lang-selector>
            </div>

        </b-row>


        <div class="d-md-none">
            <b-row align-h="center" class="py-3">
                <button class="hamburger hamburger--spin js-hamburger mr-3"
                        @click="menuCollapsed = !menuCollapsed"
                        :class="{'is-active': !menuCollapsed}"
                        type="button">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                </button>
            </b-row>

            <div class="collapsed-menu pb-3" v-show="!menuCollapsed">
                <inertia-link class="c-dropdown-item" :href="route('home')"
                              :class="{active:route().current('resources.index')}">
                    {{ $t('label.library') }}
                </inertia-link>
                <a class="c-dropdown-item" href="http://maorifvmkb.tj/">{{ $t('label.home_btn') }}</a>
                <inertia-link class="c-dropdown-item" :href="route('grade-resources.index')"
                              :class="{active:route().current('grade-resources.index')}">
                    {{ $tc('label.grade', 2) }}
                </inertia-link>
                <inertia-link class="c-dropdown-item" :href="route('category-resources.index')"
                              :class="{active:route().current('category-resources.index')}">{{
                        $tc('label.subject', 2)
                    }}
                </inertia-link>
                <inertia-link class="c-dropdown-item" :href="route('theme-resources.index')"
                              :class="{active:route().current('theme-resources.index')}">{{ $tc('label.theme', 2) }}
                </inertia-link>
            </div>
        </div>


    </b-container>
</template>

<script>
import LangSelector from "./LangSelector";
import UserNavItem from "./UserNavItem";

export default {
    name: "Navbar",
    components: {UserNavItem, LangSelector},
    data() {
        return {
            menuCollapsed: true
        }
    }
}
</script>

<style scoped>
.c-navbar {
    display: flex;
}

.c-nav-item {
    font-size: 1rem;
    color: #ffffffba;
    text-decoration: none;
    padding: 10px;
    position: relative;
    text-transform: uppercase;
}

.c-navbar .c-nav-item:hover {
    cursor: pointer;
}

.c-navbar .c-nav-item::after {
    content: '';
    position: absolute;
    width: 0px;
    height: 3px;
    left: 50%;
    bottom: 0;
    background-color: white;
    transition: all ease-in-out .2s;
}

.c-navbar .c-nav-item:hover::after {
    width: 100%;
    left: 0;
}

.c-navbar .active::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 3px;
    bottom: 0;
    left: 0;
    background-color: white;
}

.c-navbar:hover .active::after {
    width: 0
}

.c-nav-right {
    position: absolute;
    display: flex;
    right: 0;
    height: 100%;
    align-items: center;
}

.c-nav-left {
    position: absolute;
    display: flex;
    left: 0;
    height: 100%;
    align-items: center;
}

.hamburger {
    outline: none;
}

.sign-in-btn {
    border: none;
    height: fit-content;
    text-transform: uppercase;
    border-radius: 20px;
    padding: 0 10px;
    outline: none;
    background: white;
    text-decoration: none;
}

.sign-in-btn:hover {
    cursor: pointer;
}

.c-dropdown-item {
    font-size: 1rem;
    color: white;
    text-decoration: none;
    padding: 10px;
    position: relative;
    text-transform: uppercase;
    display: block;
    text-align: center;
    border-bottom: solid #ffffffba 2px;
}

.collapsed-menu .active {
    border-bottom: solid #ffffff 2px;
}
</style>
