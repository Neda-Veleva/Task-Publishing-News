@extends('layouts.default')

@section('head')
    @parent
    <title>{{ $category->name }}</title>
@stop

@section('content')
<section>
    <header>
        <h1>
            Категория {{ $category->name }}
        </h1>
    </header>
    <article>      
        @if(!$category->news->count())
        <p>
            Няма налични новини!
        </p>
        @else
        <ul>
            @foreach($category->news as $news)
                <li>
                    {{ HTML::Link("news/$news->id", "$news->title") }}
                </li>
            @endforeach
        </ul>
        @endif
    </article>
</section>
@stop