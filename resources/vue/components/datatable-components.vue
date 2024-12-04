<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import { ref, computed } from 'vue';

DataTable.use(DataTablesCore);

const props = defineProps({
  columns: {
    type: Array,
    default: () => [],
    required: true
  },
  data: {
    type: Array,
    default: () => [],
    required: true
  },
  class: {
    type: String,
    default: 'display table table-hover'
  },
  options: {
    type: Object,
    default: () => ({
      lengthChange: false,
      paging: false,
      searching: false,
      info: false,
      pageLength: 10,
    }),
  },
});

const mergedOptions = computed(() => {
  return Object.assign({}, {
    lengthChange: false,
    paging: false,
    searching: false,
    info: false,
    pageLength: 50,
  }, props.options);
});
</script>

<template>
  <DataTable :data="data" :columns="columns" :class="class" :options="mergedOptions">
    <template #action="{ rowData, cellData }">
      <slot name="action" :rowData="rowData" :cellData="cellData"></slot>
    </template>
  </DataTable>
</template>


<style>
/* Using Tailwind classes */
table {
  @apply w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400;
}

table thead {
  @apply text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400;
}

table thead th {
  @apply px-6 py-4;
}

table tbody {
  @apply bg-white dark:bg-gray-800;
}

table tbody td {
  @apply px-3 py-2;
}

/* table tbody tr:nth-child(odd) {
  @apply bg-gray-50;
} */

table tbody tr td:nth-child(1) {
  @apply px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white
}

table tbody tr:hover {
  @apply bg-gray-100;
}
</style>
