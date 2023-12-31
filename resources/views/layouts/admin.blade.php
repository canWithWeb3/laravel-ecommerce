<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- fontawesome css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- toastr css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset("css/admin.css") }}">

    <title>Hello, world!</title>
  </head>
  <body>
    
    @include('includes.delete-modal')

    <div class="admin">
        {{-- sidebar --}}
        <div class="sidebar">
            <a href="{{ url("/") }}" class="sidebar-brand"><i class="fa-solid fa-book"></i> Bookly</a>
            <div class="sidebar-menu">
                <a href="{{ url("/") }}" class="sidebar-menu-link">Dashboard</a>
                <a href="{{ url("/admin/kategoriler") }}" class="sidebar-menu-link">Kategoriler</a>
                <a href="{{ url("/admin/urunler") }}" class="sidebar-menu-link">Ürünler</a>
                <a href="{{ url("/admin/publishers") }}" class="sidebar-menu-link">Publishers</a>
                <a href="{{ url("/admin/writers") }}" class="sidebar-menu-link">Yazarlar</a>
            </div>
        </div>
        <div class="content">
            {{-- header --}}
            <div class="header">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img width="35" class="me-1" src="https://www.seekpng.com/png/detail/377-3776081_facecircle-user-picture-in-circle-png.png" alt=""> {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a></li>
                            <li>
                                <a class="dropdown-item bg-danger text-white" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="main px-3 py-4">
                <div class="card">
                    <div class="card-body">
                        @yield("content")
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jquery js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- bootstrap js --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    {{-- includes --}}
    <script>
        @include('includes.toastr')
    </script>

    <script>
        $(document).ready(function(){
            // datatable
            $('.datatable').DataTable()

            // delete modal
            $('.delete-btn').on('click', function(){
                const action = $(this).data('action')
                $('#deleteModal form').attr('action', action)

                $('#deleteModal').modal('show')
            })

            $('.price').on('keyup', function(e){
                var key = event.keyCode;
            
                if (key < 48 || key > 57) {
                    event.preventDefault();
                }
            })
        })
    </script>
    
    @yield("scripts")

    

  </body>
</html>