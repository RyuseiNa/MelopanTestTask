<ul class="navbar-nav ms-auto">
    @if(Auth::guard('admin')->check())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::guard('admin')->user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @if(Auth::guard('admin')->user()->permissions->containsStrict('name','create'))
            <a class="dropdown-item" href="{{ route('register.item') }}">
                {{ __('Create Item') }}
            </a>
            @endif
            @if(Auth::guard('admin')->user()->permissions->containsStrict('name','read'))
            <a class="dropdown-item" href="{{ route('item.list') }}">
                {{ __('Read Items') }}
            </a>
            @endif
            {{-- @if(Auth::guard('admin')->user()->permissions->containsStrict('name','update'))
            <a class="dropdown-item" href="{{ route('') }}">
                {{ __('Update Item') }}
            </a>
            @endif
            @if(Auth::guard('admin')->user()->permissions->containsStrict('name','delete'))
            <a class="dropdown-item" href="{{ route('') }}">
                {{ __('Delete Item') }}
            </a>
            @endif --}}
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>

    @elseif(Auth::guard('superadmin')->check())
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::guard('superadmin')->user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.list') }}">
                    {{ __('Read Admins') }}
                </a>
                {{-- @if(Auth::guard('admin')->user()->permissions->containsStrict('name','update'))
                <a class="dropdown-item" href="{{ route('') }}">
                    {{ __('Update Item') }}
                </a>
                @endif
                @if(Auth::guard('admin')->user()->permissions->containsStrict('name','delete'))
                <a class="dropdown-item" href="{{ route('') }}">
                    {{ __('Delete Item') }}
                </a>
                @endif --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    @elseif(Auth::guard('merchant')->check())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::guard('merchant')->user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('merchant.login') }}">{{ __('Login') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('merchant.register') }}">{{ __('Register') }}</a>
    </li>
    @endif
</ul>

