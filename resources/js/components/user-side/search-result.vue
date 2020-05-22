<template>
    <div class="show-sambat-container">
        <div class="body">
            <div class="header">
                <router-link to="/eksplor-sambat">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Kembali menu pencarian
                </router-link>
            </div>
            <div class="tag">
                <kategori>Kategori agak panjang</kategori>
                <tema>Ini judul tema</tema>
            </div>
            <div class="result-container">
                <h5>Beberapa yang mungkin tepat kamu baca</h5>
                <div class="search-result-card">
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh <br>
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh 
                    ini adalah sebuah nasehat tentang apa yang akan dibaca oleh
                    <div class="footer">
                        <button class="btn-orange">Baca selengkapnya</button>
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
                
            }
        },
        methods: {
             
        },
        mounted() { 

        }
    }
</script>

<style>
    .search-result-card .footer {
        padding: 0.5rem;
    }
    .search-result-card .footer {
        padding: 0.5rem;
    }

    .search-result-card {
        background: #F8F8F8;
        box-shadow: 0px 0px 4px rgba(146, 146, 146, 0.25);
        border-radius: 5px;
        padding: 1rem;
        margin-top: 15px;
        font-size: 0.75rem;
    }
    .result-container h5 {
        font-weight: 700;
    }
    .result-container{
        max-height: 150px;
        font-family: 'Poppins',sans-serif;
        color: #063855;
        margin-top: 1.5rem;
    }
</style>
