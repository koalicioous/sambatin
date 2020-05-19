<template>
    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-md-12">
                <el-button class="float-right" @click="isCreating = !isCreating">
                    <i class="fas fa-plus"></i>
                    Kategori Baru
                </el-button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 px-0">
                <el-collapse-transition>
                    <createCategory v-if="isCreating" @created="onCreatedKategori"></createCategory>
                </el-collapse-transition>
            </div>
        </div>

        <el-table :data="kategoris" style="width:100%">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div v-if="props.row.temas.length < 1">
                        Belum ada tema di kategori ini
                    </div>
                    <div v-else>
                        <h5>Tema:</h5>
                        <el-row :gutter="15">
                            <el-col :span="6" v-for="tema in props.row.temas" :key="tema.id">
                                <el-card>
                                        <div>
                                            {{ tema.judul }}
                                        </div>
                                        <div style="margin-top:15px">
                                            <el-button icon="el-icon-delete" class="mx-1" size="mini"  @click="handleDeleteTheme(tema)"></el-button>
                                            <el-button icon="el-icon-edit" class="mx-1" size="mini"  @click="handleDeleteTheme(tema)"></el-button>
                                        </div>
                                </el-card>
                            </el-col>
                        </el-row>
                    </div>
                    <el-divider></el-divider>
                    <el-button class="float-right my-3 mx-1" @click="addThemeHandle(props.row)">
                        <i class="fas fa-plus"></i>
                        Tambah Tema
                    </el-button>
                    <el-button class="float-right my-3 mx-1">
                        <i class="fas fa-edit"></i>
                        Edit Kategori
                    </el-button>
                    <el-button type="danger" class="float-right my-3 mx-1" @click="deleteCategoryHandle(props.row.id)">
                        <i class="fas fa-trash"></i>
                        Hapus Kategori
                    </el-button>
                </template>
            </el-table-column>
            <el-table-column label="Kategori" prop="nama">
            </el-table-column>
        </el-table>

        <el-dialog :visible.sync="addThemeDialogVisible">
            <div slot="title">
                <strong>Tambahkan Tema Baru untuk {{ selectedKategori.nama }}</strong>
            </div>
            <el-form ref="create-theme" :model="addThemeForm" :rules="newThemeRules">
                <el-form-item label="Nama Tema Baru" prop="nama">
                    <el-input v-model="addThemeForm.nama"></el-input>
                </el-form-item>
            </el-form>
            <span slot="footer" class="dialog-footer">
                <el-button @click="addThemeDialogVisible = false">Cancel</el-button>
                <el-button type="success" @click="storeTheme()">Tambah</el-button>
            </span>
        </el-dialog>

    </div>
</template>

<script>
    import createCategory from './kategori/create-category';
    export default {
        components: {createCategory},
        data(){
            return {
                isCreating: false,
                kategoris: [],
                selectedKategori: '',
                addThemeDialogVisible: false,
                addThemeForm: {
                    nama: '',
                    id_Kategori: '',
                },
                newThemeRules: {
                    nama: [
                        { required: true, message: 'Nama tema tidak boleh kosong', trigger: 'blur'}
                    ]
                },
                selectedTheme: '',
            }
        },
        methods: {
            loadKategoris() {
                axios.get('/loadKategori')
                .then(response => {
                    this.kategoris = response.data
                })
                .catch(e => {
                    console.log('failed to load kategori data')
                })
            },
            onCreatedKategori(){
                this.loadKategoris();
            },
            addThemeHandle(kategori){
                this.addThemeDialogVisible = true;
                this.addThemeForm.id_Kategori = kategori.id;
                this.selectedKategori = kategori
            },
            storeTheme(){
                this.$refs['create-theme'].validate((valid) => {
                    if (valid) {
                        axios.post('/tema', this.addThemeForm)
                        .then(response => {
                            this.loadKategoris()
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil menambahkan Tema baru'
                            })
                            this.$refs['create-theme'].resetFields();
                            this.addThemeDialogVisible = false
                            
                        })
                        .catch(response => {

                        })
                    } else {
                        alert('not Valid')
                    }
                })
            },
            deleteCategoryHandle(data){
                Swal.fire({
                    title: 'Apakah kamu Yakin?',
                    text: "Menghapus kategori juga akan menghapus semua tema di dalamnya.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                if (result.value) {
                        axios.delete('/kategori/' + data)
                        .then(response => {
                            this.loadKategoris()
                            console.log(response)
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        })
                        .catch(response => {
                            
                        }) 
                    }
                })
                console.log(data);
            },
            handleDeleteTheme(data){
                Swal.fire({
                    title: 'Lanjutkan menghapus ' + data.judul + '?',
                    text: "Tema yang dihapus tidak dapat dikembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/tema/' + data.id)
                        .then(response => {
                            this.loadKategoris()
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
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
            this.loadKategoris()
        }
    }
</script>
