<template>
   <div class="container">
        <div class="row align-items-center h-100">
          <div
            class="
              col-md-6
              border
              mx-auto
              my-5
              px-5
              align-middle
              py-5
              shadow
              rounded
              text-center
            "
          >
            <h2 class="mb-5">Reference</h2>
            <form @submit="handleOnSignin">
              <input type="text" class="form-control" v-model="ref" /><br />
              <button class="btn btn-primary col-md-4">Login</button>
            </form>
          </div>
        </div>
      </div>
</template>

<script>
export default {
name: "Signin",

      data() {
        return {
          ref: "",
        };
      },
      methods: {
        async handleOnSignin(e) {
          e.preventDefault();
          await fetch("http://localhost/appointement/user/login", {
            method: "POST",
            body: JSON.stringify({
              reference: this.ref,
            }),
          })
            .then((res) => {
              return res.json();
            })
            .then((res) => {
                if(res.ref){
                    console.log('Test')
                    localStorage.setItem("ref", res.ref);

                    this.$router.push('/available');
            //   window.location = "creneaux_disponibles.html";
                }
             
            });
        },
      },
}
</script>

<style>

</style>