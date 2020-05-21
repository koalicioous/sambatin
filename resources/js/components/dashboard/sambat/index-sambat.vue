<template>
    <div class="container-fluid">
        <el-row class="py-2 px-0">
            <div v-if="sambats.length < 1">
                Tidak ada data sambat untuk ditampilkan
            </div>
            <div v-else>
                <el-col v-for="sambat in sambats" :key="sambat.id" :span="11" style="margin-left:5px;margin-top:5px">
                    <el-card shadow="hover">
                        <el-tag type="primary">{{ sambat.kategori.nama }}</el-tag>
                        <el-tag type="success">{{ sambat.tema.judul }}</el-tag> 
                        <div class="my-3" style="max-height:250px;overflow:auto">
                            Isi Konten Sambat
                        </div>
                        <div class="float-right" style="margin-bottom:20px">
                            <el-button size="small">
                                Edit
                            </el-button>
                            <el-button size="small">
                                Arsipkan
                            </el-button>
                        </div>
                    </el-card>
                </el-col>
            </div>
        </el-row>
    </div>
</template>

<script>
    export default {
        props: {
            sambats: '',
        },
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
