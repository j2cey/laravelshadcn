<script setup>
//import Layout from './Layout'
import { Head } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button/index';
import Layout from "@/Layout/App.vue";

//defineProps({ user: Object })
</script>

<template>
  <Layout>
    <template #title>Revenues</template>
    <div class="flex flex-col items-center gap-1 text-center">
      <Head title="Welcome" />
      <h1 class="text-blue-600 text-center p-5">Welcome Revenues</h1>
      <Button class="mt-4">Click Me</Button>
      <!-- <p>Hello {{ user.name }}, welcome to your first Inertia app!</p> -->
    </div>
  </Layout>
</template>