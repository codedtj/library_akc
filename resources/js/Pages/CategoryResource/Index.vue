<template>
    <b-col md="8" class="mx-auto simple-list">
        <ul>
            <li v-for="category in categories">
                <a class="list-item" :href="route('category-resources.show',category.id)"
                   :key="category.id">{{ category.name }}</a>
            </li>
        </ul>
    </b-col>
</template>

<script>
export default {
    name: "Index",
    props: {
        categories: Array
    }
}
</script>
