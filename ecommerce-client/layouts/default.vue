<template>
  <div>
    <navbar></navbar>
    <nuxt />
  </div>
</template>

<script>
    import Navbar from "./partials/navbar"

    export default {
      components: {
        'navbar': Navbar
      }
    }
</script>
