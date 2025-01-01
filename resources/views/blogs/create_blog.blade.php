@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <style>
    /* General form styling */
    form {
        width: 100%;  /* Full width */
        margin: 50px auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 1200px;  /* You can adjust as needed */
    }

    /* Label styling */
    .form-label {
        font-weight: bold;
        color: #495057;
    }

    .form-control, .form-select {
        border-radius: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        padding: 10px;
        transition: border-color 0.3s ease;
        width: 100%; /* Make fields take full width */
    }

    /* Focused field styling */
    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
    }

    /* Button styling */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    /* Checkbox styling */
    .form-check-input {
        margin-top: 10px;
    }

    .form-check-label {
        font-size: 0.9rem;
        color: #495057;
    }

    /* Column spacing */
    .row {
        margin-bottom: 15px;
    }
    
    /* Error and success messages */
    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }

    .valid-feedback {
        font-size: 0.875rem;
        color: #28a745;
    }

    /* Add margin-bottom for smaller sections */
    .col-md-6 {
        margin-bottom: 15px;
    }
  </style>

  <!-- Internal Notify -->
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
  @if (session()->has('sucsses'))
    <script>
      window.onload = function() {
        notif({
          msg: "Article was created successfully",
          type: "success"
        })
      }
    </script>
  @endif

  <form action="{{ route('Blog.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="col-md-12">
      <label for="validationServer04" class="form-label">Country</label>
      <select class="form-select" name="country" id="validationServer04" required>
        <option selected disabled value="">Select...</option>
        <option value="Egypt">Egypt</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="United Arab Emirates">United Arab Emirates</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Qatar">Qatar</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Jordan">Jordan</option>
        <option value="Iraq">Iraq</option>
        <option value="Oman">Oman</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Palestine">Palestine</option>
      </select>
    </div>

    <div class="col-md-12">
      <label for="validationServer03" class="form-label">City</label>
      <input type="text" class="form-control" name="city" id="validationServer03" required>
      <div id="validationServer03Feedback" class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    
    <div class="col">
      <label for="inputName" class="form-label">Section</label>
      <select name="section_id" class="form-control" required>
        <option value="" selected disabled>Select Section</option>
        @foreach ($showsections as $show)
        <option value="{{ $show->id }}">{{ $show->section }}</option> 
        @endforeach
      </select>
    </div>
    <br>
    
    <div class="col-md-12">
      <br>
      <label for="validationServer03" class="form-label">Title</label>
      <input type="text" class="form-control" name="blog_title" id="blog_title" required>
      <br>
    </div>
    <!-- Article content field -->
    
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Enter blog
								</div>
								<p class="mg-b-20">Wrrite the blog in this field</p>
								<div class="ql-wrapper ql-wrapper-demo bg-gray-100" >
                  <input type="hidden" name="article" id="article">
                  
                  
                    <label for="article">artilce:</label>
                    <!-- حقل النص مع TinyMCE -->
                    <textarea id="article" name="article"></textarea>
									
									</div>
								</div>
                <div>
                  <br>
                  <label for="formfile" class="form-label"> chose image:</label>
                   <input class="form-control" type="file" id="image" name="image">
                </div>
							</div>
						</div>
					</div>
					

		<!--/Modal-->


    <div class="col-md-12 mt-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

  <!-- Internal JS -->
  @section('js')
    <!-- Select2 JS -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Quill JS -->
    <script src="{{ URL::asset('assets/plugins/quill/quill.min.js') }}"></script>
    <!-- Notify JS -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Form-editor JS -->
    <script src="{{ URL::asset('assets/js/form-editor.js') }}"></script>
  @endsection

</body>

</html>
@endsection
<script>
  // Initialize the Quill editor
  var quill = new Quill('#quillEditor', {
    theme: 'snow'
  });

  // When the form is submitted, set the article hidden input value to the content of the editor
  document.querySelector('form').onsubmit = function() {
    var articleContent = quill.root.innerHTML;  // Get the content of the Quill editor
    document.getElementById('article').value = articleContent;  // Set the hidden input to the content
  };
</script>
