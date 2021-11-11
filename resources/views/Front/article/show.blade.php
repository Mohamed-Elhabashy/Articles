@extends('Front.inc.Layout')
@section('content')
<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="{{asset('Uploads/'.$article->img)}}" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="#">{{$article->category->name}}</a></div>
                </div>
                <h1>{{$article->title}}</h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i>{{$article->date}}</div>
                  </div>
                </div>
                <div class="post-body">
                  <p class="lead">{{$article->content}}</p>

                  
                </div>
                
                  
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
@endsection