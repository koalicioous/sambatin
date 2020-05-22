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
            <div class="sambat-title">
                Menulis Sambat
            </div>
            <div class="sambat-author">
                <router-link to="">Klik untuk mempelajari bagaimana menuliskan sambat yang kamu resahkan dapat menolong kesehatan mentalmu</router-link>
            </div>
            <div class="pesan-category-input">
                <p class="pesan-category-label">Masalahku berkaitan dengan</p>
                <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="selected.kategori" v-on:change="handleCategory($event)">
                    <option value="" disabled selected>Pilih sebuah kategori</option>
                    <option v-for="kategori in kategoris" :key="kategori.id" :value="kategori">{{ kategori.nama }}</option>
                </select>
            </div>
            <div class="pesan-category-input">
                <p class="pesan-category-label">Yaitu</p>
                <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="selected.tema">
                    <option value="" disabled selected>Lalu tentukan sebuah tema spesifik</option>
                    <option v-for="tema in temas" :key="tema.id" :value="tema.id">{{ tema.judul }}</option>
                </select>
            </div>
            <textarea name="respon" id="" cols="30" rows="10" placeholder="Tulis sambatmu di sini"></textarea>
            <button class="btn-green">
                Publish Sambat
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
                kategoris: '',
                temas: '',
                selected: {
                    kategori: '',
                    tema: ''
                }
            }
        },
        methods: {
            loadKategoris(){
            axios.get('/api/loadKategori')
            .then(response => {
                this.kategoris = response.data
            })
            .catch(response => {
                console.log('failed to load kategori data')
            })
            },
            handleCategory(event){
                this.selected.tema = ''
                this.temas = this.selected.kategori.temas
            }
        },
        mounted() { 
            this.loadKategoris()
        }
    }
</script>

<style>
    .show-sambat-container .pesan-category-input .pesan-category-label {
        font-family: 'Poppins',sans-serif;
        color: #063855;
    }
</style>
