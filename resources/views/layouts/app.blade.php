<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <!-- Bootstrap CSS (atau CSS lain yang kamu butuhkan) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar atau Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Laravel CRUD</a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container">
        @yield('content') <!-- Tempat konten halaman individual akan muncul -->
    </div>

    <!-- Bootstrap JS (atau JS lain yang kamu butuhkan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
