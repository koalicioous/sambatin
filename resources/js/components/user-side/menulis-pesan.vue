<template>
    <div class="show-sambat-container">
        <div class="body">
            <div class="header">
                <router-link to="/">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali ke Halaman Utama
                </router-link>
            </div>
            <div class="tulis-pesan-title">
                Tulis Sebuah Pesan
            </div>
            <div class="tulis-pesan-subtitle">
                Kita tidak pernah tahu kepada siapa pesan yang kamu tulis akan bermuara.<br/>
                <mark>Kepada siapa pun itu,</mark> semoga pesan yang kamu tulis dari hati dapat membantunya melewati hal-hal berat.<br/><br/><b> Terima kasih, orang baik!</b>
                <router-link to=""></router-link>
            </div>
            <div class="pesan-category-input">
                <p class="pesan-category-label">Untuk mereka yang sedang memiliki beban seputar</p>
                <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="selected.kategori" v-on:change="handleCategory($event)">
                    <option value="" disabled selected>Pilih sebuah kategori</option>
                    <option v-for="kategori in kategoris" :key="kategori.id" :value="kategori">{{ kategori.nama }}</option>
                </select>
            </div>
            <div class="pesan-category-input">
                <select name="kategori" id="" class="custom-select" aria-placeholder="Pilih sebuah kategori" v-model="selected.tema">
                    <option value="" disabled selected>Pilih sebuah tema spesifik</option>
                    <option v-for="tema in temas" :key="tema.id" :value="tema.id">{{ tema.judul }}</option>
                </select>
            </div>
            <textarea name="respon" id="" cols="30" rows="10" placeholder="Tulis pesanmu di sini"></textarea>
            <button class="btn-green publish-pesan" style="margin-top:20px;margin-bottom:20px">
                Hanyutkan Pesan
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
    .publish-pesan{
        margin-top: 0 !important;
    }
    .show-sambat-container .body {
        margin-bottom: 1rem;
    }
    .show-sambat-container .credit {
        bottom: 0;
        left: 0;
    }
    .show-sambat-container .pesan-category-input .pesan-category-label {
        font-family: 'Poppins',sans-serif;
        color: #063855;
    }
    .tulis-pesan-title {
        margin: 1rem;
        font-size: 1.5rem;
        font-family: 'Poppins',sans-serif;
        color: #063855;
    }
    .tulis-pesan-subtitle {
        margin: 1rem;
        font-size: 0.75rem;
        font-family: 'Poppins',sans-serif;
        color: #063855;
    }
</style>
