<template>
  <b-sidebar id="sidebar-1" title="Menú" bg-variant="dark" text-variant="light" shadow>
    <b-nav vertical>
      <b-nav-item href="#">Inicio</b-nav-item>
      <b-nav-item href="#">Reportes</b-nav-item>
      <b-nav-item href="#">Usuarios</b-nav-item>
    </b-nav>

    <template #footer>
      <div class="d-flex bg-dark text-light align-items-center px-3 py-2">
        <strong class="mr-auto">@noob</strong>
        <b-avatar src="https://placekitten.com/300/300"></b-avatar>
      </div>
    </template>
  </b-sidebar>
</template>
  
<script>
  export default {
    name: 'AppSidebar'
  }
</script>
  