<template>
    <div class="main-container-pesan">
        <div class="find-pesan">
            <div class="header">
                <router-link to="/">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali ke Halaman Utama
                </router-link>
            </div>
            <div class="pesan-container">

            </div>
                <p class="my-2 text-center">Apakah pesan ini membantu?</p>
            <div class="rating d-flex justify-content-center align-items-center">
                <button class="btn-rating">Ya</button>
                <button class="btn-rating">Tidak</button>
            </div>
            <div class="isi-pesan-footer d-flex align-items-center justify-content-between">
                <router-link to="/temukan-pesan">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Temukan pesan kategori lain
                </router-link>
                <button class="btn-green btn-search-again">
                    Temukan Lagi
                </button>
            </div>
        </div>
        <div class="credit d-flex justify-content-center align-items-center">
                <p>Sambat by <a href="">eQuilibrium</a> | from Covid-19 quarantine depression</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                 
            }
        },
        methods: {
             
        },
        mounted() { 

        }
    }
</script>

<style>

</style>
