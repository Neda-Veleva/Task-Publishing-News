@extends('layouts.default')

@section('head')
    @parent
    <title>{{ $news->title }}</title>
@stop

@section('content')
<section>
    <header>
        <h1>
            {{ $news->title }}
        </h1>
    </header>
    <article>       
        <p>Създадено от {{ $news->user->username }}</p>
        @if(Auth::check() && Auth::user()->id === $news->user_id)
        <div>
            {{ Form::open(array('method' => 'GET', 'url' => "news/$news->id/edit")) }} 
                {{ Form::submit('Edit') }}
            {{ Form::close() }}
            {{ Form::open(array('method' => 'DELETE', 'url' => "news/$news->id")) }} 
                {{ Form::submit('Delete') }}
            {{ Form::close() }}
        </div>
        @endif
        <p>
            {{ $news->body }}
        </p>
        <div>
            Категории:
            @foreach($news->categories as $category)
            <span>
                {{ HTML::Link("/category/$category->id", "$category->name") }}
            </span>
            @endforeach
        </div>        
    </article>
</section>
@stop