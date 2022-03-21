<template>
    <main>
        <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: "Main",
};
</script>

<style lang="scss" scoped>
main {
    background: var(--light-grey);
    margin-top: 80px;
}
</style>
