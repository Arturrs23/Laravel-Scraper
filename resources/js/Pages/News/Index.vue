<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
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
        <tr
          class="border border-white-500"
          v-for="data in data_list"
          :key="data.id"
        >
          <td class="text-white px-5 py-5 text-sm">{{ data.title }}</td>
          <td class="text-white px-5 py-5 text-sm hover:underline">
            <a :href="data.link" target="_blank">{{ data.link }}</a>
          </td>
          <td class="text-white px-5 py-5 text-sm">{{ data.points }}</td>
          <td class="text-white px-5 py-5 text-sm">{{ data.date_created }}</td>
          <!-- del btn -->
            <td class="text-red-500 p-3 ">
            <button class="hover:underline" @click="destroy(data.id)">Delete</button>
          </td>
        </tr>
      </table>





      <div>
    
      </div>
    </div>
    <!-- table -->
    <div>
      <b-table striped hover :items="items" :fields="fields"></b-table>
    </div>




  </AuthenticatedLayout>
</template>
<script>
export default {
  data() {
    return {
      items: [
        { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
        { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
        { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
        { age: 38, first_name: 'Jami', last_name: 'Carney' }
      ],
      fields: [
        { key: 'age', label: 'Age' },
        { key: 'first_name', label: 'First Name' },
        { key: 'last_name', label: 'Last Name' }
      ]
    }
  },
  
  props: ["data_list"],

  methods: {
    async destroy(id) {
      try {
        // sending req to server with the item ID
        await axios.delete(`/news/${id}`); //enpoint to the same /news after delete
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