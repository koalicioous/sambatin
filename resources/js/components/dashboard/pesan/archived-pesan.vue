<template>
    <div class="container-fluid">
        <div v-if="archiveds.length < 1">
            No Data to Show
        </div>
        <div v-else>
            <el-row :gutter="15" style="margin-bottom:25px">
                <el-col :span="6" v-for="v in archiveds" :key="v.id">
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
                            <el-button type="danger" size="mini" @click="handleDelete(v.id)">
                                <i class="fas fa-trash"></i>
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
            archiveds: ''
        },
        data(){
            return {

            }
        },
        methods: {
            handleDelete(data){
                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Menghapus Pesan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                if (result.value) {
                        axios.delete('/pesan/' + data)
                        .then(response => {
                            this.$emit('deleted')
                            Swal.fire(
                            'Terhapus!',
                            'Pesan berhasil dihapus.',
                            'success'
                            )
                        })
                        .catch(response => {
                            
                        }) 
                    }
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
