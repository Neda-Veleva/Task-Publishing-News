@extends('layouts.default')

@section('head')
    @parent
    <title>Новини</title>
@stop

@section('content')
<section>
    <header>
        <h1>
            Новини
        </h1>
    </header>
    <article>   
        @if($all_news->count())
            @foreach($all_news as $news)
                <h2>
                    {{ HTML::Link("news/$news->id", "$news->title") }}
                </h2>
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
            @endforeach
            @else
                <p>
                    В момента няма новини!
                </p>
            @endif
    </article>
</section>
@stop