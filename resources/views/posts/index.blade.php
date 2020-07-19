@extends('layouts.layout')

@section('content')
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
                    <a href="{{route('post.show', ['id' => $post->post_id])}}" class="btn btn-outline-primary">Посмотреть пост</a>
                </div>
            </div>
        @endforeach
    </div>

    @if(!isset($_GET['search']))
    {{$posts->links()}}
    @endif
@endsection

