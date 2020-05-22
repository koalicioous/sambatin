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
                Sambat #87612
            </div>
            <div class="sambat-author">
                oleh Kolang-kaling membaca buku di pagi hari
            </div>
            <div class="sambat-content">

            </div>
            <button @click="$router.push('menulis-respon')" class="btn-green">
                Beri Respon
            </button>
            <div class="response">
                <h5>Respon Sambat Ini:</h5>
                <div class="sambat-response-card">
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                </div>
                <div class="sambat-response-card">
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                </div>
                <div class="sambat-response-card">
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                </div>
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
