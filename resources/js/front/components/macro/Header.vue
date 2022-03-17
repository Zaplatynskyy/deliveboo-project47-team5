<template>
  <header class="d-flex justify-content-around">
    <h2>
      <router-link
            :to="{
                name: 'home'
            }"
            >
            Home Page
        </router-link>
    </h2>
    <h2>
      <router-link
            :to="{
                name: 'advanced-search'
            }"
            >
            Ricerca Avanzata
        </router-link>
    </h2>
    <h2><a href="/admin/home">Backend</a></h2>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang='scss' scoped>
</style>