<nav>
    <ul>                    
        <li>
            {{ HTML::Link('/', 'Начало') }}
        </li>
        @foreach($categories as $category)
            <li>
                {{ HTML::Link("/category/$category->id", "$category->name") }}
            </li>
        @endforeach
        @if(Auth::check())
        <li>
            {{ HTML::Link('/news/create', 'Създай Новина') }}
        </li>
        @endif
    </ul>
</nav>
<div>
    <ul>
        @if(!Auth::check())
        <li>
            {{ HTML::Link('/account/create', 'Регистрация') }}
        </li>
        <li>
            {{ HTML::Link('/account/login', 'Вход') }}
        </li> 
        @else
        <li>
            {{ HTML::Link('/account/logout', 'Изход') }}
        </li>
        @endif
    </ul>
</div>