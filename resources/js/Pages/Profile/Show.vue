<template>
    <div class="w-100">
        <b-row>
            <b-col cols="12" class="mb-5" v-if="$page.jetstream.canUpdateProfileInformation">
                <update-profile-information-form :user="$page.user"/>
            </b-col>

            <b-col cols="12" class="mb-5" v-if="$page.jetstream.canUpdatePassword">
                <update-password-form/>
            </b-col>

            <b-col cols="12" class="mb-5">
                <logout-other-browser-sessions-form :sessions="sessions"/>
            </b-col>

            <b-col cols="12" class="mb-5">
                <delete-user-form/>
            </b-col>
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
