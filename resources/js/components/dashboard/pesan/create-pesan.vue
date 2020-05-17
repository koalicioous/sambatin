<template>
    <div class="container-fluid">
        <el-row>
            <el-col :span="24">
                <div class="card">
                    <div class="card-body">
                        <el-form ref="create-pesan" :model="pesan" label-width="120px" :label-position="labelPosition">
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
                            <el-form-item label="Pesan" prop="pesan">
                                <el-input type="textarea" :rows="5" maxlength="500" placeholder="Masukkan pesan yang ingin kamu sampaikan" v-model="pesan.konten" show-word-limit>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Inisial" prop="inisial">
                                <el-input v-model="pesan.inisial" placeholder="Masukkan inisial penulis"></el-input>
                            </el-form-item>
                            <el-button type="primary" style="float:right">
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
                console.table(this.temas)
            }
        },
        mounted() {
            this.loadKategori();
        }
    }
</script>
