<template>
    <div class="container-fluid">
        
        <div v-if="verifieds.length < 1">
            No Data to Show
        </div>
        <div v-else>
            <el-row :gutter="15" style="margin-bottom:25px">
                <el-col :span="6" v-for="v in verifieds" :key="v.id">
                    <el-card style="position:relative;" class="my-2">
                        <div class="my-1">
                            <el-tag type="primary" size="mini">{{ v.kategori.nama }}</el-tag>
                            <el-tag type="info" size="mini"> {{ v.tema.judul }}</el-tag>
                        </div>
                        <div class="my-2" style="max-height:200px;overflow:auto;padding:15px">
                                {{ v.konten }}
                            {{/**p.konten.substring(0,250)*/}}
                        </div>
                        <div>
                            <el-button size="mini">
                                Edit
                            </el-button>
                            <el-button size="mini">
                                Arsipkan
                            </el-button>
                            <el-button type="success" size="mini">
                                <i class="fas fa-check"></i>
                            </el-button>
                        </div>
                    </el-card>
                </el-col>
            </el-row>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            verifieds: '',
        },
        data(){
            return {
                
            }
        },
        methods: {
            loadVerifieds(){
                axios.get('/pesan/verified')
                .then(response => {
                    this.verifieds = response.data;
                })
                .catch(response => {
                    console.log('failed to load verifieds data')
                })
            }
        },
        mounted() {
        }
    }
</script>
