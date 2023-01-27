<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});
</script>
<!-- login vue -->
<template>
  <Head title="Welcome" />
    <div
    class="relative flex items-top justify-center min-h-screen bg-blue-200 sm:items-center sm:pt-0"
  >
    <div class="">
      <div
        v-if="canLogin"
        class="hidden  fixed top-50 right-50 px-6 py-4 sm:block bg-white shadow-lg rounded-lg pt-6 pb-8 mb-2"
      >
        <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="text-sm text-gray-700 dark:text-gray-500 underline"
          >Dashboard</Link
        >

        <template v-else>
          <Link
            :href="route('login')"
            class="text-4xl text-gray-700 dark:text-black-500 hover:underline"
            >Log in</Link
          >

          <Link
            v-if="canRegister"
            :href="route('register')"
            class="ml-4 text-4xl text-gray-700 dark:text-black-500 hover:underline"
            >Register</Link
          >
        </template>
      </div>
    </div>
</div>
</template>
