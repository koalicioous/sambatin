<template>
    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-md-12">
                <el-button class="float-right" @click="isCreating = !isCreating">
                    <i class="fas fa-plus"></i>
                    Buat Pesan Baru
                </el-button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 px-0">
                <el-collapse-transition>
                    <createPesan v-if="isCreating" @created="onCreatedPesan"></createPesan>
                </el-collapse-transition>
            </div>
        </div>
        <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="Semua Pesan" name="all">
                <Index :pesan="pesan"></Index>
            </el-tab-pane>
            <el-tab-pane name="second">
                <span slot="label"><i class="fas fa-pause" style="color:#6cb2eb"></i> Belum Terverifikasi</span>
                <Unverified :unverifieds="unverifieds" @edited="onEditedPesan"></Unverified>
            </el-tab-pane>
            <el-tab-pane name="third">
                <span slot="label"><i class="fas fa-check" style="color:#38c172"></i> Sudah Terverifikasi</span>
                <Verified :verifieds="verifieds"></Verified>
            </el-tab-pane>
            <el-tab-pane label="Diarsipkan" name="fourth">
                <span slot="label"><i class="fas fa-archive" style="color:#e3342f"></i> Diarsipkan</span>
                <Archived :archiveds="archiveds"></Archived>
            </el-tab-pane>
        </el-tabs>
    </div>
</template>

<script>
    import createPesan from './pesan/create-pesan.vue'
    import Index from './pesan/index-pesan.vue'
    import Verified from './pesan/verified-pesan.vue'
    import Unverified from './pesan/unverified-pesan.vue'
    import Archived from './pesan/archived-pesan.vue'

    export default {
        components: {createPesan,Index,Verified,Unverified,Archived},
        data(){
            return {
                activeName: 'all',
                isCreating: false,
                pesan: '',
                verifieds: '',
                unverifieds: '',
                archiveds: '',
            }
        },
        methods: {
            handleClick(tab, event) {
                
            },
            loadPesan() {
                axios.get('/loadPesan')
                .then(response => {
                    this.pesan = response.data
                })
            },
            loadVerifieds(){
                axios.get('/pesan/verified')
                .then(response => {
                    this.verifieds = response.data
                })
                .catch(response => {
                    console.log('Failed to load verified pesans')
                })
            },
            loadUnverifieds(){
                axios.get('/pesan/unverified')
                .then(response => {
                    this.unverifieds = response.data
                })
                .catch(response => {
                    console.log('Failed to load unverified pesans')
                })
            },
            loadArchiveds(){
                axios.get('/pesan/archiveds')
                .then(response => {
                    this.archived = response.data
                })
                .catch(response => {
                    console.log('Failed to load archived pesans')
                })
            },
            onCreatedPesan(){
                this.loadUnverifieds()
            },
            onEditedPesan(){
                this.loadPesan()
                this.loadVerifieds()
                this.loadUnverifieds()
                this.loadArchiveds()
            }
        },
        mounted() {
            this.loadPesan()
            this.loadUnverifieds()
            this.loadVerifieds()
            this.loadArchiveds()
        }
    }
</script>
