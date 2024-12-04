<template>
  <div>
    <main class="flex dark:bg-zinc-950 dark:text-gray-200">
      <SideComponent />
      <ContainerComponent>

        <!-- <LangComponent /> -->
        <RouterView />
      </ContainerComponent>
    </main>
  </div>
</template>

<script>
import SideComponent from './layout/sidebar-components.vue';
import LangComponent from './localize-components.vue';
import ContainerComponent from './layout/container-components.vue';
import { RouterView } from 'vue-router';

export default {
  components: {
    SideComponent,
    ContainerComponent,
    LangComponent,
  }
};
</script>