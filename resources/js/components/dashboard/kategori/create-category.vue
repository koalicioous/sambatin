<template>
    <div class="container-fluid">
            <el-row>
                <el-col :span="24">
                    <div class="card">
                        <div class="card-body">
                            <el-form ref="create-category" :model="category" label-width="120px" :rules="createCategoryRules" :label-position="labelPosition">
                                <el-form-item label="Nama Kategori" prop="nama">
                                    <el-input v-model="category.nama" placeholder="Masukkan nama kategori baru"></el-input>
                                </el-form-item>
                            </el-form>
                            <el-button type="success" @click="storeKategori" class="float-right">
                                Tambah Kategori
                            </el-button>
                        </div>
                    </div>
                </el-col>
            </el-row>
        <div class="row justify-content-center">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                category: {
                    nama: '',
                },
                createCategoryRules: {
                    nama: [
                        { required: true, message: 'Nama tidak boleh kosong', trigger: 'blur' },
                    ]
                },
                labelPosition: 'top'
            }
        },
        methods: {
            storeKategori(){
                this.$refs['create-category'].validate((valid) => {
                    if (valid) {
                        axios.post('/kategori', this.category)
                        .then(response => {
                            this.$refs['create-category'].resetFields();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil menambahkan kategori baru'
                            })
                            this.$emit('created', response.data)
                            console.log(response);
                        })
                        .catch( response => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal menambahkan kategori baru'
                            })
                            console.log(response);
                        })
                    } else {
                        
                    }
                });
            }
        },
        mounted() {
            
        }
    }
</script>
