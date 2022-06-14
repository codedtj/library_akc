<template>
    <div class="container-fluid">
        <div  class="d-flex flex-wrap">
            <a v-for="resource in resources" :href="resource.url" class="text-decoration-none d-block pr-3 pb-3" target="_blank">
                <div class="bg-info rounded p-5 ">
                    <span class="text-white" style="font-size: 1.1rem">{{resource.title}}</span>
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
                    url:'/resources/1/story.html',
                    title:'Луғатомӯзӣ'
                },
                {
                    url:'/resources/2/story.html',
                    title:'Усули аз амалия ба назария'
                },
                {
                    url:'/resources/3/story.html',
                    title:'Тарзи рушд додани салоҳияти тафаккури интиқодии хонандагон'
                },
                {
                    url:'/resources/4/story.html',
                    title:'ШДХСМ'
                },
                {
                    url:'/resources/5/story.html',
                    title:'Санъат ва меҳнат'
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
