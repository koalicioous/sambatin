<template>
    <div class="container-fluid">
        <el-row>
            <el-col :span="24">
                <el-card>
                    <div>
                        <el-form ref="create-sambat" :model="sambat" :rules="sambatRules" :label-position="labelPosition">
                            <el-row>
                                <el-col :span="4">
                                    <el-form-item label="Kategori" prop="kategori">
                                        <el-select v-model="sambat.kategori" placeholder="Pilih sebuah kategori" @change="handleCategory($event)">
                                            <el-option v-for="item in kategoris" :key="item.id" :label="item.nama" :value="item.nama">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="6" class="mx-2">
                                     <el-form-item label="Tema" prop="id_tema">
                                        <el-select v-model="sambat.id_tema" placeholder="Pilih sebuah tema">
                                            <el-option v-for="item in temas" :key="item.id" :label="item.judul" :value="item.id">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-form-item label="Konten Sambat" prop="konten">
                                <el-input type="textarea" :rows="7" maxlength="750" placeholder="Tulis sambatmu di sini" v-model="sambat.konten" show-word-limit>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Inisial" prop="inisial">
                                <el-input maxlength="2" placeholder="Inisial" v-model="sambat.inisial" show-word-limit></el-input>
                            </el-form-item>
                            <el-button type="primary" class="float-right my-3" @click="storeSambat(sambat)">
                                sambatkan
                            </el-button>
                        </el-form>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                labelPosition: 'top',
                sambat: {
                    id_tema: '',
                    inisial: '',
                    konten: '',
                },
                sambatRules: {
                    id_tema: [
                        { required: true, message: "Tema tidak boleh kosong", trigger: 'blur'}
                    ],
                    konten: [
                        { required: true, message: 'Konten sambat tidak boleh kosong', trigger: 'blur'}
                    ],
                    kategori: [
                        { required: true, message: 'Kategori tidak boleh kosong', trigger: 'blur'}
                    ]
                },
                kategoris: [],
                temas: [],
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
                this.sambat.id_tema = ''
                this.temas = this.kategoris.find(item => item.nama == event).temas
            },
            storeSambat(data){
                this.$refs['create-sambat'].validate((valid) => {
                    if (valid) {
                        axios.post('/sambat',data)
                        .then(response => {
                            this.$refs['create-sambat'].resetFields();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil menulis kesambatan'
                            })
                            this.$emit('created')
                        })
                        .catch(response => {
                            
                        })
                    } else {
                        alert('tidak valid')
                    }
                })
            }
        },
        mounted() {
            this.loadKategori()
        }
    }
</script>
