<template>
  <div>
    <notification-component v-if="alert != ''" type="success" message="Upload has been deleted!"></notification-component>
    <h2 class="font-bold mb-2">
      Uploads Gallery
    </h2>
    <div class="grid grid-cols-1 lg:grid-cols-5 md:grid-cols-3 xs:grid-cols-2 gap-3">
      <div v-for="(upload, index) in uploads" :key="index">
        <upload-component 
          :upload="upload"
          v-on="$listeners"
          v-on:showMessage="alertMessage()"
        ></upload-component>
      </div>
    </div>
  </div>
</template>

<script>
import notificationComponent from '../components/notificationComponent'
import uploadComponent from './uploadComponent'
export default {
  name: 'allUploadsComponent',
  props: ['uploads', 'isLoading'],
  components: {
    uploadComponent,
    notificationComponent,
  },
  data(){
    return {
      alert: ''
    }
  },
  methods: {
    alertMessage(){
      this.alert = "File has been deleted!";
    }
  },
  watch: {
    alert(val){
      if (val) {
        setTimeout(() => this.alert = false, 5000);
      }
    }
  }
};
</script>

<style>
.alert {
  margin-top: -100px;
  animation: slide-down 5000ms ease-in;
}

@keyframes slide-down {
  0% {
    margin-top: -100px;
    opacity: 0;
  }

  10% {
    margin-top: 0px;
    opacity: 1;
  }

  90% {
    margin-top: 0px;
    opacity: 1;
  }

  100% {
    margin-top: -100px;
    opacity: 0;
  }
}
</style>
