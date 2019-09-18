<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="#">GamePlayParty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest
            @else
                @if (Auth::user()->roles()->where('name', 'Beheerder')->first())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Website beheer
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cms.index') }}">Content Management Systeem</a>
                        </div>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>