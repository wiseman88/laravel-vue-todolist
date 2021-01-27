<template>
  <div>
    <div v-for="(item, index) in items" :key="index">
      <transition name="fade">
        <list-item-component
          :item="item"
          v-on:itemChanged="$emit('reloadList')"
        ></list-item-component>
      </transition>
    </div>
  </div>
</template>

<script>
import listItemComponent from './listItemComponent'
export default {
  name: 'allItemsComponent',
  props: ['items'],
  components: {
    listItemComponent
  },
  data(){
    return {
      
    }
  }
};
</script>

<style>

</style>
