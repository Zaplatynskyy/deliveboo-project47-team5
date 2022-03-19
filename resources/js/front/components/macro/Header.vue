<template>
  <header class="d-flex justify-content-between align-items-center">
      <router-link :to="{ name: 'home' }" >
        <div class="logo d-flex align-items-center">
            <img src="/storage/uploads/logo-deliveroo.png" alt="logo deliveroo">
            <span class="header_title">deliveboo</span>
        </div>
      </router-link>

    <a href="/admin/home">
      <button class="btn btn-main">
        Area riservata
      </button>
    </a>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang='scss' scoped>

header {

  height: 80px;
  background-color: var(--light-grey);
  padding: 15px;

  .logo{
    height: 30px;
    cursor: pointer;

    img {
      height: 100%;
    }

    .header_title {
      font-size: 1.15rem;
      font-weight: bold;
      font-family: 'Poppins', sans-serif;
      color: var(--main-color);
      margin-left: 5px;
    }
  }

  .btn-main {
    color: var(--white);
    font-size: .9rem;
    font-weight: bold;
    background-color: var(--main-color);
    padding: 5px 10px;
    transition: 0.15s;

    &:hover {
      background-color: #43b6a8;
    }

    &:active {
      transform: scale(.97);
    }
  }
}

@media screen and (min-width: 576px) {
  header {
    .btn-main {
      font-size: 1rem;
      padding: 10px 15px;
    };
  }
}

@media screen and (min-width: 1400px) {
  header {
    padding: 15px 50px;
  }
}
</style>