<template>
    <b-col md="8" class="mx-auto simple-list">
        <ul>
            <li><a class="list-item" :href="route('class-resources.show',1)">Класс 1</a></li>
            <li><a class="list-item" :href="route('class-resources.show',2)">Класс 2</a></li>
            <li><a class="list-item" :href="route('class-resources.show',3)">Класс 3</a></li>
            <li><a class="list-item" :href="route('class-resources.show',4)">Класс 4</a></li>
            <li><a class="list-item" :href="route('class-resources.show',5)">Класс 5</a></li>
            <li><a class="list-item" :href="route('class-resources.show',6)">Класс 6</a></li>
            <li><a class="list-item" :href="route('class-resources.show',7)">Класс 7</a></li>
            <li><a class="list-item" :href="route('class-resources.show',8)">Класс 8</a></li>
            <li><a class="list-item" :href="route('class-resources.show',9)">Класс 9</a></li>
            <li><a class="list-item" :href="route('class-resources.show',10)">Класс 10</a></li>
            <li><a class="list-item" :href="route('class-resources.show',11)">Класс 11</a></li>
        </ul>
    </b-col>
</template>

<script>
export default {
    name: "Index"
}
</script>
