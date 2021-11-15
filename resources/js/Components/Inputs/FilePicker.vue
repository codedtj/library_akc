<template>
    <b-container fluid>
        <b-row>
            <b-form-file :browse-text="$t('label.browse')" :placeholder="$t('message.no_file_chosen')" :accept="accept" v-bind:value="value"
                         v-on:change="onChange">
            </b-form-file>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "FilePicker",
    props:{
        value:{
            default:null
        },
        accept:String
    },
    methods:{
        onChange(e) {
            this.$emit('input', e.target.files[0])
        },
    }
}
</script>

<style scoped>

</style>
