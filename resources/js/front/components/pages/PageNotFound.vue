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
import dataShared from '../../dataShared';
export default {
    name: "PageNotFound",
    data() {
      return {
          dataShared
      }
    },
    created() {
        dataShared.loaded = true;
    },
};
</script>

<style lang="scss" scoped>
.not-found {
    position: relative;

    img {
        width: 100%;
    }
    button {
        background-color: #43b6a8;
        position: absolute;
        bottom: 20%;
        left: 50%;
        transform: translateX(-50%);

        a {
            color: white;
        }

        &:hover {
            background-color: #21c7b4;
        }
    }
}
</style>
