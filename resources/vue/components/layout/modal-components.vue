<script setup>
    const props = defineProps({
        openModal: {
            type: Boolean,
            default: () => false,
            required: true
        },
    });

    // const closeModal = () => {
    //     props.openModal = false;
    // };
</script>

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s;
    }

    .fade-enter-from,
    .fade-leave-to {
        opacity: 0;
    }
</style>

<template>
    <div>
        <transition name="fade">
            <div v-if="openModal"
                class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96" @click.stop>
                    <div class="mb-4">
                        <slot name="title"></slot>
                    </div>
                    <div class="text-gray-600 mb-4">
                        <slot name="body"></slot>
                    </div>
                    <div>
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>

        </transition>
    </div>
</template>
