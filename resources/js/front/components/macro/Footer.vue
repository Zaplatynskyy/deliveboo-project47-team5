<template>
  <footer>
    <div class="container py-3">
        <div class="nav-footer row g-5 justify-content-around">
            <div class="col-md-6 p-2 col-lg-3">
                <div class="footer-card">
                    <h5>Scopri Deliveboo</h5>
                    <ul>
                        <li><a href="">Investitori</a></li>
                        <li><a href="">Chi siamo</a></li>
                        <li><a href="">Ristoranti</a></li>
                        <li><a href="">Altro</a></li>
                        <li><a href="">Pressroom</a></li>
                        <li><a href="">Il nostro blog</a></li>
                        <li><a href="">Programmazione</a></li>
                        <li><a href="">Design</a></li>
                        <li><a href="">Lavora con noi</a></li>
                        <li><a href="">Diventa nostro partner</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="col-md-6 p-2  col-lg-3">
                <div class="footer-card">
                    <h5>Note legali</h5>
                    <ul>
                        <li><a href="">Termini & condizioni</a></li>
                        <li><a href="">Informativa sulla privacy</a></li>
                        <li><a href="">Cookies</a></li>
                    </ul>
                </div>
                
            </div>
    
            <div class="col-md-6 p-2  col-lg-3">
                <div class="footer-card">
                    <h5>Aiuto</h5>
                    <ul>
                        <li><a href="">Contatti</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Tipi di cucina</a></li>
                    </ul>
                </div>
                
            </div>
    
            <div class="col-md-6 p-2 col-lg-3">
                <div class="footer-card">
                    <h5>Porta Deliveboo con te</h5>
                    <div class="store">
                      <img src="storage/uploads/google-play.png" alt="">
                      <img src="storage/uploads/app-store.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        
        <nav class="social-channels">
            <ul>
                <li>
                    <a href="" id="fb" class="social"><i class="fa-brands fa-facebook"></i></a>
                </li>
                <li>
                    <a href="" id="twitter" class="social"><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li>
                    <a href="" id="ig" class="social"><i class="fa-brands fa-instagram"></i></a>
                </li>
            </ul>

            <p>
                &#169; 2022 DeliveBoo
            </p>
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
    min-height: 400px;
    color: white;
    background-color: #2e3333;

    .nav-footer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding-bottom: 25px;

        .footer-card {
            padding: 25px 20px;
            background-color: #434848;
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

                li{
                  font-size: 14px;
                  margin-top: 8px;
                }

                a {
                    color: white;

                    &:hover {
                        color: #00ccbc;
                        text-decoration: none;
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

    .store{
      margin-top: 18px;
      img{
        width:130px;
        margin-bottom: 14px;
        cursor: pointer;
      }
    }

    .social-channels {
        display: flex;
        justify-content: space-between;

        ul {
            padding-left: 0;
        
        .social{
          color: white;
          font-size: 22px;
        }

            li {
                display: inline;
                margin-right: 10px;
                cursor: pointer;

                #fb:hover {
                    color: blue;
                }

                #twitter:hover{
                  color:#1DA1F2;
                }

                #ig:hover{
                  color:#AC3C9D ;
                }
            }
        }

        p {
            color: #434848;
            font-size: 14px;
            margin-top: 10px;
        }
    }
}
</style>