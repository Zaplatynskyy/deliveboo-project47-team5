<template>
    <footer>
        <div class="my_container py-3">
            <div class="nav-footer row mx-0 g-5 justify-content-around">
                <div class="col-sm-6 py-2 px-0 col-lg-3 d-flex">
                    <div class="footer-card">
                        <h5>Credits</h5>
                        <ul>
                            <li>
                                <a href="https://github.com/SimoneSpirito01"
                                    ><i class="fa-brands fa-github"></i> Simone
                                    Spirito</a
                                >
                            </li>
                            <li>
                                <a href="https://github.com/RobertoVillani98"
                                    ><i class="fa-brands fa-github"></i> Roberto
                                    Villani</a
                                >
                            </li>
                            <li>
                                <a href="https://github.com/Zaplatynskyy"
                                    ><i class="fa-brands fa-github"></i> Igor
                                    Zaplatynskyy</a
                                >
                            </li>
                            <li>
                                <a href="https://github.com/AndreaVk"
                                    ><i class="fa-brands fa-github"></i> Andrea
                                    Ciccantelli</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="col-sm-6 py-2 px-0 col-lg-3 d-flex justify-content-sm-end justify-content-lg-center"
                >
                    <div class="footer-card">
                        <h5>Note legali</h5>
                        <ul>
                            <li><a href="">Termini & condizioni</a></li>
                            <li><a href="">Informativa sulla privacy</a></li>
                            <li><a href="">Cookies</a></li>
                        </ul>
                    </div>
                </div>

                <div
                    class="col-sm-6 py-2 px-0 col-lg-3 d-flex justify-content-sm-start justify-content-lg-center"
                >
                    <div class="footer-card">
                        <h5>Aiuto</h5>
                        <ul>
                            <li><a href="">Contatti</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Tipi di cucina</a></li>
                            <li class="d-flex social-channels">
                                <a class="mr-1 social" href="" id="fb"
                                    ><i class="fa-brands fa-facebook"></i
                                ></a>
                                <a class="mr-1 social" href="" id="twitter"
                                    ><i class="fa-brands fa-twitter"></i
                                ></a>
                                <a class="mr-1 social" href="" id="ig"
                                    ><i class="fa-brands fa-instagram"></i
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="col-sm-6 py-2 px-0 col-lg-3 d-flex justify-content-sm-end"
                >
                    <div class="footer-card">
                        <h5>Porta Deliveboo con te</h5>
                        <div class="store">
                            <img src="storage/uploads/google-play.png" alt="" />
                            <img src="storage/uploads/app-store.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <nav class="social-channels">
                <p>&#169; 2022 DeliveBoo</p>
            </nav>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style lang="scss" scoped>
footer {
    color: white;
    background-color: var(--main-color);
    padding: 30px 0;

    .nav-footer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

        .footer-card {
            // padding: 25px 20px;
            border-radius: 5px;
            height: 100%;
            margin-bottom: 10px;

            h5 {
                font-weight: 600;
                font-size: 18px;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-top: 10px;

                li {
                    font-size: 14px;
                    margin-top: 8px;
                }

                a {
                    font-size: 16px;
                    color: #fff;
                    display: block;
                    &:hover {
                        // color: #00ccbc;
                        text-decoration: none;
                        transform: scale(1.05);
                    }
                }

                .register-btn {
                    color: #fff;
                    background: #00ccbc;
                    padding: 14px 24px;
                    border-radius: 4%;
                    margin-top: 20px;

                    &:hover {
                        color: #fff;
                        background-color: #05b7a8;
                    }
                }

                .subscribe {
                    margin-top: 20px;
                }
            }
        }
    }

    .store {
        margin-top: 18px;
        img {
            width: 130px;
            margin-bottom: 14px;
            cursor: pointer;
        }
    }

    .social-channels {
        display: flex;
        justify-content: space-between;

        &.d-flex {
            display: inline;
            margin-right: 10px;
            cursor: pointer;

            #fb:hover {
                color: rgb(59, 59, 221);
            }

            #twitter:hover {
                color: #1da1f2;
            }

            #ig:hover {
                color: #ac3c9d;
            }
        }

        ul {
            padding-left: 0;

            .social {
                color: white;
                font-size: 22px;
            }
        }

        p {
            color: #ffffff;
            font-size: 14px;
            margin-top: 10px;
        }
    }
}
</style>
