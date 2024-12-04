<template>
  <div class="flex min-h-[100vh]">
    <div class="flex w-full px-5 pt-0 md:h-[unset] md:max-w-[100%] lg:h-[100vh] lg:max-w-[100%] lg:px-2 xl:pl-0 ">
      <div class="rounded-lg bg-card text-card-foreground shadow-sm h-[96.5vh] w-[330px] overflow-hidden">
        <div style="position: relative; overflow: hidden; width: 100%; height: 100%;">
          <div class="!translate-x-[5.5%] pr-4 xl:!-mr-8 xl:w-[calc(100%_+_20px)]"
            style="position: absolute; inset: 0px; overflow: scroll; margin-right: 0px; margin-bottom: -22px; width: 100%;">
            <div class="flex h-full flex-col justify-between">
              <div>
                <div class="mt-8 flex items-center justify-center">
                  <div
                    class="me-2 flex h-[40px] w-[40px] items-center justify-center rounded-md bg-zinc-950 text-white dark:bg-white dark:text-zinc-950">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                      aria-hidden="true" class="h-5 w-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <h5 class="me-2 text-2xl font-bold leading-5 text-zinc-950 dark:text-white">Horizon AI</h5>
                </div>
                <div class="mb-8 mt-8 h-px bg-zinc-200 dark:bg-white/10"></div>
                <ul>
                  <li v-for="(route, index) in routes" :key="index">
                    <div
                      v-if="route.meta.title != '404'"
                      :class="{
                        'flex w-full max-w-full items-center justify-between rounded-lg py-3 pl-8 font-medium text-zinc-950 dark:text-zinc-400': true,
                        'bg-zinc-100 dark:bg-zinc-800': isActiveRoute(route)
                      }">
                      <div class="w-full items-center justify-center">
                        <div class="flex w-full items-center justify-center">
                          <div class="text mr-3 text-zinc-950 dark:text-white flex items-center justify-center">
                            <i :class="`bi ${route.meta.icon}`"></i>
                          </div>
                          <router-link class="mr-auto text-sm font-medium text-zinc-950 dark:text-zinc-400"
                            :to="route.path">{{ route.meta.title }}</router-link>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useRouter, useRoute } from 'vue-router';

export default {
  data() {
    return {
      routes: []
    };
  },
  created() {
    const router = useRouter();
    this.routes = router.options.routes;
  },
  methods: {
    isActiveRoute(route) {
      const currentRoute = useRoute();
      return currentRoute.path === route.path;
    }
  }
}
</script>