<template>
    <div class="position-relative h-200">
<!--        <b-navbar sticky class="main-nav" toggleable="md" type="light" variant="info">-->
<!--            <b-navbar-brand :href="route('home')" class="d-none d-md-block"><span style="font-size:1.03rem">КИТОБХОНА</span></b-navbar-brand>-->

<!--            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>-->

<!--            <b-collapse id="nav-collapse" is-nav>-->
<!--                <b-navbar-nav>-->
<!--                    <user-nav-item v-if="$page.user" class="d-md-none"></user-nav-item>-->
<!--                    <b-nav-item v-else :href="route('login')" class="d-md-none">Воридшавӣ</b-nav-item>-->

<!--                    <b-nav-item :href="route('home')" :active="route().current('resources.index')" class="d-md-none">-->
<!--                        <span style="font-size: 1rem">КИТОБХОНА</span>-->
<!--                    </b-nav-item>-->

<!--                    <b-nav-item-dropdown v-if="$page.user && $page.menu.resources" text="Маводҳо" right>-->
<!--                        <b-dropdown-item variant="info" :href="route('resources.create')"-->
<!--                                         :active="route().current('resources.create')">Илова-->
<!--                        </b-dropdown-item>-->
<!--                    </b-nav-item-dropdown>-->
<!--                    <b-nav-item :href="route('grade-resources.index')"-->
<!--                                :active="route().current('grade-resources.index')">-->
<!--                        Синфҳо-->
<!--                    </b-nav-item>-->
<!--                    <b-nav-item :href="route('category-resources.index')"-->
<!--                                :active="route().current('category-resources.index')">-->
<!--                        Фанҳо-->
<!--                    </b-nav-item>-->

<!--                    <b-nav-item :href="route('theme-resources.index')"-->
<!--                                :active="route().current('theme-resources.index')">-->
<!--                        Мавзӯҳо-->
<!--                    </b-nav-item>-->
<!--                    <b-nav-item class="d-md-none" :href="route('about')"-->
<!--                                :active="route().current('about')">-->
<!--                        Оид ба лоиҳа-->
<!--                    </b-nav-item>-->
<!--                    <b-nav-item class="d-md-none" :href="route('user-agreement')"-->
<!--                                :active="route().current('user-agreement')">-->
<!--                        Талаботҳои истифодабарӣ-->
<!--                    </b-nav-item>-->
<!--                </b-navbar-nav>-->
<!--            </b-collapse>-->

<!--            <b-navbar-nav class="ml-auto">-->
<!--                <user-nav-item v-if="$page.user" class="d-none d-md-block"></user-nav-item>-->
<!--                <b-nav-item v-else :href="route('login')" class="d-none d-md-block">Воридшавӣ</b-nav-item>-->

<!--            </b-navbar-nav>-->
<!--        </b-navbar>-->

        <b-row align-h="center" class="d-none d-md-flex">
            <div class="MenuBar">
                <a href="#">СИНФХО</a>
                <a href="#">ФАНХО</a>
                <a href="#">МАВЗУХО</a>
                <div class="animation start-home"></div>
            </div>
        </b-row>

        <b-row style="background-color: #01795c" class="d-md-none">
            <button class="btn-transparent"><img src="/icons/hamburger.svg"> </button>
        </b-row>

        <main>
            <b-container fluid>
<!--                <b-row class="my-3">-->
<!--                    <div class="search-box col-md-4 ml-auto">-->
<!--                        <b-input size="sm" placeholder="Ҷустуҷӯи маводҳо" v-model="query" @keyup.enter="search"-->
<!--                                 autocomplete="search"></b-input>-->
<!--                        <b-icon-search class="search-icon" @click="search"></b-icon-search>-->
<!--                    </div>-->
<!--                </b-row>-->
                <b-row>
                    <slot></slot>
                </b-row>
            </b-container>
        </main>
        <div class="supporters">
            <b-container fluid>
                <b-form-row>
                    <div class="col-6 col-md-4">
                        <a  href="https://parlament.tj/ru" class="text-decoration-none">
                            <div id="wrapper-for-tjk-logo">
                                <b-img class="mx-auto mx-md-0" style="padding: 6px" src="/images/emblem-tjk.png"></b-img>
                                <div class="d-none d-md-flex"><span class="my-auto">Вазорати маориф ва илми Ҷумҳурии Тоҷикистон</span></div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-md-4 d-flex">
                        <a  href="https://www.akdn.org/our-agencies/aga-khan-foundation">
                            <b-img class="mx-auto" src="/images/akf-logo-tjk.png"></b-img>
                        </a>
                    </div>

                  <div class="col-md-4 d-none d-md-flex left-section">
                      <ul>
                          <li>
                              <a class="text-secondary text-decoration-none" :href="route('about')">Оид ба лоиҳа</a>
                          </li>
                          <li>
                              <a class="text-secondary text-decoration-none" :href="route('user-agreement')">Талаботҳои истифодабарӣ</a>
                          </li>
                      </ul>
                  </div>

                </b-form-row>
            </b-container>

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
import Button from "../Jetstream/Button";

export default {
    components: {
        Button,
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
<style>
.MenuBar {
    position: absolute;
}

.MenuBar a {
    font-size: 14px;
    text-transform: uppercase;
    color: white;
    text-decoration: none;
    line-height: 50px;
    position: relative;
    z-index: 1;
    display: inline-block;
    text-align: center;
}

.MenuBar .animation {
    position: absolute;
    height: 3px;
    /* height: 5px; */
    bottom: 0;
    /* bottom: 0; */
    z-index: 0;
    background: white;
    border-radius: 8px;
    transition: all .5s ease 0s;
}

.MenuBar a:nth-child(1) {
    width: 100px;
}

.MenuBar .start-home, a:nth-child(1):hover ~ .animation {
    width: 100px;
    left: 0;
}

.MenuBar a:nth-child(2) {
    width: 110px;
}

.MenuBar a:nth-child(2):hover ~ .animation {
    width: 110px;
    left: 100px;
}

.MenuBar a:nth-child(3) {
    width: 100px;
}

.MenuBar a:nth-child(3):hover ~ .animation {
    width: 100px;
    left: 210px;
}

.MenuBar a:nth-child(4) {
    width: 160px;
}

.MenuBar a:nth-child(4):hover ~ .animation {
    width: 160px;
    left: 310px;
}

.MenuBar a:nth-child(5) {
    width: 120px;
}

.MenuBar a:nth-child(5):hover ~ .animation {
    width: 120px;
    left: 470px;
}
</style>
