<template>
    <div class="container-fluid">
        <el-row>
            <el-col :span="24">
                <div class="card">
                    <div class="card-body">
                        <el-form ref="create-pesan" :model="pesan" label-width="120px" :label-position="labelPosition" :rules="newPesanRules">
                            <el-form-item label="Kategori" prop="kategori">
                                <el-select v-model="pesan.kategori" placeholder="Pilih sebuah kategori" @change="handleCategory($event)">
                                    <el-option v-for="item in kategoris" :key="item.id" :label="item.nama" :value="item.nama">
                                    </el-option>
                                </el-select>
                                -
                                <el-select v-model="pesan.id_tema" placeholder="Pilih temanya">
                                    <el-option v-for="tema in temas" :key="tema.id" :label="tema.judul" :value="tema.id">
                                    </el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Pesan" prop="konten">
                                <el-input type="textarea" :rows="5" maxlength="500" placeholder="Masukkan pesan yang ingin kamu sampaikan" v-model="pesan.konten" show-word-limit>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Inisial" prop="inisial">
                                <el-input v-model="pesan.inisial" placeholder="Masukkan inisial penulis" maxlength="2" show-word-limit></el-input>
                            </el-form-item>
                            <el-button type="primary" style="float:right" @click="handleStorePesan(pesan)">
                                Spread The Joy
                            </el-button>
                        </el-form>
                    </div>
                </div>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                labelPosition: 'top',
                pesan: {
                    inisial: '',
                    konten: '',
                    kategori: '',
                    id_tema: '',
                },
                kategoris: [],
                temas: '',
                newPesanRules: {
                    kategori: [
                        { required:true, message: "Tema tidak boleh kosong", trigger: 'blur' }
                    ],
                    konten: [
                        { required:true, message: "Konten tidak boleh kosong", trigger: 'blur'}
                    ],
                }
            }
        },
        methods: {
            loadKategori(){
                axios.get('/loadKategori')
                .then(response => {
                    this.kategoris = response.data
                })
            },
            handleCategory(event){
                this.pesan.id_tema = ''
                this.temas = this.kategoris.find(item => item.nama == event).temas
            },
            handleStorePesan(data){
                this.$refs['create-pesan'].validate((valid) => {
                    if (valid) {
                        axios.post('/pesan', this.pesan)
                        .then(response => {
                            this.$refs['create-pesan'].resetFields();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil menambahkan pesan baru'
                            })
                            this.$emit('created')
                        })
                        .catch(response => {

                        })
                    } else {
                        alert('not valid')
                    }
                })
            }
        },
        mounted() {
            this.loadKategori();
        }
    }
</script>
