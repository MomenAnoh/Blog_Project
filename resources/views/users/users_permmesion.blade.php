<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Permissions</title>
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: white; /* White text */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table th,
        table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #444;
        }

        table th {
            background-color: #333;
        }

        table td {
            background-color: #222;
        }

        table tr:nth-child(even) {
            background-color: #333;
        }

        table tr:hover {
            background-color: #444;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff4c4c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ff1c1c;
        }

        .form-container {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: white;
            border: 1px solid #444;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        .form-container .save-btn {
            background-color: #4CAF50; /* Green color */
        }

        .form-container .save-btn:hover {
            background-color: #45a049;
        }
    </style>
@section('css')
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!-- Internal Quill CSS -->
<link href="{{URL::asset('assets/plugins/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/quill/quill.bubble.css')}}" rel="stylesheet">
@endsection

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/notif@1.0.0/notif.min.js"></script>
<script>
@if (session()->has('update'))
<script>
    window.onload = function() {
        notif({
            msg: "{{ session('update') }}",
            type: "success"
        });
    }
</script>
@endif
</script>

    <div class="container">
            <h1>Edit User Permissions</h1>
            <div class="form-container">
                <h2>Edit Role</h2>
                <form action="{{ route('users.update', $users->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{$users->id}}">
                    <label for="user"> User Name:</label>
                    <input type="text" value="{{$users->name}}" readonly>

                    <label for="role" >Permission Level:</label>
                    <select id="role" name="role"  required > 
                        <option value="{{$users->role}}" selected>{{$users->role}}</option>
                        <hr>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                        
                    </select>

                    <button type="submit" class="save-btn btn">Update Role</button>
                </form>
            </div>
    </div>
</body>

</html>
@section('js')
    
    <!-- Notify JS -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

  @endsection