<template>
    <main>
        <router-view :key="$route.fullPath"></router-view>
    </main>
</template>

<script>
export default {
    name: "Main",
};
</script>

<style lang="scss" scoped>
main {
    min-height: calc(100vh - 80px);
    margin-top: 80px;
}
</style>
