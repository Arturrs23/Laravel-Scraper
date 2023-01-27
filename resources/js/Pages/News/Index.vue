<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Return from '@/Components/Return.vue';
import axios from 'axios'

</script>
<template>
    <AuthenticatedLayout>
        <div>
            <table>
                <!-- using var data_list to loop trough and display-->
                <tr v-for=" data in data_list" :key="data.id">
                  <td class="text-white">{{ data.title }}</td>
                  <td class="text-white">{{ data.link }}</td>
                  <td class="text-white">{{ data.points }}</td>
                  <td class="text-white">{{ data.date_created }}</td>
                </tr>
              </table>
        </div>
    </AuthenticatedLayout>

  </template>
  
  <script>
  
  export default {
  props:['data_list']
}
  </script>