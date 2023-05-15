<nav class="navbar navbar-expand-lg w-100 position-fixed bg-danger" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="container bg-danger d-flex align-items-center">
            <h1 class="navbar-brand text-white">Dashboard</h1>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{($title === 'Membership') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="/membership">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === 'All Movies') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="/membership/all-movies">Movie</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{($title === 'Settings') ? 'active border-bottom border-white' : ''}}" aria-current="page" href="#">Settings</a>
            </li> --}}
            <div class="container bg-danger d-flex align-items-center justify-content-start">
                <script>
                    function confirmLogout(event) {
                        event.preventDefault();
                        Swal.fire({
                            title: 'Logout!',
                            text: "Anda yakin ingin keluar?",
                            icon: 'warning',
                            background: '#333',
                            color: 'white',
                            backdrop: 'rgba(0, 0, 0, .8)',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Tidak',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('logout').submit();
                            }
                        })
                    }
                </script>
                <li class="nav-item w-100">
                    <form action="{{route('member-logout')}}" id="logout" method="post" onsubmit="confirmLogout(event)">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark">LOGOUT</button>
                    </form>
                </li>
            </div>
        </ul>
        </div>
    </div>
</nav>