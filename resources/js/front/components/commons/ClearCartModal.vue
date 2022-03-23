<template>
    <div class="modal-overlay">
        <div class="modal">
            <div class="title">
                <h3>Sei sicuro di voler eliminare i piatti salvati nel carrello?</h3>
            </div>
            <div class="text">
                In questo modo cancelli tutti i piatti inseriti fino ad ora.
            </div>
            <div class="buttons">
                <button @click="$emit('closeModal')" class="btn btn-modal-cancel" type="button">Annulla</button>
                <button @click="$emit('clearCart')" class="btn btn-modal-confirm" type="button">Svuota Carrello</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ClearCartModal",
    
};
</script>

<style lang="scss" scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #0000007c;

    .modal {
        background-color: var(--white);
        width: 90%;
        border-radius: 5px;
        padding: 30px 20px;

        .text {
            font-size: .93rem;
            margin: 15px 0 30px 0;
        }

        .buttons {
            display: flex;

            .btn {
                font-size: 1rem;
                border-radius: 5px;
                padding: 10px;

                &:active {
                    box-shadow: 0px 0px 1px 2px #B2F0EB;
                }
            }

            .btn-modal-cancel {
                width: 40%;
                color: var(--main-color);
                background-color: var(--white);
                border: 1px solid #e8ebeb;
                margin-right: 10px;

                &:hover {
                    border: 1px solid #d1d4d4;
                }
            }

            .btn-modal-confirm {
                width: 60%;
                color: var(--white);
                background-color: var(--main-color);
                border: 1px solid var(--main-color);

                &:hover {
                    background-color: #00c2b3;
                    border: 1px solid #00c2b3;
                }
            }
        }
    }
}

@media screen and (min-width: 576px) {
    .modal-overlay {

        .modal {
            width: 70%;
        }
    }
}

@media screen and (min-width: 768px) {
    .modal-overlay {

        .modal {
            width: 60%;
        }
    }
}

@media screen and (min-width: 992px) {
    .modal-overlay {

        .modal {
            width: 50%;
        }
    }
}

@media screen and (min-width: 1200px) {
    .modal-overlay {

        .modal {
            width: 40%;
        }
    }
}

@media screen and (min-width: 1400px) {
    .modal-overlay {

        .modal {
            width: 30%;
        }
    }
}

</style>
