<template>
  <div>
    <h2 class="font-bold text-xl mb-2">
      FileUploadComponent
    </h2>

    <notification-component v-if="success != ''" type="success" :message="success"></notification-component>

    <notification-component v-if="errors != ''" type="error" :message="errors"></notification-component>

    <form @submit="formSubmit" enctype="multipart/form-data">
        <input type="file" class="form-control" v-on:change="onChange">
        <button class="rounded bg-green-400 p-2">Upload</button>
    </form>
  </div>
</template>

<script>
import notificationComponent from '../components/notificationComponent'
export default {
  name: 'FileUploadComponent',
  components: {
    notificationComponent,
  },
  data(){
    return {
      name: '',
      file: '',
      success: '',
      errors: ''
    }
  },
  methods: {
    onChange(e){
      this.file = e.target.files[0];
    },
    formSubmit(e){
      e.preventDefault();
      let existingObj = this;

      existingObj.errors = '';
      existingObj.success = '';

      const config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }

      let data = new FormData();

      data.append('file', this.file);

      axios.post('api/upload', data, config)
        .then(res => {
          existingObj.success = res.data.success;
          this.$emit('reloadUploads');
        })
        .catch(err => {
          existingObj.errors = err.response.data.errors.file[0];
        })
    }
  }
};
</script>

<style>
</style>
