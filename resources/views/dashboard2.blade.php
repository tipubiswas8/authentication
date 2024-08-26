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
                    <a href="{{ url('dashboard2') }}"> Home </a>
                </div>
                <div class="col-md-10 text-center">
                    <h2>Welcome to dashboard</h2>
                </div>
                <div class="col-md-1 mt-2">
                    <form action="{{ url('logout2') }}" method="post">
                        @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <button class="btn btn-primary">
                        Currently authenticated student
                    </button>
                </div>
                <div class="col-md-3 mt-2">
                    <button class="btn btn-primary">
                        Currently authenticated student id
                    </button>
                </div>
               
                <div class="col-md-3 mt-2">
                    <form
                        action="{{ url('get-student-via-request') }}"
                        method="get"
                    >
                        @csrf
                        <button class="btn btn-primary">
                            Get currently authenticated student via request
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @php 
        $currentUser = Auth::guard('student')->user(); 
        $studentId = Auth::guard('student')->id(); 
        @endphp 
        
        @if(isset($currentUser))
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <p>Student Id : {{ $currentUser->id }}</p>
                    <p>Student Name : {{ $currentUser->name }}</p>
                    <p>Student Phone: {{ $currentUser->phone }}</p>
                    <p>Student Email : {{ $currentUser->email }}</p>
                </div>
                @endif @if(isset($studentId))
                <div class="col-md-3">
                    <p>Student Id : {{ $studentId }}</p>
                </div>
                @endif @if(isset($requestStudent))

                <div class="col-md-3">
                    <p>Student Id : {{ $requestStudent->id }}</p>
                    <p>Student Name : {{ $requestStudent->name }}</p>
                    <p>Student Phone: {{ $requestStudent->phone }}</p>
                    <p>Student Email : {{ $requestStudent->email }}</p>
                </div>
            </div>
        </div>
        @endif
    </body>
</html>
