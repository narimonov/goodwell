
<template>
  <nav class="navbar navbar-expand-lg navbar-light ">
      <button class="navbar-toggler" id="menu-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-toggler" data-toggle="collapse" style="margin:auto">
        <img src="img/logored.png" alt="">
      </div>

  </nav>
</template>
<script>
  export default{
    data(){
      return{
        links:[
          {
            title:"Home",
            href: "/",
          },
          {
            title:"Blog",
            href: "/blog",
          },
      ]
      }
    }
  }
</script>
<style scoped>
.navbar-toggler,
.navbar-toggler:focus,
.navbar-toggler:active,
.navbar-toggler-icon:focus {
    outline: none;
    border: none;
    box-shadow: none;
}
</style>
