<template>
  <div>
    <Header />
    <Main v-show="dataShared.loaded" />
    <Footer v-show="dataShared.loaded" />
  </div>
</template>

<script>
import Header from "./components/macro/Header.vue";
import Main from "./components/macro/Main.vue";
import Footer from "./components/macro/Footer.vue";
import dataShared from "./dataShared"

export default {
  name: "App",
  components: {
    Header,
    Main,
    Footer,
  },
  data() {
    return {
      dataShared
    }
  }
};
</script>