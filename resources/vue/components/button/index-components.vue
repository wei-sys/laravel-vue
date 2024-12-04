<script setup>
const props = defineProps({
  btnClass: {
    type: String,
    default: 'rounded text-sm px-3 py-2 text-center'
  },
  text_color: {
    type: String,
    default: 'text-white'
  },
  text_size: {
    type: String,
    default: 'font-medium'
  }
});
</script>

<template>
  <button type="button" :class="`${btnClass} ${text_size} ${text_color}`">
    <slot></slot>
  </button>
</template>