<template>
  <div class="container">
    <div class="add" v-if="isAdd">
      <form>
        <div class="inner">
          <label for="date">Date :</label>
          <input type="date" id="date" v-model="date" />
        </div>
        <div class="inner">
          <label for="hour">Time :</label>
          <input type="text" id="hour" v-model="hour" />
        </div>
        <div class="inner">
          <label for="message">Message :</label>
          <input type="text" id="message" v-model="message" />
        </div>
        <input type="submit" @click="createAp" value="Add" />
      </form>
    </div>
    <div class="row align-items-center h-100">
      <div
        class="
          col-md-10
          border
          mx-auto
          my-2
          align-middle
          px-5
          py-5
          shadow
          rounded
        "
      >
        <h2 class="mx-auto mb-5">les créneaux disponibles.</h2>
        <div class="d-flex">
          <p class="w-100">Reference : HH12345</p>
          <button class="btn btn-success" @click="toggleAdd" v-if="isAdd">
            Cancel
          </button>
          <button class="btn btn-success" @click="toggleAdd" v-else>
            Ajouter
          </button>
        </div>

        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Horaire</th>
              <th scope="col">TypeConsultation</th>
              
              <th scope="col">Action</th>
            </tr>
          </thead>
          <hr />
          <tbody>
            <tr v-for="item in data" :key="item.id">
              <th scope="row">{{ item.date }}</th>
              <td>{{ item.Hour }}</td>
              <td>{{item.message}}</td>
             
              <td class="d-flex">
                <button class="btn btn-warning">Update</button>
                <button class="btn btn-danger mx-1">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "",
  data() {
    return {
      ref: "",
      isAdd: false,
      data: [],
      date: "",
      hour: "",
      message: "",
    };
  },
  mounted() {
    if (!localStorage.getItem("ref")) {
      window.location = "index.html";
      return true;
    }
    this.ref = localStorage.getItem("ref");
    this.getAll();
  },
  methods: {
    toggleAdd: function () {
      this.isAdd = !this.isAdd;
    },
    async getAll() {
      await fetch("http://localhost/appointement/Appointement/index", {
        method: "POST",
        body: JSON.stringify({
          reference: this.ref,
        }),
      })
        .then((res) => {
          return res.json();
        })
        .then((res) => {
          this.data = res.data;
        });
    },
    async createAp(e) {
      e.preventDefault();
      await fetch("http://localhost/appointement/Appointement/add/", {
        method: "POST",
        body: JSON.stringify({
          reference: this.ref,
          date: this.date,
          hour: this.hour,
          message: this.message,
        }),
      }).then((res) => {});
    },
  },
};
</script>

<style scoped>

table {
  width: 100%;
}
</style>