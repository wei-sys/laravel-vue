<template>
  <section class="bg-white dark:bg-gray-900 ">
    <div class="container min-h-[calc(100vh_-_3rem)] mx-auto lg:flex lg:items-center lg:gap-12">

      <div class="wf-ull lg:w-1/2">
        <p class="text-sm font-medium text-blue-500 dark:text-blue-400">404 error</p>
        <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">{{ $t('404_title') }}</h1>
        <p class="mt-4 text-gray-500 dark:text-gray-400">{{ $t('404_content') }}</p>

        <div class="flex items-center mt-6 gap-x-3">
          <button @click="goBack"
            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
            <i class="bi bi-arrow-left"></i>

            <span>{{ $t('go_back') }}</span>
          </button>
        </div>
      </div>

      <div class="relative w-full mt-12 lg:w-1/2 lg:mt-0">
        <img class="w-full max-w-lg lg:mx-auto" src="/images/components/illustration.svg" alt="">
      </div>
    </div>
  </section>
</template>
<script>

export default {
  methods: {
    goBack() {
      this.$router.go(-1);
    }
  }
};
</script>