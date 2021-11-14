<template>
    <b-container fluid class="bg-akf-favourite pb-1">
        <b-row align-h="center" align-v="baseline" class="d-none d-md-flex position-relative">
            <div class="c-navbar">
                <a class="c-nav-item" href="http://maorifvmkb.tj/">{{$t('label.home_btn')}}</a>
                <a class="c-nav-item" :href="route('home')" :class="{active:route().current('resources.index')}">КИТОБХОНА</a>
                <a class="c-nav-item" :href="route('grade-resources.index')" :class="{active:route().current('grade-resources.index')}">СИНФХО</a>
                <a class="c-nav-item" :href="route('category-resources.index')" :class="{active:route().current('category-resources.index')}">ФАНХО</a>
                <a class="c-nav-item" :href="route('theme-resources.index')" :class="{active:route().current('theme-resources.index')}">МАВЗУХО</a>
            </div>
            <div class="c-nav-right">
                <a class="sign-in-btn text-always-akf-favourite mr-1">Воридшави</a>
                <lang-selector></lang-selector>
            </div>

        </b-row>

        <b-row align-h="center" class="d-md-none py-3">
            <button class="hamburger hamburger--spin js-hamburger mr-3"
                    @click="menuCollapsed = !menuCollapsed"
                    :class="{'is-active': !menuCollapsed}"
                    type="button">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
            </button>
        </b-row>


    </b-container>
</template>

<script>
import LangSelector from "./LangSelector";
export default {
    name: "Navbar",
    components: {LangSelector},
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

.c-navbar .c-nav-item {
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

.c-nav-right{
    position: absolute;
    display: flex;
    right: 0;
    height: 100%;
    align-items: center;
}

.hamburger {
    outline: none;
}

.sign-in-btn{
    border: none;
    height: fit-content;
    text-transform: uppercase;
    border-radius: 20px;
    padding: 0 10px;
    outline: none;
    background: white;
    text-decoration: none;
}

.sign-in-btn:hover{
    cursor:pointer;
}
</style>
