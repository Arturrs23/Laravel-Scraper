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
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white-200"
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
