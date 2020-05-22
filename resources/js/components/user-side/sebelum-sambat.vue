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
                <h1 class="dislpay">Sebelum sambat,</h1>
                <p style="margin-top:1rem">agar nanti kamu bisa <b>menemukan sambatan
                yang sudah kamu curahkan</b> dan <mark>membaca
                respon yang diberikan oleh orang lain</mark>, maka
                kamu perlu membuat sebuah <i style="text-decoration:underline;text-decoration-color:#FFA011">Panggilan Anonim</i>
                terlebih dahulu.
                <br>
                <br>
                Jika sudah memiliki, tekan tombol klaim nama
                anonim di bawah ini.</p>
                <div class="action">
                    <button @click="$router.push('buat-nama')" class="btn-orange">Buat Nama Anonim</button>
                    <button @click="$router.push('klaim-nama')" class="btn-green">Klaim Nama Anonim</button>
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
