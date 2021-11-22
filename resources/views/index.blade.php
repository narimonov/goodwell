<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Goodwell</title>
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
jQuery(document).ready(function($){
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
})
</script>
<style media="screen">
a{
  text-decoration: none;
  color: black
}
</style>
  </head>
  <body>
<div class="d-flex" id="wrapper">
<!-- Sidebar -->


<div class="sidebar" id="sidebar-wrapper">
<div class="sidebar-heading"><img src="{{asset('img/1.png')}}" alt="" class="logo"> </div>
<div class="list-group list-group-flush">
  <a href="{{route('index')}}">Продукты</a>
  <i class="fas fa-th-list"></i>
</div>
<div class="list-group list-group-flush">
  @if (Route::has('login'))
               @auth
               <form method="POST" action="{{ route('logout') }}">
                   @csrf

                   <a href="route('logout')" class="s-sidebar__nav-link"
                           onclick="event.preventDefault();
                                       this.closest('form').submit();">
                       {{ __('Выйти') }}
                     </a>
               </form>
               @else

                   <a href="{{ route('login') }}" class="s-sidebar__nav-link">Авторизация</a>
               @endif
       @endif
</div>
</div>

<!-- /#sidebar-wrapper -->
<!-- Page Content -->
<div id="page-content-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light">
      <button class="navbar-toggler" id="menu-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
      </button>
      <div class="navbar-toggler" style="margin:auto">
        <img src="{{asset('img/logored.png')}}" alt="">
      </div>
  </nav>
  <div class="main">
    <div class="container">
      <div class="slider">
        <div class="slides">
          @foreach($categories as $cat)
          <div>
            <a href="{{route('posts.category',['id'=>$cat->id])}}" >{{$cat->name}}</a>
          </div>
          @endforeach
        </div>
      </div>
        <div class="cards-block">
          @foreach($posts as $post)

          <div class="cards-block2">
            <a href="{{route('posts.about',['id'=>$post->id])}}">
                <div class="cards-img-top">
                  <img src="{{ Voyager::image( $post->image ) }}" alt="" class="product" >
                </div>
            </a>
            <div class="cards-body visible" style="width: 18rem;">
                <p class="cards-title" style="font-size:19px">{{$post->title}}</p>
                <p class="cards-subtitle mb-2 text-muted" style="font-size:18px">Категория: {{$post->category_id}}</p>
                <p class="cards-text" style="font-size:15px">{{$post->excerpt}}</p>
                <div class="price">
                  @if (Route::has('login'))
                          @auth
                                                <a  class="cards-link title-bottom" style="color:black">Цена:</a>
                          <a  class="cards-link" style="color:#DA251C;font-weight: bold;font-size:19px;"> {{$post->price}} UZS</a>
                          @else
                          @endif
                  @endif

                </div>
              </div>
          </div>
          <hr class="cards-line">
          @endforeach
        </div>
      </div>
    </div>
<!-- Content -->
</div>
</div>

<script src="/js/app.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
