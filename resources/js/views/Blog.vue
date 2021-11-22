<template>
  <div class="container" v-if="!loading && !not_found">
    <div class="productname">
      <a >{{post.title}}</a>
    </div>
    <div class="content">
      <div class="row">
        <div class="col-sm-4">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" v-if="!loading && !not_found">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block " :src=" ('/storage/' + post.image) " alt="First slide" style="width:289px;height:289px">
              </div>
              <div class="carousel-item">
                <img class="d-block" :src="('/storage/' + post.image_2)" alt="Second slide" style="width:289px;height:289px">
              </div>
              <div class="carousel-item">
                 <img class="d-block" :src="('/storage/' + post.image_3)" alt="Second slide" style="width:289px;height:289px">
               </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background:black"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background:black"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        <div class="pt-4 pb-5">
          <div class="row carousel-indicators">
            <div class="col-4 col-sm-4 item">
              <img :src=" ('/storage/' + post.image) " class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
            </div>
            <div class="col-4 col-sm-4 item">
              <img :src=" ('/storage/' + post.image_2) " class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
            </div>
            <div class="col-4 col-sm-4 item">
              <img :src=" ('/storage/' + post.image_3) " class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
            </div>
          </div>
        </div>
      </div>
      <div class="condition">
        <div class="in_stock1" v-if="post.in_stock == '1'">
          <a> В наличии!</a>
        </div>
        <div class="in_stock0" v-else-if="post.in_stock == '0'">
          <a> Нет в наличии!</a>
        </div>
        <div class="card_product">
          <a  class="cards-link title-bottom" style="color:black">Цена:</a>
          <a  class="cards-link" style="color:#DA251C;font-weight: bold;font-size:19px;"> {{post.price}} UZS</a>
        </div>
      </div>
      </div>
        <div class="col-sm-4">
          <div class="info">
              <p class="cards-title" style="font-size:19px">{{post.title}}</p>
              <p class="cards-subtitle mb-2 text-muted" style="font-size:18px">Категория: {{post.category_id}}</p>
              <p class="cards-text" style="font-size:15px">{{post.description}}</p>
          </div>
        </div>

      </div>


</div>

  </div>
</template>


<script>
import axios from 'axios';

export default{
  data: () => ({
    post:  [],
    not_found : false
  }),
  mounted(){
    this.loadPost(this.$route.params.id);
  },
  methods: {
    loadPost(id){
      axios.get('/api/posts/' + id)
      .then(res => {
        this.post = res.data;
      })
      .catch(err => {
        this.not_found = true;
      })
    }
  }
}
</script>


<style scoped >
.carousel-inner{
  width: 100%;
  height: 289px;

}
.content{
  float: left;
  margin-top: 50px;
}
.container{
  /* padding-top: 5%; */
}
.slide{
  width: 289px;
  height: 289px;
}
.carousel-indicators {
    position: static;
}
  .item {
    width: 100%;
    height: 289px;
}
    &.active {
      background: transparent;
}
.carousel-indicators{
  width: 288px;
  height: 50px;
  margin: auto;
}
.productname{
  width: 324px;
height: 49px;
background: #DA251C;
border-radius: 13px;
margin-right: 5px;
position: relative;
border-radius: 13px;
margin-top: 25px;
text-align: center;
font-family: Stolz ;
font-style: normal;
font-weight: normal;
font-size: 25px;
line-height: 22px;
padding-top: 13px;

}
.productname a{
  color: white;
}
.productname a:hover{
  color: white;
  text-decoration: none;
}
.in_stock1{
  width: 118px;
  height: 28px;
  background: rgba(41, 194, 158, 0.4);
  border-radius: 4px;
  text-align: center;
}
.in_stock1 a{
  color:#29C29E;
  font-family: Stolz ;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 15px;
}
.condition{
  margin-top: 75px;
}
.info{
  height: 200px;
  font-family: Stolz;
font-style: normal;
font-weight: normal;
font-size: 22px;
line-height: 26px;
}

.in_stock0{
  width: 118px;
  height: 28px;
  background: #f0a19c;
  border-radius: 4px;
  text-align: center;
}
.in_stock0 a{
  color:#ff5247;
  font-family: Stolz;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 15px;
}
</style>
