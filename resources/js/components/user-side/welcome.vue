<template>
    <div class="main-container">
        <div class="main-menu d-flex justify-content-center align-items-center">
            <div class="main-menu-text">
                <h1 class="display">Jangan dipikul <p class="underlined"><i>sendirian.</i></p></h1>
                <p class="subtitle"><b>Dengarkan pesan</b> dari orang
                                    yang pernah mengalami masalah
                                    serupa denganmu, atau
                                    <b><mark>sambatkan sebuah keresahan.</mark></b>
                </p>
                <div class="main-menu-action">
                    <a href="#" class="btn-orange">Sambatkan</a>
                    <a href="" class="btn-green">Temukan Pesan</a>
                </div>
                <div class="main-menu-footer">
                    <a href="">Klik di sini untuk bantuan psikologis lebih lanjut</a>
                </div>    
            </div>
        </div>
        <div class="sub-menu d-flex justify-content-center align-items-center">
            <a href="" class="sub-menu-button">Tulis Pesan untuk Orang Lain</a>
            <a href="" class="sub-menu-button">Baca Sambat dan Beri Semangat</a>
            <a href="" class="sub-menu-button">Baca Respon Sambatku</a>
        </div>
        <div class="credit d-flex justify-content-center align-items-center">
                <p>Sambat by <a href="">eQuilibrium</a> | from Covid-19 quarantine depression</p>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .main-container{
        font-family: 'Poppins', sans-serif;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 100vw;
        height: 85vh;
        background-color: #ECECEC;
    }

    .main-container .display {
        font-size: 2rem;
        color: #063855;
        font-weight: 900 !important;
    }

    .main-menu {
        height: 100%;
        color: #063855;
        margin-left: 3rem;
        margin-right: 3rem;
    }

    .main-menu-action {
        margin-top: 1.5rem;
    }

    .main-menu-footer {
        margin-top: 1rem;
    }

    .main-menu-footer a {
        text-decoration: none;
        color: #4A4A4A;
        font-size: 0.75rem;
    }

    .underlined{
        text-decoration: underline;
        text-decoration-color: #FFA011;
    }

    .subtitle {
        width: 100%;
    }

    .subtitle mark {
        color: #9A6F00;
    }

    .btn-orange {
        font-size: 0.75rem;
        margin-top: 1rem;
        padding: 0.5rem 1.75rem;
        width: 7.5rem;
        height: 2rem;
        color: #9A6F00;
        background: #FFD159;
        border-radius: 5px;
    }

    .btn-green {
        font-size: 0.75rem;
        margin-top: 1rem;
        padding: 0.5rem 1.75rem;
        width: 7.5rem;
        height: 2rem;
        color: #005E4D;
        background: #03D6B0;
        border-radius: 5px;
    }

    .sub-menu{
        height: 10vh;
        width: 100vw;
        background-color: #282828;
    }

    .sub-menu a {
        text-decoration: none;
        color: #FFFAFA;
        display: block;
        text-align: center;
        font-size: 0.75rem;
        padding: 0.5rem 0.5rem;
    }

    .credit {
        height: 5vh;
        width: 100vw;
        background-color: #3A3A3A;
    }

    .credit p {
        color: #FFFAFA;
        font-size: 0.75rem;
        margin: 0;
    }

    .credit a {
        text-decoration: none;
        color: #FFFAFA;
    }
</style>
