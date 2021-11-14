<template>
    <b-col md="8" class="mx-auto simple-list">
        <ul>
            <li v-for="grade in grades">
                <inertia-link class="list-item text-capitalize" :href="route('grade-resources.show',grade.id)" :key="grade.id">
                    {{$t('label.' + grade.name.replaceAll(' ', '_')) }}
                </inertia-link>
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
