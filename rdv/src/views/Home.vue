<template>
  <div class="home">
    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-md-6 border mx-auto my-5 align-middle py-5 shadow rounded text-center  ">
                <router-link to="/new">Nouvaux</router-link>
                <router-link to="/check">Rendez-vous</router-link>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    // HelloWorld
  }
}
</script>
