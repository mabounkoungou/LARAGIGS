<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>LARA-GIGS | Find Best Jobs</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="pinterest" content="nopin" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
	<!-- Fav Icon -->
	
	<link rel="shortcut icon" type="image/x-icon" href="#" />
	<style>
		.btn.btn-outline-primary.me-2 {
    border-radius: 30px 0 30px 0;
}
.btn.btn-primary{
	border-radius: 0 30px 0 30px;
}
.btn.btn-primary.mt-2 {
    border-radius: 30px 0 30px 0;
    display: block;
    margin: 0 auto;
}

body {
      font-family: 'Arial', sans-serif;
      padding: 50px;
    }
    h1{

      text-align: center;
    }

    h1, h3 {
      display: inline-block;
      overflow: hidden;
      white-space: nowrap;
    }

    .typing-text h1,
    .typing-text h3 {
      border-right: 2px solid #000;
      font-size: 24px;
      animation: typing 3s steps(40, end), blink-caret 0.75s step-end infinite;
    }

    @keyframes typing {
      0%, 100% {
        width: 0;
      }
      50% {
        width: 100%;
      }
    }

    @keyframes blink-caret {
      from, to {
        border-color: transparent;
      }
      50% {
        border-color: #000;
      }
    }


	</style>
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="#">LARA-GIGS</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="jobs.html">Find Jobs</a>
					</li>										
				</ul>	
				
				@if(!Auth::check())
				<a class="btn btn-outline-primary me-2" href="{{route('account.login')}}" type="submit">Login</a>
				@else
				<a class="btn btn-outline-primary me-2" href="{{route('account.profile')}}" type="submit">Account</a>
				@endif
				<a class="btn btn-primary" href="post-job.html" type="submit">Post a Job</a>
			</div>
		</div>
	</nav>
</header>



@yield('main')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>
@extends('front.layouts.footer')
 
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

@yield('customJs')
</body>
</html>