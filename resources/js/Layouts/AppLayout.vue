<template>
    <div class="position-relative h-200">
        <navbar></navbar>
        <main>
            <b-container fluid>
                <b-row>
                    <slot></slot>
                </b-row>
            </b-container>
        </main>
        <div class="supporters">
            <b-container fluid>
                <b-form-row>
                    <div class="col-6 col-md-4">
                        <div id="wrapper-for-tjk-logo">
                            <b-img class="mx-auto mx-md-0" style="padding: 6px"
                                   src="/images/emblem-tjk.png"></b-img>
                            <div class="d-none d-md-flex"><span
                                class="my-auto first-letter-capitalize">{{ $t('label.ministry_of_education') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 d-flex">
                        <b-img class="mx-auto"
                               :src="`/images/akf-logo-${$store.state.preferences.language}.png`"></b-img>
                    </div>

                    <div class="col-md-4 d-none d-md-flex left-section">
                        <ul>
                            <li>
                                <inertia-link class="text-secondary text-decoration-none" :href="route('about')">
                                    <span class="first-letter-capitalize">{{ $t('label.about_us') }}</span>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link class="text-secondary text-decoration-none"
                                              :href="route('user-agreement')">
                                    <span class="first-letter-capitalize">{{ $t('label.user_agreement') }}</span>
                                </inertia-link>
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
import Navbar from "./Navbar";

export default {
    components: {
        Navbar,
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

</style>
