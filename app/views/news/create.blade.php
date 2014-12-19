@extends('layouts.default')

@section('head')
    @parent
    <title>Създаване на Новина</title>
@stop

@section('content')
<section>
    <header>
        <h1>
            Създаване на Новина
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
            {{ Form::open(['url' => '/news']) }} 
                <div>
                    {{ Form::label('title', 'Заглавие: ') }}
                    <br/>
                    {{ Form::text('title', Input::old('title')) }} *
                </div>
                <div>
                    {{ Form::label('body', 'Съдържание: ') }}
                    <br/>
                    {{ Form::textarea('body', Input::old('body')) }} *
                </div>
                <div>
                    Категории:
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            {{ Form::label("$category->id", $category->name) }}
                            {{ Form::checkbox('category[]', $category->id, null,array('id'=>"$category->id")) }} 
                        </li>
                        @endforeach
                    </ul>
                </div>                      
                <div>
                    {{ Form::submit('Създай')}}
                </div>
            {{ Form::close()}}            
        </div>
    </article>
</section>
@stop