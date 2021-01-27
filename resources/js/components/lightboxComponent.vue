<template>
  <div class="overlay z-20" @click="closeLightbox">
    <div class="overlay bg-black opacity-90"></div>
    <div class="overlay p-10 z-30 flex items-center justify-center">
      <img :src="source" alt="" class="max-w-full max-h-full border border-white">
    </div>
  </div>
</template>

<script>
export default {
  name: 'lightboxComponent',
  props: ['source'],
  methods: {
    closeLightbox(){
      this.$emit('hideOverlay');
    }
  }
};
</script>

<style>
</style>
