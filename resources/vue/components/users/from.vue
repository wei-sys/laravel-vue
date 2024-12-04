<template>
    <div>
        <Button @click="openModal = true" class="bg-blue-500">
            Create
        </Button>

        <Modal v-if="openModal" :openModal="openModal" @click.self="closeModal">
            <template #title>
                <div class="font-bold">
                    User Create
                </div>
            </template>

            <template #body>
                <Inputfield v-model="form.name" label="Name" />
                <Inputfield v-model="form.email" label="E-mail" />
                <Inputfield v-model="form.phone" label="Phone" />
                <Inputfield v-model="form.password" label="Password" />
            </template>
            
            <template #footer >
                <div class="grid grid-cols-4 gap-4">
                    <Button @click="props.uid == 0 ? create() : update() "  class='bg-blue-500 col-span-3'>{{ props.uid == 0 ? 'Create' : 'Update' }}</Button>
                    <Button @click="reset" class="bg-red-500">Close</Button>
                </div>
            </template>
        </Modal>
    </div>
</template>

<script setup>
    import { ref, reactive, getCurrentInstance, watch } from 'vue';
    import Modal from '../layout/modal-components.vue';
    import Inputfield from '../input/text-components.vue';
    import Button from '../button/index-components.vue';

    const { proxy } = getCurrentInstance();
    const openModal = ref(false);
    const form = ref({
        id: null,
        name: '',
        email: '',
        phone: '',
        password: '',
    });
    const props = defineProps({
        uid: {
            type: Number,
            default: () => 0,
            required: false
        },
        destroy: {
            type: Boolean,
            default: () => false,
            required: false
        },
    });

    watch(() => props.uid, async (uid) => {
        if(uid > 0 && props.destroy == false) get(uid);
        else if(uid > 0 && props.destroy == true) destroy(uid);
    });

    const emit = defineEmits(['update:uid']);

    const get = async (id) => {
        const response = await proxy.$axios.get(`/user/get`, { params: { id } } );
        if (response.status === 200) {
            form.value = response.data.data;
            openModal.value = true;
        }
    }

    const create = async () => {
        const response = await proxy.$axios.post('/user/add', form.value);
        if (response.status === 200) {
            reset();
        }
    }

    const update = async () => {
        form.value.id = props.uid;
        const response = await proxy.$axios.put('/user/edit', form.value);
        if (response.status === 200) {
            reset();
        }
    }

    const destroy = async () => {
        if(confirm('Are you sure you want to delete this user?')) {
            const response = await proxy.$axios.delete(`/user/delete`, { params: { id: props.uid } } );
            if (response.status === 200) {
                reset();
            }
        }
    }

    const reset = () => {
        openModal.value = false;
        emit('update:uid', 0);
        form.value = {
            id: null,
            name: '',
            email: '',
            phone: '',
            password: '',
        };
    }

    const closeModal = () => openModal.value = false;
</script>