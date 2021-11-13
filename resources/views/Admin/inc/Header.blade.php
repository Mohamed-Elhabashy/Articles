<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('Front')}}/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{asset('Front')}}/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="{{asset('Front')}}/css/fontastic.css">
        <!-- Google fonts - Open Sans-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <!-- Fancybox-->
        <link rel="stylesheet" href="{{asset('Front')}}/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('Front')}}/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('Front')}}/css/custom.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('HomeDashboard.index')}}">dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Articles</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach($categories as $c)
                    <a class="dropdown-item" href="{{Route('DArticle.ListArticle',$c->id)}}">{{$c->name}}</a>
                  @endforeach
              </div>
      </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{Route('DCategory.index')}}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{Route('DMessage.index')}}">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{Route('DArticle.create')}}">Add Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{Route('DMail.index')}}">Send Mail to Subscribes</a>
        </li>
      </ul>
      <ul class="navbar-nav  mb-2 mb-lg-0 ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>