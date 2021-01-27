<template>
  <div :class="type" class="alert fixed z-50 top-0 left-0 w-full h-auto p-4 mb-2">
      {{ message }}
    </div>
</template>

<script>
export default {
  name: 'notificationComponent',
  props: {
    type: {
      type: String,
    },
    message: {
      type: String,
    }
  }
};
</script>

<style>
</style>
