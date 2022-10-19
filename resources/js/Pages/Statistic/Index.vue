<template>
    <b-container fluid class="mt-5">
        <b-col cols="12">
            <b-jumbotron>
                <b-container fluid>
                    <b-row>
                        <b-card bg-variant="warning" text-variant="white" header="All Resouces" class="text-center col-sm-3 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{recources_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="primary" text-variant="white" header="Fiction books" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{fiction_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="secondary" text-variant="white" header="Textbooks" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{textbooks_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="success" text-variant="white" header="Video lessons" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{video_lessons_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="info" text-variant="white" header="Practical virtual lessons" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{practical_virtual_lessons_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="danger" text-variant="white" header="Interactive books" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{interactive_books_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="secondary" text-variant="white" header="Demonstrations" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{demonstrations_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="dark" text-variant="white" header="Industry materials" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{industry_materials_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="warning" text-variant="white" header="Additional course materials" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{additional_course_materials_count}}</b-card-text>
                        </b-card>
                        <b-card bg-variant="warning" text-variant="white" header="Teacher training materials" class="text-center col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4">
                            <b-card-text>{{teacher_training_materials_count}}</b-card-text>
                        </b-card>
                    </b-row>

                </b-container>
            </b-jumbotron>
        </b-col>
    </b-container>
</template>

<script>
export default {
    name: "Index",
    props: {
        recources_count: Array,
        fiction_count: Array,
        textbooks_count: Array,
        video_lessons_count: Array,
        practical_virtual_lessons_count: Array,
        interactive_books_count: Array,
        demonstrations_count: Array,
        industry_materials_count: Array,
        additional_course_materials_count: Array,
        teacher_training_materials_count: Array,
    }
}
</script>

<style scoped>

</style>
