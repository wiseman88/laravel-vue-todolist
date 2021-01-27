<template>
  <div class="flex">
    <input type="text" placeholder="add your todo" class="flex-grow p-2 rounded border focus:outline-none focus:ring focus:border-blue-300" v-model="item.name"
    @keyup.enter="addItem()"
    >
    <button class="p-2 ml-2 rounded transition duration-200 ease-in-out uppercase text-xs" :class="[item.name ? 'bg-green-300 hover:bg-green-400' : 'bg-gray-100']"
    @click="addItem()"
    >
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    </button>
  </div>
</template>

<script>
export default {
  name: 'addItemFormComponent',
  data(){
    return {
      item: {
        name: '',
      }
    }
  },
  methods:{
    addItem(){
      if (this.item.name == '') {
        return;
      }

      axios.post('api/item/store', {
        item: this.item
      })
      .then( res => {
        if (res.status == 201) {
          this.item.name = '';
          this.$emit('reloadList');
        }
      })
      .catch( err => {
        console.log(err.response);
      })
    }
  }
};
</script>

<style>
</style>
