<template>
    <!-- <h1>{{ $t('dashboard') }}</h1> -->
    <UserModal :uid="uid" :destroy="destroy" @update:uid="refresh" ></UserModal>

    <Datatable :data="data" :columns="columns" class="min-w-full text-left text-md text-gray-500">
      <template #action="props">
        <IconButon icon="pencil-square" @click="() => uid = props.rowData.id"/>
        <IconButon icon="trash" class="text-red-500 ms-3" @click="destroyUser(props.rowData.id)"/>
      </template>
    </Datatable>

</template>

<script setup>
import { getCurrentInstance, ref, onMounted, computed, watch } from 'vue';
import Datatable from '../components/datatable-components.vue';
import UserModal from '../components/users/from.vue';
import IconButon from '../components/button/icon-components.vue';

const { proxy } = getCurrentInstance();
const data      = ref([]);
const uid       = ref(0);
const destroy   = ref(false);
const columns   = computed(() => [
    { title: 'Name', data: 'name' },
    { title: 'Email', data: 'email' },
    { title: 'Phone', data: 'phone' },
    { title: '#', data: null, render: '#action'},
]);

const getList = async () => {
    const response = await proxy.$axios.get('/user/all');
    data.value = response.data.data;
};

const refresh = (id) => {
    uid.value = id;
    getList();
}

const destroyUser = async (id) => {
    destroy.value   = true;
    uid.value       = id;
};

onMounted(async () => {
    getList();
});
</script>