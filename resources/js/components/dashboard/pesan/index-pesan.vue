<template>
    <div class="container-fluid">
        
        <el-row :gutter="15" style="margin-bottom:25px">
            <el-col :span="6" v-for="p in pesan" :key="p.id">
                <el-card style="position:relative;" class="my-2">
                    <div class="my-1">
                        <el-tag type="primary" size="mini">{{ p.kategori.nama }}</el-tag>
                        <el-tag type="info" size="mini"> {{ p.tema.judul }}</el-tag>
                    </div>
                    <div class="my-2" style="max-height:200px;overflow:auto;padding:15px">
                            {{ p.konten }}
                        {{/**p.konten.substring(0,250)*/}}
                    </div>
                </el-card>
            </el-col>
        </el-row>
        
    </div>
</template>

<script>
    export default {
        props: {
            pesan: '',
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
