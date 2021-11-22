<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Goodwell</title>
      <link rel="stylesheet" href="/css/style.css">
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
<style scoped >

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
      <nav class="navbar navbar-expand-lg navbar-light ">
          <button class="navbar-toggler" id="menu-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-toggler" style="margin:auto">
            <img src="{{asset('img/logored.png')}}" alt="">
          </div>

      </nav>

    <!-- Content -->
    <div class="container" v-if="!loading && !not_found">
      <div class="productname">
        <a >{{$post->title}}</a>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-sm-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" v-if="!loading && !not_found">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block " src="{{ Voyager::image( $post->image ) }}" alt="First slide" style="width:289px;height:289px">
                </div>
                <div class="carousel-item">
                  <img class="d-block" src="{{ Voyager::image( $post->image_2 ) }}" alt="Second slide" style="width:289px;height:289px">
                </div>
                <div class="carousel-item">
                   <img class="d-block" src="{{ Voyager::image( $post->image_3 ) }}" alt="Second slide" style="width:289px;height:289px">
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
                <img src="{{ Voyager::image( $post->image ) }}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
              </div>
              <div class="col-4 col-sm-4 item">
                <img src="{{ Voyager::image( $post->image_2 ) }}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
              </div>
              <div class="col-4 col-sm-4 item">
                <img src="{{ Voyager::image( $post->image_3 ) }}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
              </div>
            </div>
          </div>
        </div>
        <div class="condition">
          <?php if ($post->in_stock == '1'): ?>
            <div class="in_stock1">
              <a> В наличии!</a>
            </div>
            <?php else: ?>
              <div class="in_stock0" v-else-if="post.in_stock == '0'">
                <a> Нет в наличии!</a>
              </div>
          <?php endif; ?>
          <div class="card_product">
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
          <div class="col-sm-4">
            <div class="info">
                <p class="cards-title" style="font-size:19px">{{$post->title}}</p>
                <p class="cards-subtitle mb-2 text-muted" style="font-size:18px">Категория: {{$post->category_id}}</p>
                <p class="cards-text" style="font-size:15px">{{$post->description}}</p>
            </div>
          </div>

        </div>


    </div>

    </div>

    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
