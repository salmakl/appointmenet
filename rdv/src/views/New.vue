<template>
  <div class="container">
    <div class="row align-items-center h-100">
      <div
        class="
          col-md-6
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
        <h2 class="mb-5">New user</h2>
        <form v-on:submit="handleCreateUser">
          Reference :
          <input type="text" class="form-control" v-model="reference" /><br />

          Nom :
          <input type="text" class="form-control" v-model="nom" /><br />
          Prenom :
          <input type="text" class="form-control" v-model="prenom" /><br />
          Tele :
          <input type="tel" class="form-control" v-model="tele" /><br />
          Age :
          <input type="number" class="form-control" v-model="age" /><br />
          Email :
          <input type="email" class="form-control" v-model="email" /><br />
          <button class="btn btn-primary col-md-4">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "",
      data() {
        return {
          nom: "",
          prenom: "",
          tele: "",
          age: 0,
          email: "",
          reference: "",
        };
      },
      methods: {
        async handleCreateUser(e) {
          e.preventDefault();
          await fetch("http://localhost/appointement/user/add", {
            method: "POST",
            body:JSON.stringify({
              reference: this.reference,
              fname: this.prenom,
              lname: this.nom,
              age: this.age,
              email: this.email,
              phone: this.tele,
            }),
          }).then(res=>{
              this.$router.push('/');
          });
        },
      },
    
};
</script>

<style>
</style>