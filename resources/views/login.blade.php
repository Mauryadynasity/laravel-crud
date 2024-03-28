<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            /* background-color: black; */
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{url('emp-login')}}">
        @csrf
        <div class="container">
            @if (\Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! \Session::get('message') !!}
            </div>
            @endif
            <br>
            <h1>User login</h1>
            <p>Please login .</p>
            <hr>
            <div class="row">
            <div class="col-md-6">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email"><br>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            </div>
            <div class="col-md-6">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            </div>
            <div class="row">
           
            <div class="col-md-6">
            <label for="psw-repeat"><b>   </b></label>
                <button type="submit" class="registerbtn">Login</button>
        </div>
        </div>
    </form>
    
 
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>

</html>