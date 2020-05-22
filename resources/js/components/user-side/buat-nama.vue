<template>
    <div class="main-container-pesan">
        <div class="find-pesan">
            <div class="header">
                <router-link to="/">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali ke Halaman Utama
                </router-link>
            </div>
            <div class="sebelum-sambat-container">
                <h1 class="dislpay">Membuat Nama Anonim Baru</h1>
                <hr/>
                <div class="buat-nama-input">
                    <div class="pesan-category-input">
                        <p class="pesan-category-label">Aku adalah</p>
                        <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="nama.subjek" v-on:change="">
                            <option value="" disabled selected>Pilih sebuah subjek</option>
                            <option value="kolang-kaling">Kolang-Kaling</option>
                        </select>
                    </div>
                    <div class="pesan-category-input">
                        <p class="pesan-category-label">yang sedang</p>
                        <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="nama.predikat" v-on:change="">
                            <option value="" disabled selected>Beri subjek sebuah predikat</option>
                            <option value="membaca buku">membaca buku</option>
                        </select>
                    </div>
                    <div class="pesan-category-input">
                        <p class="pesan-category-label">keterangan</p>
                        <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="nama.keterangan" v-on:change="">
                            <option value="" disabled selected>beri pemanis untuk nama anonimmu</option>
                            <option value="di pagi hari">di pagi hari</option>
                        </select>
                    </div>
                </div>
                <hr/>
                <div class="result-nama">
                    <small>Nama anonimku: </small><br>
                    <subjek>{{nama.subjek}}</subjek> <predikat>{{nama.predikat}}</predikat> <keterangan>{{nama.keterangan}}</keterangan>
                </div>
                <div class="action">
                    <button class="btn-orange">Buat Nama Anonim</button>
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
