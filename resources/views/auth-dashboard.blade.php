<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
        <title>Auth Dashboard</title>
    </head>
    <style>
        body {
            background-color: bisque;
        }
    </style>
    <body>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1 btn btn-info mt-1">
                    <a href="{{ url('auth-dashboard') }}"> Auth Home </a>
                </div>
                <div class="col-md-10 text-center">
                    <h2>Welcome to auth dashboard </h2>
                </div>
                <div class="col-md-1 mt-2">
                    <form action="{{ url('auth-logout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
