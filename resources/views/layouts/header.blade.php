
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-lg fixed-top" aria-label="Global navigation - With two lines title example">
        <div class="container-xxl d-flex align-items-center">
        <!-- Orange brand logo -->
                <div class="navbar-brand me-auto me-lg-4">
                    <a class="stretched-link" href="#">
                        <img src="../../orange-logo.svg" width="50" height="50" alt="Boosted - Back to Home" loading="lazy">
                    </a>
                    <h1 class="two-lined">
                        App
                        <br>
                        Directory
                    </h1>
                </div>  
                <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
                <div class="ms-auto">
                    <div class="btn-group">
                        <button class="btn btn-primary btn-sm" type="button">
                            @auth
                                {{ Auth::user()->name }} <!-- Affiche le nom de l'utilisateur connecté -->
                            @else
                                Guest <!-- Affiche "Guest" si aucun utilisateur n'est connecté -->
                            @endauth
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('logout') }}"><button class="dropdown-item" type="button">Se décconnecter</button></a></li>
                        </ul>
                    </div>
            </nav>
        </div>
    </header>
