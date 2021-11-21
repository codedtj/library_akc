<template>
    <div class="col-12">
        <h1 class="my-5 text-center">Оид ба лоиҳа</h1>
        <template v-if="$store.state.preferences.language == 'tj'">
            <p>
                Китобхонаи электронӣ дар ҳамкорӣ бо Раёсати Маорифи ВМКБ ва ФДҶТИБКСМ дар ВМКБ дар мувофиқа бо Вазорати
                Маориф
                ва Илми Ҷумҳурии Тоҷикистон ва дастгирии молиявии Фонди Оғохон барои кормандони соҳаи маориф, омӯзгорон
                ва
                хонандагони муассисаҳои таҳсилоти миёнаи умумӣ ва инчунини дигар падару модарон таҳия шудааст.
            </p>
            <p>
                Мақсади асосӣ ин зиёд намудани дастрасӣ ба маводҳои омӯзишӣ ва таълимӣ
                мебошад. Маводҳои дар китобхонаи электронӣ овардашуда бе иҷозати таҳиякунандагони китобхонаи электронӣ
                бознашр,
                фурӯхта ва дар дигар мавридҳои шахсӣ ё ғайритаълимӣ истифода нашаванд.
            </p>
        </template>
        <template v-if="$store.state.preferences.language == 'en'">
            <p>
                The electronic library was developed in collaboration with the Regional Education Department (RED),
                In-service Teacher Training Institute (ITTI) of GBAO, in agreement with the Ministry of Education and
                Science of the Republic of Tajikistan (MoES) and with financial support from the Aga Khan Foundation
                Tajikistan (AKF Tjk) for educators, teachers, and students, as well as parents.
            </p>
            <p>
                The core objective of the project is to make teaching and learning resources more accessible. Recourses
                provided in the electronic library should not be republished, sold, or used for other personal or
                non-educational purposes without the approval of the electronic library's developers.
            </p>
        </template>
        <template v-if="$store.state.preferences.language == 'ru'">
            <p>
                Электронная библиотека была разработана совместно с Областным управлением образования,
                Институтом повышения квалификации учителей ГБАО, по согласованию с Министерством образования и
                Науки Республики Таджикистан и при финансовой поддержке "Фонда Ага Хана
                Таджикистан" для учителей, студентов и родителей.
            </p>
            <p>
                Основная цель проекта - сделать ресурсы для преподавания и обучения более доступными. Ресурсы
                предоставленные электронной библиотеке, не должны переиздаваться, продаваться или использоваться для других личных или
                необразовательных целях без согласования с разработчиками электронной библиотеки.
            </p>
        </template>
    </div>
</template>

<script>
export default {
    name: "AboutUs"
}
</script>

<style scoped>

</style>
