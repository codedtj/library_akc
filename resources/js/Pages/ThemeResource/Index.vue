<template>
    <b-col md="8" class="mx-auto simple-list">
        <ul>
            <li v-for="theme in themes">
                <a class="list-item" :href="route('theme-resources.show',theme.id)" :key="theme.id">
                    {{ theme.name }}</a>
            </li>
        </ul>
    </b-col>
</template>

<script>
export default {
    name: "Index",
    props: {
        themes: Array
    }
}
</script>
