<div class="main">
  <div class="container">
    <div class="slider">
      <div class="slides">
        @foreach($posts as $post)
          <a href="">{{$post->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>
