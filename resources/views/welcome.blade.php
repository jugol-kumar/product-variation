<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addnewProduct') }}">Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section>
            <div class="row mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eum nemo repellat. Ab adipisci aliquid animi, consequatur eius eos id itaque minima molestias neque omnis provident quae quos, sapiente vel.</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
