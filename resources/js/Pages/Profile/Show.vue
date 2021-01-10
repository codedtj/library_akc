<template>
    <div class="w-100">
        <b-row>
            <b-col cols="12" v-if="$page.jetstream.canUpdateProfileInformation">
                <update-profile-information-form :user="$page.user"/>
            </b-col>

            <div v-if="$page.jetstream.canUpdatePassword">
                <update-password-form class="mt-10 sm:mt-0"/>

                <jet-section-border/>
            </div>

            <div v-if="$page.jetstream.canManageTwoFactorAuthentication">
                <two-factor-authentication-form class="mt-10 sm:mt-0"/>

                <jet-section-border/>
            </div>

            <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0"/>

            <jet-section-border/>

            <delete-user-form class="mt-10 sm:mt-0"/>
        </b-row>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import DeleteUserForm from './DeleteUserForm'
import JetSectionBorder from '@/Jetstream/SectionBorder'
import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
import UpdatePasswordForm from './UpdatePasswordForm'
import UpdateProfileInformationForm from './UpdateProfileInformationForm'

export default {
    props: ['sessions'],

    components: {
        AppLayout,
        DeleteUserForm,
        JetSectionBorder,
        LogoutOtherBrowserSessionsForm,
        TwoFactorAuthenticationForm,
        UpdatePasswordForm,
        UpdateProfileInformationForm,
    },
}
</script>
