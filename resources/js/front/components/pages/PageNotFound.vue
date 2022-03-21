<template>
  <div class="not-found">
    <img src="/storage/uploads/404-error.png" alt="" />
    <button class="btn">
      <router-link
        :to="{
          name: 'home',
        }"
        >Home Page
      </router-link>
    </button>
  </div>
</template>

<script>
export default {
  name: "PageNotFound",
};
</script>

<style lang="scss" scoped>
.not-found {
  img {
    width: 100%;
  }
  button {
    position: absolute;
    top: 15%;
    left: 4%;
    background-color: #43b6a8;

    a {
      color: white;
    }

    &:hover {
      background-color: #21c7b4;
    }
  }
}
</style>