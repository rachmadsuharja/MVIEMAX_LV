<nav class="navbar navbar-expand-lg w-100 position-fixed bg-danger" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="container bg-danger d-flex align-items-center">
            <h1 class="navbar-brand text-white">{{$title}}</h1>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{($title === 'Administrator') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="/administrator">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === 'Movies') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="/admin/all-movies">Movie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === 'Role Settings') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="/admin/roles">Role</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{(($title === 'Membership Settings') ? 'active' : ($title === 'Publisher Settings')) ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>
                <ul class="dropdown-menu bg-danger">
                    <li><a class="dropdown-item {{($title === 'Publisher Settings') ? 'active bg-danger border-bottom border-white' : ''}}" href="/admin/publishers">Publisher</a></li>
                    <li><a class="dropdown-item {{($title === 'Membership Settings') ? 'active bg-danger border-bottom border-white' : ''}}" href="/admin/memberships">Membership</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === 'Feedback Settings') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="/admin/feedback">Feedback</a>
            </li>
            <div class="container bg-danger d-flex align-items-center justify-content-start">
                <li class="nav-item w-100">
                    <a href="/admin-logout" class="btn btn-outline-dark" onclick="return confirm('Anda yakin?')">LOGOUT</a>
                </li>
            </div>
        </ul>
        </div>
    </div>
</nav>