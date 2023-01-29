<script lang="ts" setup>
import EasyDataTable from "vue3-easy-data-table";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";




</script>
<template>
  <AuthenticatedLayout >
    <EasyDataTable 
      class="text-white p-28 w-full text-sm text-left text-gray-500 dark:text-gray-400"
      :headers="headers"
      :items="data_list"
      :options="options"
      :rows-per-page="10"
    >
    <template #item-actions="{ item }" class="text-center" >
      <tr>
        <td>
          <button @click="destroy(item.id)" class="text-white">Delete</button>
        </td>
      </tr>
    </template>





      <template #pagination="{ prevPage, nextPage, isFirstPage, isLastPage }">
        
        <button
          class="text-white hover:underline ml-2"
          :disabled="isFirstPage"
          @click="prevPage"
        >
          Prev page
        </button>
        <button
          class="text-white hover:underline"
          :disabled="isLastPage"
          @click="nextPage"
        >
          Next page
        </button>
      </template>
    </EasyDataTable>
  </AuthenticatedLayout>
</template>

<script lang="ts">
export default {
  components: { EasyDataTable },
  props: ["data_list"],

  data() {
    return {
      deleteId: null,

      headers: [
        { text: "Name", value: "title" },
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
      // function to delete item
      try {
        // sending req to server with the item ID
       axios.delete(`/news/${id}`); //enpoint to /news after delete
        // remove the item
        const index = this.data_list.findIndex((item) => item.id === id);
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
