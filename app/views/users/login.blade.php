@extends('layouts.default')

@section('head')
    @parent
    <title>Вход</title>
@stop


@section('content')
<section class="form">
    <header>
        <h1>
            Вход за потребители
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
            {{ Form::open(['url' => '/account/login']) }} 
                <div>
                    {{ Form::label('username', 'Потребителско име: ') }}
                    {{ Form::text('username', Input::old('username')) }} *
                </div>
                <div>
                    {{ Form::label('password', 'Парола: ') }}
                    {{ Form::password('password') }} *
                </div>
                <div>
                    {{ Form::label('remember', 'Запомни ме:') }} 
                    {{ Form::checkbox('remember') }}                                                   
                </div>
                <div>
                    {{ Form::submit('Влез')}}
                </div>
            {{ Form::close()}} 
        </div>
    </article>
</section>
@stop