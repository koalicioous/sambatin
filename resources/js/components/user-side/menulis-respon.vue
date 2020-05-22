<template>
    <div class="show-sambat-container">
        <div class="body">
            <div class="header">
                <router-link to="/" class="float-right">
                    Keluar
                </router-link>
                <router-link to="/">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali ke Halaman Utama
                </router-link>
            </div>
            <div class="tag">
                <kategori>Kategori agak panjang</kategori>
                <tema>Ini judul tema</tema>
            </div>
            <div class="sambat-title">
                Tulis Respon untuk Sambat #87612
            </div>
            <div class="sambat-author">
                oleh Kolang-kaling membaca buku di pagi hari
            </div>
            <textarea name="respon" id="" cols="30" rows="10" placeholder="tulis respon di sini"></textarea>
            <button class="btn-green">
                Publish Respon
            </button>
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
