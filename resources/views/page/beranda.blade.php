@guest
<li class="nav-item">
    <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a>
</li>
@else
<div>
    <a>{{ explode(' ', Auth::user()->name)[0] }}</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
        Keluar
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

@endguest