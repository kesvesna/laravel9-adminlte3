<footer>
    <nav class="navbar fixed-bottom justify-content-around">
        <a href="{{ route('front.index') }}" class="btn">
            <img src="{{ asset('icons/home.svg') }}" alt="Profile icon" width="30" height="30">
        </a>
        <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button onClick="history.back()" class="btn">
            <img src="{{ asset('icons/back.svg') }}" alt="Profile icon" width="30" height="30">
        </button>
    </nav>
</footer>
