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
    <form method="POST" action="{{url('file-update/'.$file->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            @if (\Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! \Session::get('message') !!}
            </div>
            @endif
            <br>
            <a href="{{url('user-details')}}" type="" class="">Back</a>
            <h1>Edit User</h1>
            <hr>
            <div class="row">
            <div class="col-md-4">
            <label for="psw-repeat"><b>Full Name *</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" value="{{$file->name}}"><br>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            </div>
            <div class="col-md-4">
            <label for="email"><b>Email *</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" value="{{$file->email}}"><br>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            </div>

            <div class="col-md-4">
            <label for="psw-repeat"><b>Mobile *</b></label>
            <input type="text" placeholder="Enter Mobile" name="mobile" id="mobile" value="{{$file->mobile}}"><br>
            @if ($errors->has('mobile'))
            <span class="text-danger">{{ $errors->first('mobile') }}</span>
            @endif
            </div>

            </div>
            <div class="row">
            <!-- <div class="col-md-4">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            </div> -->
            <div class="col-md-4">
            <label for="psw-repeat"><b>File *</b></label>
            <input type="file" accept="image/*" class="form-control" name="file" id="fileInput"><br>

            <!-- <img id="previewImage" src="#" alt="Selected Image" style="display: none; max-width: 200px; max-height: 200px;">
                    <span id="removeImage">X</span> -->
            @if ($errors->has('file'))
            <span class="text-danger">{{ $errors->first('file') }}</span>
            @endif
            </div>
            <div class="col-md-4">
            <label for="psw-repeat"><b>   </b></label>
                <button type="submit" class="registerbtn">Save</button>
        </div>
        </div>
    </form><br>
            @if(isset($file->files))
            <img class="previewImage" src="{{ asset('uploads/file/' . $file->files) }}" alt="Selected Image" style="max-width: 200px; max-height: 200px;">
            <span id="removeImage">X</span>
            @else
            <img class="previewImage" src="#" alt="Selected Image" style="display: none; max-width: 200px; max-height: 200px;">
            <span id="removeImage">X</span>
            @endif
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
        $(document).ready(function() {
                $('#show').hide();
            // When a file is selected
            $('#fileInput').change(function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    $('#removeImage').show();
                        $('.previewImage').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });

         $('#removeImage').click(function() {
                $('#fileInput').val('');
                $('.previewImage').hide();
                $('#removeImage').hide();
                $('#removeSaveFile').hide();
            });
    </script>

</body>

</html>