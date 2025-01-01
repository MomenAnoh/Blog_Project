@extends('layouts.master')

@section('content')
    <!DOCTYPE html>
    <html lang="ar">
    <head>
        <!-- Internal Notify -->
        <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>إضافة وعرض الأقسام</title>
        <style>
            /* تحسين المظهر العام للنموذج */
            form {
                width: 100%;
                margin: 50px auto;
                padding: 30px;
                background-color: #f9f9f9;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                max-width: 1200px;
                font-family: 'Arial', sans-serif;
            }

            /* تخصيص الحقول */
            .form-label {
                font-weight: bold;
                color: #333;
                font-size: 1.2rem;
            }

            .form-control,
            .form-select,
            .form-textarea {
                border-radius: 8px;
                padding: 12px;
                background-color: #ffffff;
                border: 1px solid #ccc;
                color: #495057;
                font-size: 1rem;
                transition: border-color 0.3s ease;
            }

            .form-control:focus,
            .form-select:focus,
            .form-textarea:focus {
                border-color: #80b3ff;
                box-shadow: 0 0 8px rgba(0, 143, 255, 0.3);
                background-color: #f0faff;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
                padding: 12px 20px;
                border-radius: 25px;
                font-weight: bold;
                transition: background-color 0.3s ease, transform 0.3s ease;
                color: white;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                border-color: #004085;
                transform: scale(1.05);
            }

            /* إضافة الجدول */
            table {
                width: 100%;
                margin-top: 50px;
                border-collapse: collapse;
                border-radius: 12px;
                overflow: hidden;
                background-color: #ffffff;
            }

            table thead {
                background-color: #e6f7ff;
                color: #333;
            }

            table th, table td {
                padding: 15px;
                text-align: center;
                border: 1px solid #ddd;
                font-size: 1rem;
                font-weight: 500;
                color: #555;
            }

            table th {
                font-weight: bold;
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            table tr:nth-child(odd) {
                background-color: #ffffff;
            }

            table tr:hover {
                background-color: #cce7ff;
                cursor: pointer;
            }

            .icon-btn {
                background: none;
                border: none;
                font-size: 1.2rem;
                color: #007bff;
                cursor: pointer;
                padding: 5px 10px;
                transition: color 0.3s ease;
            }

            .icon-btn:hover {
                color: #0056b3;
            }

            h2 {
                color: #333;
                font-size: 1.6rem;
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/notif@1.0.0/notif.min.js"></script>
        @if (session()->has('sucsses'))
            <script>
                window.onload = function() {
                    notif({
                       
                        type: "success"
                    })
                }
            </script>
        @endif
        @if (session()->has('delete'))
            <script>
                window.onload = function() {
                    notif({
                       
                        type: "success"
                    })
                }
            </script>
        @endif
        @if (session()->has('update'))
            <script>
                window.onload = function() {
                    notif({
                       
                        type: "success"
                    })
                }
            </script>
        @endif

        <!-- النموذج لإضافة قسم جديد -->
        <form action="{{ route('section.store') }}" method="post">
            @csrf
            <div class="col-md-6">
                <label for="sectionName" class="form-label">اسم القسم</label>
                <input type="text" class="form-control" name="section" id="sectionName" placeholder="Enter Section Name" required>
            </div>

            <div class="col-md-6">
                <label for="notes" class="form-label">الملاحظات</label>
                <textarea class="form-control" name="description" id="notes" rows="4" placeholder="Enter Description" required></textarea>
            </div>

            <div class="col-12">
                <br>
                <button class="btn btn-primary" type="submit">create</button>
            </div>
        </form>

        <!-- جدول عرض الأقسام -->
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>section name </th>
                    <th>discribtion</th>
                    <th>opreations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($showsections as $index => $show)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $show->section }}</td>
                        <td>{{ $show->description }}</td>
                        <td>
                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                data-id="{{ $show->id }}" data-section="{{ $show->section }}"
                                data-description="{{ $show->description }}" data-toggle="modal" href="#exampleModal2"
                                title="Edit">
                                <i class="las la-pen"></i>
                            </a>
                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                data-id="{{ $show->id }}" data-section="{{ $show->section }}" data-toggle="modal"
                                href="#modaldemo9" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(! $showsections->isEmpty())
        <!-- edit model-->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> section update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('section.update',$show->id)}}" method="post" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="section" class="col-form-label">section name </label>
                                <input class="form-control" name="section" id="section" type="text">
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">الملاحظات</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">consert</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  delete model -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete </h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('section.destroy',$show->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p> <h4>Are you sure your delete this section</h4></p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="section" id="section" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bac;</button>
                            <button type="submit" class="btn btn-danger">consert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       @endif
    </body>
    </html>
@endsection

@section('js')
    <!-- Internal Scripts -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <!-- Modal Scripts -->
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section = button.data('section')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section').val(section);
            modal.find('.modal-body #description').val(description);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section = button.data('section')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section').val(section);
        })
    </script>
@endsection
