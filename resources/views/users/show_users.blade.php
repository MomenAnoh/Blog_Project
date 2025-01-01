<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
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
        <h1>View Users</h1>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php  $i=0 ?>
                @php
                $user = \App\models\User::all();
                 @endphp
                @foreach($users as $user)
                <?php  $i++ ?>
                <tr>
                    @can('view',$user)
                        <td>{{$i}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td><a href="{{route('users.show',$user->id)}}" class="btn">Edit Role</a></td>
                    @endcan
                </tr>
               @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
@section('js')
    
    <!-- Notify JS -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

  @endsection
