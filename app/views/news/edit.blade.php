@extends('layouts.default')

@section('head')
    @parent
    <title>Редактиране на Новина</title>
@stop

@section('content')
<section class="form">
    <header>
        <h1>
            Редактиране на Новина
        </h1>
    </header>
    <article>   
        <div>
            @if($errors->has())    
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div>
            {{ Form::open(array('method' => 'PUT','url' => "/news/$news->id")) }} 
                <div>
                    {{ Form::label('title', 'Заглавие: ') }}
                    <br/>
                    {{ Form::text('title', Input::old('title')? Input::old('title') : $news->title) }} *
                </div>
                <div>
                    {{ Form::label('body', 'Съдържание: ') }}
                    <br/>
                    {{ Form::textarea('body', Input::old('body')? Input::old('body') : $news->body) }} *
                </div>
                <div>
                    Категории:
                    <br/>
                    @foreach($categories as $category)
                        {{ Form::label('category', $category->name) }}
                        {{ Form::checkbox('category[]', $category->id, $category->news->contains($news->id)) }}
                        <br/>
                    @endforeach
                </div>      
            <br/>
                <div>
                    {{ Form::submit('Редактирай')}}
                </div>
            {{ Form::close()}}            
        </div>
    </article>
</section>
@stop