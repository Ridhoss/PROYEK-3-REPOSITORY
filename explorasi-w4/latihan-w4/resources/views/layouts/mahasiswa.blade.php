<!DOCTYPE html>
<html>

<head>
    <title>My Aplcation</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .containers {
            width: 100%;
            height: 100vh;
        }

        .header {
            height: 10vh;
        }

        .menu {
            height: 8vh;
            gap: 20px;
        }

        .content {
            height: 75vh;
            overflow: scroll;
            overflow-x: hidden;
        }

        .footer {
            height: 7vh;
        }
    </style>

</head>

<body>
    <div class="containers">
        <div class="header w-100 text-center bg-primary text-white d-flex align-items-center justify-content-center">
            <h2>My Website</h2>
        </div>

        <div class="menu w-100 d-flex align-items-center justify-content-center">
            <a href="/mahasiswa/home" class="btn btn-outline-dark">Home</a>
            <a href="/mahasiswa/course" class="btn btn-outline-dark">Courses</a>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalLogout">Sign Out</button>
        </div>

        <div class="content px-5 py-2 position-relative">
            @yield('content')
        </div>

        <div class="footer d-flex align-items-center justify-content-center text-white bg-secondary">
            <p class="m-0">&copy; <?= date('Y') ?> My Website</p>
        </div>
    </div>

    <!-- modal logout -->
    <div class="modal fade" id="modalLogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sign Out?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>
