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
        <title>Dashboard</title>
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
                    <a href="{{ url('dashboard') }}"> Home </a>
                </div>
                <div class="col-md-10 text-center">
                    <h2>Welcome to dashboard</h2>
                </div>
                <div class="col-md-1 mt-2">
                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <form action="{{ url('retrieve-user') }}" method="get">
                        @csrf
                        <button class="btn btn-primary">
                            Retrieve the currently authenticated user
                        </button>
                    </form>
                </div>
                <div class="col-md-3 mt-2">
                    <form action="{{ url('retrieve-user-id') }}" method="get">
                        @csrf
                        <button class="btn btn-primary">
                            Retrieve the currently authenticated user id
                        </button>
                    </form>
                </div>
                <div class="col-md-3 mt-2">
                    <form
                        action="{{ url('get-user-via-request') }}"
                        method="get"
                    >
                        @csrf
                        <button class="btn btn-primary">
                            Get currently authenticated user via request
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if(isset($currentUser))
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <p>User Id : {{ $currentUser->id }}</p>
                    <p>User Name : {{ $currentUser->name }}</p>
                    <p>Username : {{ $currentUser->username }}</p>
                    <p>Email : {{ $currentUser->email }}</p>
                    <p>Phone : {{ $currentUser->phone }}</p>
                </div>
            </div>
        </div>
        @endif @if(isset($userId))
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <p>User Id : {{ $userId }}</p>
                </div>
            </div>
        </div>
        @endif @if(isset($requestUser))
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <p>User Id : {{ $requestUser->id }}</p>
                    <p>User Name : {{ $requestUser->name }}</p>
                    <p>Username : {{ $requestUser->username }}</p>
                    <p>Email : {{ $requestUser->email }}</p>
                    <p>Phone : {{ $requestUser->phone }}</p>
                </div>
            </div>
        </div>
        @endif
    </body>
</html>
