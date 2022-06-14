<template>
    <div class="container-fluid">
        <div v-for="resource in resources" class="d-flex">
            <a :href="resource.url" class="text-decoration-none" target="_blank">
                <div class="bg-info rounded p-5 ">
                    <span class="text-white" style="font-size: 2rem">{{resource.title}}</span>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "StrangeResourcesTab",
    data(){
        return{
            resources:[
                {
                    url:'/resources/lughatomuzi/story.html',
                    title:'Луғатомӯзӣ'
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
