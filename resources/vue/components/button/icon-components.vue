<script setup>
const props = defineProps({
  icon: {
    type: String,
    default: ''
  },
  text_color: {
    type: String,
    default: 'text-gray-500'
  },
  text_size: {
    type: String,
    default: 'font-medium text-lg'
  }
});
</script>

<template>
  <button type="button" :class="`${btnClass} ${text_size} ${text_color}`">
    <i :class="`bi bi-${icon}`"></i>
  </button>
</template>