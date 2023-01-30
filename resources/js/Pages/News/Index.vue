
<script lang="ts" setup>
import type { Header, Item } from "vue3-easy-data-table";
import EasyDataTable from "vue3-easy-data-table";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";
</script>
<template>
  <AuthenticatedLayout>
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="
            text-xs text-gray-700
            uppercase
            bg-gray-50
            dark:bg-gray-700 dark:text-gray-400
          "
        >
          <tr class="text-white border border-white-500 text-left">
            <th
              scope="col"
              class="px-6 py-3"
              v-for="header in headers"
              :key="header.value"
            >
              {{ header.text }}
            </th>
            <th>Delete</th>
          </tr>
        </thead>

        <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          v-for="item in data_list"
          :key="item.id"
        >
          <td class="px-6 py-4" v-for="header in headers" :key="header.value">
            {{ item[header.value] }}
          </td>

          <PrimaryButton @click="destroy(item.id)">Delete</PrimaryButton>
        </tr>
      </table>
    </div>
    <!-- <EasyDataTable class="text-left text-gray-300" 
    :headers="headers"
    :items="items" 
    :options="options" 
    :rows-per-page="10">
    <template #item-actions="{ item }" class="text-center">

      <div  v-for="item in data_list" :key="item.id">
        <PrimaryButton v-if="data_list.length === 29" @click="destroy(item.id)" class="text-white">Delete</PrimaryButton>
    </div>
    </template>
    <template #pagination="{ prevPage, nextPage, isFirstPage, isLastPage }">

      <button class="text-white hover:underline ml-2" :disabled="isFirstPage" @click="prevPage">
        Prev page
      </button>
      <button class="text-white hover:underline" :disabled="isLastPage" @click="nextPage">
        Next page
      </button>
    </template>
  </EasyDataTable> -->
  </AuthenticatedLayout>
</template>
<script lang="ts">
export default {
  props: ["data_list"],
  components: { EasyDataTable, AuthenticatedLayout, PrimaryButton },
  data() {
    return {
      items: this.data_list,
      headers: [
        { text: "Name", value: "title" },
        { text: "ID", value: "id" },
        { text: "Link", value: "link" },
        { text: "Points", value: "points" },
        { text: "Date", value: "date_created" },
        { text: "Actions", value: "actions" },
      ],
      options: {
        pagination: {
          sortBy: "name",
          itemsPerPage: 10,
        },
      },
    };
  },

  methods: {
    destroy(id) {
      try {
        // sending req to server with the item ID
        axios.delete(`/news/${id}`); //enpoint to the same /news after delete
        // emove the item
        let index = this.data_list.findIndex((item) => item.id === id);
        this.data_list.splice(index, 1);
      } catch (error) {
        console.log(error);
        // error
        alert("Could not delete");
      }
    },
  },
};
</script>