<template>
    <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <el-button class="float-right" @click="isCreating = !isCreating">
                   <i class="fas fa-bullhorn"></i>
                   Tulis Sambat
               </el-button>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12 my-2 px-0">
               <el-collapse-transition>
                   <CreateSambat v-if="isCreating" @created="onCreatedSambat"></CreateSambat>
               </el-collapse-transition>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12 my-2 px-0">
               <el-tabs v-model="activeName" @tab-click="handleClick">
                    <el-tab-pane label="Semua Sambat" name="index">
                        <IndexSambat :sambats="sambats"></IndexSambat>
                    </el-tab-pane>
                    <el-tab-pane label="Diarsipkan" name="Archived">Config</el-tab-pane>
                </el-tabs>
           </div>
       </div>
    </div>
</template>

<script>
    import CreateSambat from './sambat/create-sambat.vue'
    import IndexSambat from './sambat/index-sambat.vue'

    export default {
        components: {CreateSambat,IndexSambat},
        data() {
            return {
                activeName: 'index',
                isCreating: false,
                sambats: [],
            }
        },
        methods: {
            handleClick(tab, event) {
                
            },
            loadSambats() {
                axios.get('/loadSambat')
                .then(response => {
                    this.sambats = response.data
                })
                .catch(response => {
                    console.log('failed to load sambat data')
                })
            },
            onCreatedSambat() {
                this.isCreating = false;
                this.loadSambats();
            }
        },
        mounted() {
            this.loadSambats()
        }
    }
</script>
