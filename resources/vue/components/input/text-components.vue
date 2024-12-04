<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    id: {
        type: String,
        default: 'default_modal',
    },
    type: {
        type: String,
        default: 'text',
    },
    placeholder: {
        type: String,
        default: '',
    },
    label: {
        type: String,
        default: '',
    },
    modelValue: {
        type: String,
        default: '',
    },
});
const emit = defineEmits(['update:modelValue']); 
function handleInput(event) {
    emit('update:modelValue', event.target.value);
}
</script>

<template>
    <div class="mb-6">
        <label :for="id" class="block mb-2 text-sm text-gray-900 dark:text-white">{{ label }}</label>
        <input :value="modelValue" :type="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :id="id" :placeholder="placeholder" @input="handleInput" >
    </div>
</template>