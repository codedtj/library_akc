<template>
    <b-col cols="12">
        <b-jumbotron>
            <b-container fluid>
                <b-row>
                    <a class="col-md-3 p-0" :href="route('my-resources')">
                        <b-aspect aspect="square" class="tile  shadow-light">
                            <b-icon-collection font-scale="2" class="tile-icon text-white">
                            </b-icon-collection>
                            <span class="tile-content">Мои ресурсы</span>
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
    background: #17a2b8;
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
    top: 35%;
    right: 41%;
    position: absolute;
}
</style>
