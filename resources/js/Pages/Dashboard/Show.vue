<template>
    <b-col cols="12">
        <b-jumbotron>
            <b-container fluid>
                <b-row>
                    <a class="col-sm-4 col-md-3 p-0 mr-4" :href="route('profile.show')">
                        <b-aspect aspect="square" class="tile  shadow-light" style="background: #3399CC">
                            <b-icon-person font-scale="2" class="tile-icon text-white">
                            </b-icon-person>
                            <span class="tile-content">Профиль</span>
                        </b-aspect>
                    </a>

                    <a class="col-sm-4 col-md-3 p-0 mr-4" :href="route('my-resources')">
                        <b-aspect aspect="square" class="tile  shadow-light" style="background: #339999">
                            <b-icon-collection font-scale="2" class="tile-icon text-white">
                            </b-icon-collection>
                            <span class="tile-content">Мои ресурсы</span>
                        </b-aspect>
                    </a>

                    <a class="col-sm-4 col-md-3 p-0 mr-4" :href="route('favourite.index')">
                        <b-aspect aspect="square" class="tile  shadow-light" style="background: #ff0099">
                            <b-icon-bookmark-heart font-scale="2" class="tile-icon text-white">
                            </b-icon-bookmark-heart>
                            <span class="tile-content">Избранное</span>
                        </b-aspect>
                    </a>
                </b-row>
            </b-container>
        </b-jumbotron>
    </b-col>

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
