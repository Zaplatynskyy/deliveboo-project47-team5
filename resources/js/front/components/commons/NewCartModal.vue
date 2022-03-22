<template>
    <div class="modal-overlay">
        <div class="modal">
            <div class="title">
                <h3>Vuoi creare un nuovo carrello?</h3>
            </div>
            <div class="text">
                In questo modo cancelli il carrello esistente da Quadrotto Roma
                e crei un nuovo carrello da Smashed Burgers.
            </div>
            <div class="buttons">
                <button @click="$emit('closeModal')" type="button">Visualizza il menù</button>
                <button @click="$emit('clearCart')" type="button">Nuovo carrello</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NewCartModal",
    
};
</script>

<style lang="scss" scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #0000007c;

    .modal {
        background-color: var(--white);
        width: 25%;
    }
}
</style>
