<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVIEMAX | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    {{-- ANIMATE ON SCROLL --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- SWEETALERT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- TYPEIT.JS --}}
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Oswald&display=swap" rel="stylesheet">
    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- AJAX --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            background-image: url('/img/main.jpg');
            background-size: cover;
        }
        .pagination .pagination-info {
            color: #ffffff;
        }
        .pagination .page-link {
            padding: .8em;
            background: #333;
            color: #ffffff;
            border: 0;
        }
        .pagination .page-item.active .page-link {
            background-color: #b00000;
            border-color: #a00000;
            color: #fff;
        }
    </style>
    @yield('embed')
</head>

<body>
        @yield('navbar')
        <div class="container-page w-100 pt-4 p-0">
            @yield('container')
        </div>
</body>
<script>
    AOS.init();

    // function search() {
    // // Declare variables
    // var input, filter, table, tr, td, i, txtValue;
    // input = document.getElementById("searchInput");
    // filter = input.value.toUpperCase();
    // table = document.getElementById("table");
    // tr = table.getElementsByTagName("tr");

    // for (i = 0; i < tr.length; i++) {
    //     td = tr[i].getElementsByTagName("td")[0];
    //     if (td) {
    //         txtValue = td.textContent || td.innerText;
    //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //             tr[i].style.display = "";
    //             } else {
    //                 tr[i].style.display = "none";
    //             }
    //         }
    //     }
    // }
    
    
    setTimeout(function() {
        new TypeIt("#subtitle", {
            strings: "Platform Streaming & Download Film Terbaik.",
            speed: 30,
            waitUntilVisible: true,
        }).go();
    }, 2000);
</script>
</html>