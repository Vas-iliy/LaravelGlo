<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="container navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active offset-3">
                <a class="nav-link" href="/">Создать пост <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{route('post.index')}}">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Найти пост" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>

<div class="container">

    @if(isset($_GET['search']))
        @if(count($posts) > 0)
            <h2>Результаты поиска по запросу <strong><?=$_GET['search']?></strong> </h2>
            @if(count($posts) == 1)
                <p class="lead">Всего найден {{count($posts)}} пост</p>
            @elseif(1 < count($posts) && count($posts) < 5)
                <p class="lead">Всего найдено {{count($posts)}} постa</p>
            @else
                <p class="lead">Всего найдено {{count($posts)}} постов</p>
            @endif
        @else
            <h2>По запросу <strong><?=$_GET['search']?></strong> ничего не найдено</h2>
            <a href="{{route('index')}}" class="btn btn-outline-primary">Отобразить все посты</a>
        @endif
    @endif

    <div class="row">
        @foreach($posts as $post)
            <div class="col-6">
                <div class="card-header">
                    <h2>{{$post->short_title}}</h2>
                </div>
                <div class="card-body">
                    <div class="card-img" style="background-image:
                        url({{ $post->img ?? asset('img/defoult.jpg') }})">
                    </div>
                    <div class="card-author">Автор: {{$post->name}}</div>
                    <a href="#" class="btn btn-outline-primary">Посмотреть пост</a>
                </div>
            </div>
        @endforeach
    </div>

    @if(!isset($_GET['search']))
    {{$posts->links()}}
    @endif
</div>
</body>
</html>
