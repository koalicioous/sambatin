<template>
    <div class="main-container-pesan">
        <div class="find-pesan">
            <div class="header">
                <router-link to="/" class="float-right">
                    Keluar
                </router-link>
                <router-link to="/">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali ke Halaman Utama
                </router-link>
            </div>
            <div class="profil-container">
                <h1 class="display">Selamat Datang</h1>
                <h5>Kolang-kaling membaca buku di pagi hari</h5>
                <button class="btn-green">
                    <i class="fas fa-plus"></i>
                    Tulis sambat baru
                </button>
                <div class="user-sambat-container">
                    <p class="label">Sambatku yang lalu</p>
                    <div class="user-sambat-item">
                        <div class="user-sambat-card">
                            <div class="user-sambat-card-content">
                                ini adalah teks yang akan berisi isi sambat <br>ini adalah teks yang akan berisi isi sambat <br>ini adalah teks yang akan berisi isi sambat <br>ini adalah teks yang akan berisi isi sambat <br>ini adalah teks yang akan berisi isi sambat <br>ini adalah teks yang akan berisi isi sambat <br>ini adalah teks yang akan berisi isi sambat <br>
                            </div>
                            <div class="user-sambat-card-footer">
                                <router-link to="/" class="float-right">
                                    Lihat response
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:15px">
                        <p class="text-center"><router-link to="/">Klik di sini untuk bantuan psikologis lebih lanjut</router-link></p>
                    </div>
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
                 nama: {
                     subjek: '',
                     predikat: '',
                     keterangan: '',
                 }
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
