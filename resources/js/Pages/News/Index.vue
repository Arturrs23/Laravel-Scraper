<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import Return from "@/Components/Return.vue";
import axios from "axios";
</script>
<template>
    <AuthenticatedLayout>
        <div class="p-28">
            <table class="min-w-full leading-normal">
                <thead class="text-left">
                    <tr>
                      <th class="text-white px-5 py-5 text-sm">
                      <h3>Name</h3>
                      </th>
                      <th class="text-white px-5 py-5 text-sm">
                       <h3>Link</h3>
                      </th>
                      <th class="text-white px-5 py-5 text-sm">
                       <h3>Points</h3>
                      </th>
                      <th class="text-white px-5 py-5 text-sm">
                    <h3>Date</h3>
                      </th>
                    </tr>
                  </thead>
                <!-- using var data_list to loop trough and display-->
                <tr class="border border-white-500" v-for="data in data_list" :key="data.id">
                    <td class="text-white px-5 py-5 text-sm">{{ data.title }}</td>
                    <td class="text-white px-5 py-5 text-sm hover:underline"><a :href="data.link" target="_blank">{{ data.link }}</a></td>
                    <td class="text-white px-5 py-5 text-sm">{{ data.points }}</td>
                    <td class="text-white px-5 py-5 text-sm">{{ data.date_created }}</td>
                </tr>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
<script>
export default {
    props: ["data_list"],
};
</script>
