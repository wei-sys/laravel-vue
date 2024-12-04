<template>
  <div class="button-group" role="group">
    <div class="inline-flex rounded-md shadow-sm" v-for="(row, index) in content" :key="index">
      <button type="button" :class="getButtonClass(index)" @click="handleClick(row.value)">
        {{ row.label }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ButtonGroupComponents',
  props: {
    content: {
      type: Array,
      required: true,
      default: () => [],
    },
  },
  methods: {
    handleClick(value) {
      // 传选中值到父组件中
      this.$emit('select', value);
    },
    getButtonClass(index) {
      const isStart = index === 0;
      const isEnd = index === this.content.length - 1;

      return [
        'inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900',
        'hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white',
        'dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700',
        {
          'rounded-s-lg': isStart,
          'rounded-e-lg': isEnd,
          'border-t border-b': !isStart && !isEnd,
        },
      ];
    },
  },
};
</script>