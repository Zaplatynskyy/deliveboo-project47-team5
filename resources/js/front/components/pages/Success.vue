<template>
    <div class="container">
        <h1>Pagamento avvenuto con successo</h1>
        <button class="btn btn-primary">
            <router-link
                    :to="{
                        name: 'home'
                    }"
                    >Home Page
                </router-link>
        </button>
    </div>
</template>

<script>
export default {
    name : 'Success'
}
</script>

<style>

</style>