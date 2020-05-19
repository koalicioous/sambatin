<template>
    <div class="container-fluid">
         <div v-if="unverifieds.length < 1">
            No Data to Show
        </div>
        <div v-else>
            <el-row :gutter="15" style="margin-bottom:25px">
                <el-col :span="6" v-for="u in unverifieds" :key="u.id">
                    <el-card style="position:relative;" class="my-2">
                        <div class="my-1">
                            <el-tag type="primary" size="mini">{{ u.kategori.nama }}</el-tag>
                            <el-tag type="info" size="mini"> {{ u.tema.judul }}</el-tag>
                        </div>
                        <div class="my-2" style="max-height:200px;overflow:auto;padding:15px">
                                {{ u.konten }}
                        </div>
                        <div>
                            <el-button size="mini" @click="handleEdit(u)">
                                Edit
                            </el-button>
                            <el-button size="mini" @click="handleArchive(u.id)">
                                Arsipkan
                            </el-button>
                            <el-button type="success" size="mini" @click="handleVerify(u.id)">
                                <i class="fas fa-check"></i>
                            </el-button>
                        </div>
                    </el-card>
                </el-col>
            </el-row>
        </div>
        <el-dialog
            title="Edit Konten Pesan"
            :visible.sync="editPesanDialogVisible"
            width="30%">
            <el-form ref="edit-pesan" :model="selectedPesan" :label-position="labelPosition">
                <el-form-item label="Kategori">
                    <el-select v-model="selectedPesan.kategori.nama" placeholder="Pilih sebuah kategori" @change="handleCategory($event)">
                        <el-option v-for="item in kategoris" :key="item.id" :label="item.nama" :value="item.nama">
                        </el-option>
                    </el-select>
                    -
                    <el-select v-model="selectedPesan.tema.judul" placeholder="Pilih temanya">
                        <el-option v-for="tema in temas" :key="tema.id" :label="tema.judul" :value="tema.id">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Konten">
                    <el-input type="textarea" :rows="7" v-model="selectedPesan.konten" maxlength="500" show-word-limit></el-input>
                </el-form-item>
                <el-form-item label="Inisial Penulis">
                    <el-input v-model="selectedPesan.inisial" maxlength="2" show-word-limit></el-input>
                </el-form-item>
                <el-form-item label="Status">
                    <el-radio-group v-model="selectedPesan.is_checked">
                        <el-radio :label="0">Belum Terverifikasi</el-radio>
                        <el-radio :label="1">Verifikasi</el-radio>
                    </el-radio-group>
                </el-form-item>
            </el-form>
        <span slot="footer" class="dialog-footer">
            <el-button @click="dialogVisible = false">Cancel</el-button>
            <el-button type="primary" @click="handleUpdate(selectedPesan)">Update</el-button>
        </span>
        </el-dialog>
    </div>
</template>

<script>
    export default {
        props: {
            unverifieds: '',
        },
        data(){
            return {
               labelPosition: 'top',
               selectedPesan: {
                   kategori: '',
                   tema: '',
               },
               editPesanDialogVisible: false,
               kategoris: [],
               temas: '',
            }
        },
        methods: {
            loadUnverifieds(){
                axios.get('/pesan/unverified')
                .then(response => {
                    this.unverifieds = response.data
                })
                .catch(response => {
                    console.log('Failed to load unverified pesan')
                })
            },
            handleEdit(data){
                this.editPesanDialogVisible = true
                this.selectedPesan = Object.assign({},data)
                this.handleCategory(this.selectedPesan.kategori.nama)
            },
            loadKategori(){
                axios.get('/loadKategori')
                .then(response => {
                    this.kategoris = response.data
                })
            },
            handleCategory(event){
                this.selectedPesan.id_tema = ''
                this.temas = this.kategoris.find(item => item.nama == event).temas
            },
            handleUpdate(data){
                axios.post('/pesan/update',data)
                .then(response => {
                    this.editPesanDialogVisible = false
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil merubah data'
                    })
                    this.$emit('edited')
                })
                .catch(response => {
                    console.log('failed to update data')
                })
            },
            handleVerify(id){
                axios.patch('/pesan/' + id + '/verify')
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Verifikasi Pesan'
                    })
                    this.$emit('edited')
                })
                .catch(response => {
                    console.log('failed to verify pesan')
                })
            },
            handleArchive(id){
                axios.patch('/pesan/' + id + '/archive')
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Mengarsipkan Pesan'
                    })
                    this.$emit('edited')
                })
                .catch(response => {

                })
            }
        },
        mounted() {
            this.loadKategori()
        }
    }
</script>
