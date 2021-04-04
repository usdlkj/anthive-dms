<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('companies.index') }}" class="nav-link">
                    <p>Companies</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('projects.index') }}" class="nav-link">
                    <p>Projects</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('files.index') }}" class="nav-link">
                    <p>Files</p>
                </a>
            </li>
            @if (isset($projectId))
            <li class="nav-item">
                <a href="{{ route('projects.documents.index', [$projectId]) }}" class="nav-link">
                    <p>Documents</p>
                </a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link" href="#" role="button" id="mail-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mails
                    </a>
                    <div class="dropdown-menu" aria-labelledby="mails">
                        <a class="dropdown-item" href="{{ route('projects.mails.inbox', [$projectId]) }}">Inbox</a>
                        <a class="dropdown-item" href="#">Sent Mail</a>
                        <a class="dropdown-item" href="#">Draft</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">New Mail</a>
                    </div>
                </div>
            </li>
            @endif
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>