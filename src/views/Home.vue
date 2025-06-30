<template>
    <div>
      <Navbar />
      <Sidebar />
      <div class="p-3">
        <h2>Aqui va algo</h2>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from '../components/Navbar.vue'
  import Sidebar from '../components/Sidebar.vue'
  
  export default {
    name: 'AppHome',
    components: {
      Navbar,
      Sidebar
    }
  }
  </script>
  