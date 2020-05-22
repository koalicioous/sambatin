<template>
    <div class="main-container-pesan">
        <div class="find-pesan">
            <div class="header">
                <router-link to="/">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali ke Halaman Utama
                </router-link>
            </div>
            <div class="find-pesan-page-title">
                <p>Coba gambarkan apa yang sedang kamu rasakan.</p>
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
            <button to="#" class="btn-green btn-search float-right">Temukan Pesan</button>
            <div class="main-menu-footer py-5">
                <div class="text-center my-5">
                    <a href="/">Klik di sini untuk bantuan psikologis lebih lanjut</a>
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
</style>
