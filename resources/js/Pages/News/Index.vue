<script lang="ts" setup>
import type { Header, Item } from "vue3-easy-data-table";
import EasyDataTable from 'vue3-easy-data-table';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";

</script>
<template>
  <AuthenticatedLayout>
    <EasyDataTable :headers="headers" :items="data_list" :options="options" :rows-per-page="10">
      <template v-slot:item.title="{ item }">
        {{ item.title }}
     
      </template>
      <template>
        <PrimaryButton @click="destroy(item.id)">Delete</PrimaryButton>

      </template>
      <template #pagination="{ prevPage, nextPage, isFirstPage, isLastPage }">
        <button :disabled="isFirstPage" @click="prevPage">prev page</button>
        <button :disabled="isLastPage" @click="nextPage">next page</button>
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
        { text: "Delete", value: "destroy" }
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