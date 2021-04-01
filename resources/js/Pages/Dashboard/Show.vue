<template>
    <b-container fluid>
        <b-row>
            <b-col cols="12">
                <b-jumbotron>
                    <b-container fluid>
                        <b-row>
                            <a class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('profile.show')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #3399CC">
                                    <b-icon-person font-scale="2" class="tile-icon text-white">
                                    </b-icon-person>
                                    <span class="tile-content">Саҳифаи ман</span>
                                </b-aspect>
                            </a>

                            <a class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('my-resources')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #339999">
                                    <b-icon-collection font-scale="2" class="tile-icon text-white">
                                    </b-icon-collection>
                                    <span class="tile-content">Маводҳои ман</span>
                                </b-aspect>
                            </a>

                            <a class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('favourite.index')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #ff0099">
                                    <b-icon-bookmark-heart font-scale="2" class="tile-icon text-white">
                                    </b-icon-bookmark-heart>
                                    <span class="tile-content">Интихобшуда</span>
                                </b-aspect>
                            </a>
                        </b-row>
                    </b-container>
                </b-jumbotron>
            </b-col>
            <b-col cols="12" v-if="$page.is_admin">
                <b-jumbotron>
                    <b-container fluid>
                        <b-row>
                            <a class="col-sm-4 col-md-4 col-lg-3 p-0 mr-sm-4 mb-4" :href="route('users.index')">
                                <b-aspect aspect="square" class="tile  shadow-light" style="background: #33CCCC">
                                    <b-icon-people font-scale="2" class="tile-icon text-white">
                                    </b-icon-people>
                                    <span class="tile-content">Истифодабарандагон</span>
                                </b-aspect>
                            </a>
                        </b-row>
                    </b-container>
                </b-jumbotron>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "Show"
}
</script>

<style scoped>
.tile {
    position: relative;
    border-radius: 5px;
    transition: 0.2s ease;
}

.tile:hover {
    cursor: pointer;
    transform: scale(1.02);
}

.tile:active {
    transform: scale(0.98);
}

.tile-content {
    position: absolute;
    bottom: 8px;
    left: 10px;
    color: #ffffff;
}

.tile-icon {
    top: calc(50% - 14px);
    right: calc(50% - 14px);
    position: absolute;
}
</style>
