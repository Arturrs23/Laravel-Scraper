<script lang="ts" setup>
import type { Header, Item } from "vue3-easy-data-table";
import EasyDataTable from 'vue3-easy-data-table';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";



</script>
<template>
  <AuthenticatedLayout >
    <EasyDataTable class="text-white p-28 w-full text-sm text-left text-gray-500 dark:text-gray-400"
     :headers="headers" 
     :items="data_list"
     :options="options" 
     :rows-per-page="10">
     
      
    
      <template class="text-center" #pagination="{ prevPage, nextPage, isFirstPage, isLastPage }">
        <button class="text-white hover:underline " :disabled="isFirstPage" @click="prevPage">Prev page</button>
        <button class="text-white hover:underline" :disabled="isLastPage" @click="nextPage">Next page</button>
        
      </template>
      <template v-slot:item="{ item }">
        <td>{{ item.title }}</td>
        <td>{{ item.link }}</td>
        <td>{{ item.points }}</td>
        <td>{{ item.date_created }}</td>
        <td>
          <button class="text-white hover:underline" @click="destroy(item.id)">Delete</button>
        </td>
      </template>
    </EasyDataTable>
  </AuthenticatedLayout>
</template>

<script lang="ts">
export default {
  components: { EasyDataTable, PrimaryButton },
  props: ['data_list'],
  data() {
    return {
      headers: [
    { text: "Name", value: "title" },
    { text: "Link", value: "link" },
    { text: "Points", value: "points" },
    { text: "Date", value: "date_created" },
    { text: "Actions", value: "actions" }
      ],
      options: {
        pagination: {
          sortBy: 'name',
          itemsPerPage: 10 
        },
      }
    }
  },
  methods: {
    async destroy(id) {
      try {
        // sending req to server with the item ID
        await axios.delete(`/news/${id}`); //enpoint to the same /news after delete
        // remove the item 
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