<template>
  <div class="my_container">
    <div class="blog">
      <h2>I tuoi piatti preferiti, <span>consegnati da noi.</span></h2>
      <div class="row">
        <div class="card">
          <img src="/storage/uploads/1.jpg" alt="" />
          <div class="card-text">
            <div class="desc">McDonald's</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/2.jpg" alt="" />
          <div class="card-text">
            <div class="artist"></div>
            <div class="desc">Nima Sushi</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/0.jpg" alt="" />
          <div class="card-text">
            <div class="desc">Pokèria by NIMA</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/3.jpg" alt="" />
          <div class="card-text">
            <div class="desc">Daruma Kosher</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/4.jpg" alt="" />
          <div class="card-text">
            <div class="desc">Temakinho</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/5.jpg" alt="" />
          <div class="card-text">
            <div class="desc">Berberè Pizzeria</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/6.jpg" alt="" />
          <div class="card-text">
            <div class="desc">Old Wild West</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/7.jpg" alt="" />
          <div class="card-text">
            <div class="desc">Roadhouse</div>
          </div>
        </div>

        <div class="card">
          <img src="/storage/uploads/8.jpg" alt="" />
          <div class="card-text">
            <div class="desc">KFC</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Banner",
};
</script>

<style lang="scss" scoped>
.my_container {
  background-color: #f8f8f8;
  width: 100%;
}
.blog {
  padding: 50px 0;
  width: 80%;
  margin: 0 auto;
  h2 {
    font-size: 32px;

    span {
      color: #27ab94;
    }
  }

  .row {
    display: grid;
    grid-template-columns: 1fr 1fr;

    margin: 40px 0;
    gap: 15px;
  }

  img {
    width: 100%;
    height: 65%;
    border-radius: 10px;
    object-fit: cover;
  }

  .card-text {
    margin-top: 5px;

    .desc {
      padding: 10px 0;
      &:hover {
        color: #27ab94;
      }
    }
  }
}

@media screen and (min-width: 360px) {
  .blog {
    h2 {
      font-size: 25px;
      text-align: center;
    }
    .row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .desc {
      font-size: 16px;
    }

    img {
      width: 100%;
    }

    .card-text {
      font-size: 1.4rem;
    }
  }
}

@media screen and (min-width: 780px) {
  .blog {
    padding: 50px 0;

    h2 {
      font-size: 32px;
    }
    .row {
      grid-template-columns: 1fr 1fr 1fr !important;
      margin: 40px 0;
      gap: 15px;
    }
    .desc {
      font-size: 22px;
    }

    img {
      width: 100%;
      height: 65%;
      border-radius: 10px;
    }

    .card-text {
      font-size: 1.4rem;
      margin-top: 15px;
    }
  }
}
</style>