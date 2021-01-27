<template>
  <div>
    <header class="py-4">
      <nav class="mx-auto w-full px-4">
        <router-link :to="{name:'home'}">Home</router-link>
        <router-link :to="{name:'gallery'}">Gallery</router-link>
      </nav>
    </header>
    <router-view></router-view>
    <div class="p-10">
      <div class="p-4 bg-white w-full shadow rounded mx-auto">
        <div class="py-2">
          <add-item-form-component
          v-on:reloadList="getItems()"
          ></add-item-form-component>
        </div>
        <div class="py-2">
          <all-items-component 
            :items="items"
            v-on:reloadList="getItems()"
            ></all-items-component>
        </div>
      </div>
      <div class="py-2">
        <div class="p-4 rounded shadow bg-white">
          <file-upload-component v-on:reloadUploads="getAllUploads()"></file-upload-component>
        </div>
      </div>
      <div class="py-2">
        <div class="p-4 rounded shadow bg-white">
          <div v-if="isLoading">
            <spinner-component></spinner-component>
          </div>
          <all-uploads-component :uploads="uploads" v-on:showImage="displayLightbox" v-on:uploadChanged="getAllUploads()"></all-uploads-component>
        </div>
      </div>
      <!-- lightbox -->
      <lightbox-component v-on:hideOverlay="showLightbox = false" v-if="showLightbox" :source="source"></lightbox-component>
    </div>
  </div>
</template>

<script>
import addItemFormComponent from './addItemFormComponent'
import allItemsComponent from './allItemsComponent'
import FileUploadComponent from './FileUploadComponent'
import allUploadsComponent from './allUploadsComponent'
import spinnerComponent from '../components/spinnerComponent'
import lightboxComponent from '../components/lightboxComponent'

export default {
  name: 'app',
  components: {
    addItemFormComponent,
    allItemsComponent,
    FileUploadComponent,
    allUploadsComponent,
    spinnerComponent,
    lightboxComponent
  },
  data(){
    return {
      items: [],
      uploads: [],
      isLoading: true,
      showLightbox: false,
      source: '',
    }
  },
  methods: {
    getItems(){
      axios.get('api/items')
      .then( res => {
        this.items = res.data
      })
      .catch(err => {
        console.log(err.response)
      })
    },
    getAllUploads(){
      axios.get('api/uploads')
        .then(res => {
          this.uploads = res.data
        })
        .then( res => {
          this.isLoading = false
        })
        .catch(err => {
          console.log(err.response)
        })
    },
    displayLightbox(value){
      this.showLightbox = true,
      this.source = value
    }
  },
  created(){
    this.getItems();
    this.getAllUploads();
  }
};
</script>

<style>
</style>
