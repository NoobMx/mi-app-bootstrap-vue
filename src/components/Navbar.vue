<!-- <template>
    <b-navbar type="dark" variant="primary">
      <b-navbar-brand href="#">Mi Dashboard</b-navbar-brand>
    </b-navbar>
</template> -->

<template>
  <b-navbar type="dark" variant="primary" >
    <b-button variant="light" class="mr-2" v-b-toggle.sidebar-1>☰</b-button>
    
    <b-navbar-brand class="ml-auto" href="#">Dashboard</b-navbar-brand>
  </b-navbar>
</template>

  
  <script>
  export default {
    name: 'AppNavbar'
  }
  </script>
  