@extends('Front.inc.Layout')
@section('content')
    <!-- Hero Section-->
    <section style="background: url({{asset('Front')}}/img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1>Bootstrap 4 Blog - A free template by Bootstrap Temple</h1>
          </div>
        
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest articles</h2>
          <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </header>
        <div class="row">
          @foreach($articles as $a)
            <div class="post col-md-4 mb-3">
              <div class="post-thumbnail"><a href="{{Route('article.show',$a->id)}}"><img src="{{asset('Uploads/'.$a->img)}}" alt="..." class="img-fluid"></a></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="date">{{$a->date}}</div>
                  <div class="category"><a href="#">{{$a->category->name}}</a></div>
                </div><a href="{{Route('article.show',$a->id)}}">
                  <h3 class="h4">{{$a->title}}</h3></a>
               </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top">    
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Subscribe to Newsletter</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-8">
          @include('Front.inc.errors')
            <div class="form-holder">
              <form action="{{Route('Home.subscribe')}}" method="post">
              @csrf
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address">
                  <button type="submit" class="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection