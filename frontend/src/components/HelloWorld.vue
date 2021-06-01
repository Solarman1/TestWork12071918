<template>
  <div class="hello">
      
      <input type="text" v-model='dataForSend.someRowOne'>
      <input type="text" v-model='dataForSend.someRowTwo'>

      <button v-on:click="storeData()">Store</button>

      <div>
        <table>
          <tr>
            <th>Data Row 1</th>
            <th>Data Row 2</th>
            <th>Delete</th>
          </tr>

          <tr v-for="item in dataFromBackend.data" :key="item.id">
            <td><pre>{{ item.someRowOne }}</pre></td>
            <td><pre>{{ item.someRowTwo }}</pre></td>
            <td><button v-on:click="deleteData(item.id)">delete</button></td>
          </tr>
        
        </table>

      </div>
        


  </div>
</template>

<script>
import axios from "axios"

export default {
  name: 'HelloWorld',
  data(){
    return {
      dataFromBackend : [],
      dataForSend: {
        someRowOne : '',
        someRowTwo : '',
      },
    };
  },
  props: {
  },
  mounted() {
    axios
      .get('http://127.0.0.1:8000/api/someData')
      .then(response => (this.dataFromBackend = response));
  },
  methods: {
    storeData(){
      axios
        .post('http://127.0.0.1:8000/api/someData', this.dataForSend)
        .then( function(response) {
            console.log(response.data)
        });
    },

    // updateData(id){
    //   axios
    //     .put(`http://127.0.0.1:8000/api/someData/${id}`, this.dataForUpdate)
    //     .then( function(response) {
    //         console.log(response.data)
    //     });
    // },

    deleteData(id){
      axios
        .delete(`http://127.0.0.1:8000/api/someData/${id}`, this.dataForSend)
        .then( function(response) {
            
            console.log(response.data)
        });
    }
  },
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
