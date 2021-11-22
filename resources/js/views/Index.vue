<template>
  <div class="main">
    <div class="container">
      <div class="slider">
        <div class="slides">
          <div v-for="menu_item in menu_items"  :key="menu_item" >
            <a :href=" menu_item.id">{{menu_item.name}}</a>
          </div>
        </div>
      </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
          <div class="col"  v-for="post in posts"  :key="post" >
            <a :href="'blog/' + post.id">
              <div class="cardes">
                <div class="cards-img-top">
                  <img :src=" ('/storage/' + post.image) " alt="" class="product" style="width:288px;height:220px">
                </div>
                <div class="cards visible" style="width: 18rem;">
                  <div class="cards-body">
                    <p class="cards-title" style="font-size:19px">{{post.title}}</p>
                    <p class="cards-subtitle mb-2 text-muted" style="font-size:18px">Категория: {{post.category_id}}</p>
                    <p class="cards-text" style="font-size:15px">{{post.excerpt}}</p>
                    <div class="price">
                      <a  class="cards-link title-bottom" style="color:black">Цена:</a>
                      <a  class="cards-link" style="color:#DA251C;font-weight: bold;font-size:19px;"> {{post.price}} UZS</a>
                    </div>
                  </div>
                </div>
              </div>
          </a>
          </div>
        </div>
      </div>
    </div>
</template>


<script>
import axios from 'axios';
  export default{
    data:() => ({
      menu_items : [],
      posts : [],
      image_src: '/img/product.jpeg'
    }),
    mounted() {
      this.loadPosts(),
      this.loadMenu_items(),
      this.Login()
    },
    methods:{
      loadPosts(){
        axios.get('/api/posts')
        .then(res =>{
          this.posts = res.data;
        })
      },
      loadMenu_items(){
        axios.get('/api/categories')
        .then(res =>{
          this.menu_items = res.data;
        })
      },
      loadLogin(){
        axios.get('/login')
        .then(res =>{
          this.menu_items = res.data;
        })
      },
    }
  }
</script>

<style scoped >
a{
  text-decoration: none;
  color: black
}
</style>
