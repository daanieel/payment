<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">Octo</a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Payment <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Empresas</li>
                            <li><a href="{{ route('companies.create') }}" >Criar uma empresa</a></li>
                            <li><a href="{{ route('companies.index') }}" >Consultar empresas</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
</nav>
