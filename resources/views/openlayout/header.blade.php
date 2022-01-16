@section('header')

<a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>

<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-3 pt-1">

      </div>
      <div class="col-6 text-center">
        <a class="blog-header-logo text-dark undecorate" href="#">学会サンプル</a>
      </div>
      <div class="col-3 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('signin',['type'=>$type,'uniqcode'=>$uniqcode])}}">Sign up</a>
      </div>
    </div>
  </header>


  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark open1Image">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
</div>
@endsection
