<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#">
        <img src="suabelogo.png" alt="Logo" style="width:40px;">
    </a>
    <span class="navbar-text">
        SUABE   
    </span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('libro.index') }}">
                    @if(\Auth::user()->es_estudiante)
                        Catalogo
                    @else
                        Inventario
                    @endif
                </a>
            </li>
        </ul>
    </div>
</nav>