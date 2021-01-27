<template>
  <div 
    @mouseover="hover = true"
    @mouseleave="hover = false"
    class="rounded-lg group relative overflow-hidden file-container">
     <img 
      class="h-44 object-cover w-full cursor-pointer"
      :src="upload.path" 
      alt=""
      @click="showImage"
      >
      <div 
      v-if="hover"
      class="overlay-absolute button-container">
        <div class="overlay-absolute bg-black opacity-80"></div>
        <div class="overlay-absolute flex items-center justify-center">
          <button class="focus:outline-none" @click="showImage()">
            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          </button>
          <button class="focus:outline-none" @click="deleteFile()">
            <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </button>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'uploadComponent',
  props: ['upload', 'isLoading'],
  data(){
    return {
      hover: false,
    }
  },
  methods: {
    showImage(event){
      this.$emit('showImage', this.upload.path);
    },
    deleteFile()
    {
      axios.delete('api/file/' + this.upload.id)
        .then(res => {
          if (res.status == 200) {
            console.log('Items has been deleted!')
            this.$emit('uploadChanged');
            this.$emit('showMessage')
          }
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
};
</script>

<style>
</style>
