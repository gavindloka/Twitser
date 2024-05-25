<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/leftSideBar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tweet.css') }}">
    <style>
        body {
            display: flex;
        }

        .tweet__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style ="background-color:#001F3F">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Twitser</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <form class="d-flex" role="search" action="{{route('home')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search the tweet" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="font-weight: bold">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Notifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Lists</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Communities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={}>Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('login_page')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="tweet">
    <div class="tweet__main">
        <img class="tweet__author-logo" src="{{Storage::url(Auth::user()->url)}}" />
        <div class="tweet__header">
            <div class="tweet__author-name">
                {{ $post->user->username }}
            </div>
            <div class="tweet__author-slug">
                <span>@</span>{{ $post->user->username }}
            </div>
            <div class="tweet__publish-time">
                20h
        </div>
            <form method="POST" action="{{route('post_destroy',$post->post_id)}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" style="margin-left:500px">X</button>
            </form>
        </div>
        <div class="tweet__content">
            <p class="fs-6 fw-light text-muted">
                {{$post->content}}
            </p>
            <p class="fs-6 fw-light text-muted">
                Likes: {{$post->likes}}
            </p>
        </div>
    </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>
