@extends('layouts.default')

@section('head')
    @parent
    <title>Регистрация</title>
@stop

@section('content')
<section class="form">
    <header>
        <h1>
            Регистрация на нов потребител
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
            {{ Form::open(['url' => '/account']) }} 
                <div>
                    {{ Form::label('username', 'Потребителско име: ') }}
                    {{ Form::text('username', Input::old('username')) }} *
                </div>
                <div>
                    {{ Form::label('email', 'Email: ') }}
                    {{ Form::email('email', Input::old('email')) }} *
                </div>
                <div>
                    {{ Form::label('password', 'Парола: ') }}
                    {{ Form::password('password') }} *
                </div>
                <div>
                    {{ Form::label('confirm_password', 'Потвърдете паролата: ') }}
                    {{ Form::password('confirm_password') }} *
                </div>
                <div>
                    {{ Form::submit('Регистрация')}}
                </div>
            {{ Form::close()}}            
        </div>
    </article>
</section>
@stop