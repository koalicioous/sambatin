<template>
    <div class="main-container">
        <div class="main-menu d-flex justify-content-center align-items-center">
            <div class="main-menu-text">
                <h1 class="display">Jangan dipikul <p class="underlined"><i>sendirian.</i></p></h1>
                <p class="subtitle"><b>Dengarkan pesan</b> dari orang
                                    yang pernah mengalami masalah
                                    serupa denganmu, atau
                                    <b><mark>sambatkan sebuah keresahan.</mark></b>
                </p>
                <div class="main-menu-action">
                    <router-link to="/sebelum-sambat" class="btn-orange">Sambatkan</router-link>
                    <router-link to="/temukan-pesan" class="btn-green">Temukan Pesan</router-link>
                </div>
                <div class="main-menu-footer">
                    <a href="">Klik di sini untuk bantuan psikologis lebih lanjut</a>
                </div>    
            </div>
        </div>
        <div class="sub-menu d-flex justify-content-center align-items-center">
            <router-link to="/menulis-pesan" class="sub-menu-button">Tulis Pesan untuk Orang Lain</router-link>
            <router-link to="/eksplor-sambat" class="sub-menu-button">Baca Sambat dan Beri Semangat</router-link>
            <router-link to="/klaim-nama" class="sub-menu-button">Baca Respon Sambatku</router-link>
        </div>
        <div class="credit d-flex justify-content-center align-items-center">
                <p>Sambat by <a href="">eQuilibrium</a> | from Covid-19 quarantine depression</p>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
   
</style>
