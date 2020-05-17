<template>
    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-md-12">
                <el-button class="float-right" @click="isCreating = !isCreating">
                    <i class="fas fa-plus"></i>
                    Buat Pesan Baru
                </el-button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 px-0">
                <el-collapse-transition>
                    <createPesan v-if="isCreating"></createPesan>
                </el-collapse-transition>
            </div>
        </div>
        <el-row :gutter="15">
            <el-col span="6">
                <el-card style="height:250px;position:relative">
                    <div class="my-2">
                        <strong>Relationship > Habis diputusin pacar</strong>
                    </div>
                    <div class="my-3">
                        disini bakal tertulis apa yang menjadi isi dari pesan yang disampaikan oleh orang-orang untuk mengungkap kegalauannya
                    </div>
                    <div style="position:absolute;bottom:0;right:0;margin:15px">
                        <el-button size="mini">
                            tes
                        </el-button>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    import createPesan from './pesan/create-pesan.vue'
    export default {
        components: {createPesan},
        data(){
            return {
                isCreating: false,
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
