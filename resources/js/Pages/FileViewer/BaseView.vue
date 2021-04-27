<template>
    <b-container>
        <iframe allowfullscreen :src="route('files.open', resource.file_id)"/>
    </b-container>

</template>

<script>
export default {
    name: "BaseView",
    mounted() {
        document.getElementsByClassName('supporters')[0].style.display = 'none';
        document.getElementsByTagName('main')[0].style.minHeight = 'unset';
    },
    props: {
        resource: Object
    }
}
</script>

<style>
iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding-top: 60px;
}
</style>
