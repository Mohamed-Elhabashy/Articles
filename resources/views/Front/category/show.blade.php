@extends('Front.inc.Layout')
@section('content')
<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-12"> 
          <div class="container">
            <div class="row">
            @foreach($articles as $a)
              <!-- post -->
              <div class="post col-xl-4">
                <div class="post-thumbnail"><a href="{{Route('article.show',$a->id)}}"><img src="{{asset('Uploads/'. $a->img)}}" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{$a->date}}</div>
                    <div class="category"><a href="{{Route('category.show',$a->category->id)}}">{{$a->category->name}}</a></div>
                    </div><a href="{{Route('article.show',$a->id)}}">
                        <h3 class="h4">{{$a->title}}</h3></a>
                    </div>
              </div>
            @endforeach
            </div>
            
             
            {{$articles->links('Front.paginate')}}
          </div>
        </main>
       
      </div>
    </div>
    @endsection