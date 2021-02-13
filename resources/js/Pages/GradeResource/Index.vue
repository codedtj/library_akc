<template>
    <b-col md="8" class="mx-auto simple-list">
        <ul>
            <li v-for="grade in grades">
                <a class="list-item" :href="route('grade-resources.show',grade.id)" :key="grade.id">
                    {{ grade.name }}
                </a>
            </li>
        </ul>
    </b-col>
</template>

<script>
export default {
    name: "Index",
    props: {
        grades: Array
    }
}
</script>
