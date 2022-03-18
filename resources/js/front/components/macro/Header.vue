<template>
  <header class="d-flex justify-content-between">
    <div class="logo">
      <img src="/storage/uploads/logo-deliveroo.png" alt="logo deliveroo">
      <span class="header_title">deliveboo</span>
    </div>
    <!-- <h2>
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
    <h2><a href="/admin/home">Backend</a></h2> -->
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang='scss' scoped>

header {
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');

  height: 80px;
  background-color: var(--light-grey);
  padding: 15px;

  .logo{
    display: flex;
    align-items: center;

    img {
      height: 100%;
    }

    .header_title {
      font-size: 1.8rem;
      font-weight: bold;
      font-family: 'futura-md-bt-4', sans-serif;
      color: var(--main-color);
      margin-left: 10px;
    }
  }

  
}

</style>