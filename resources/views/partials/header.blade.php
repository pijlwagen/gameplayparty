<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand" href="/"><img src="{{ asset('icon.svg') }}" width="50" alt=""> GamePlayParty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/bioscopen" class="nav-link mr-3"><i class="fas fa-film"></i> Bioscopen</a>
            </li>
            <li class="nav-item">
                <a href="/over-ons" class="nav-link mr-3"><i class="far fa-address-card"></i> Over ons</a>
            </li>
            @guest
            @else
                @if (Auth::user()->isAdmin() || Auth::user()->isEditor())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-shield"></i> Website beheer
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('cms.index') }}">Content Management Systeem</a>
                            @endif
                                <a class="dropdown-item" href="{{ route('bios.index') }}">Bioscopen</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>