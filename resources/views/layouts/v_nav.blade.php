<!-- Navbar -->
<nav class="navbar user-info-navbar" role="navigation">
    <!-- User Info, Notifications and Menu Bar -->

    <!-- Left links for user info navbar -->
    <ul class="user-info-menu left-links list-inline list-unstyled">

        <li class="hidden-sm hidden-xs">
            <a href="#" data-toggle="sidebar">
                <i class="fa-bars"></i>
            </a>
        </li>

        <!-- Added in v1.2 -->
        <li class="dropdown hover-line language-switcher">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('template')}}/assets/images/flags/flag-uk.png" alt="flag-uk" />
                English
            </a>

            <ul class="dropdown-menu languages">
                <li>
                    <a href="#">
                        <img src="{{ asset('template')}}/assets/images/flags/flag-al.png" alt="flag-al" />
                        Shqip
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <img src="{{ asset('template')}}/assets/images/flags/flag-uk.png" alt="flag-uk" />
                        English
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('template')}}/assets/images/flags/flag-de.png" alt="flag-de" />
                        Deutsch
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('template')}}/assets/images/flags/flag-fr.png" alt="flag-fr" />
                        Fran&ccedil;ais
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('template')}}/assets/images/flags/flag-br.png" alt="flag-br" />
                        Portugu&ecirc;s
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('template')}}/assets/images/flags/flag-es.png" alt="flag-es" />
                        Espa&ntilde;ol
                    </a>
                </li>
            </ul>
        </li>

    </ul>


    <!-- Right links for user info navbar -->
    <ul class="user-info-menu right-links list-inline list-unstyled">
        <li class="last">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit" class=" btn btn-sm btn-white d-blok text-center"><i class="fa-lock"></i> Logout</button>
            </form>
        </li>
    </ul>

</nav>
<!-- /.navbar -->