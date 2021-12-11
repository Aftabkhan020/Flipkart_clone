@extends('frontend.main_master')
@section('content')
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-2"><br><br>

				<img class="card-img-top" style="border-radius: 50%" src="{{(!empty($data->profile_photo_path))? url('upload/user_images/'.$data->profile_photo_path):url('upload/noimage.png')}}" height="100%" width="100%"><br><br>
				<ul class="list-group list-group-flush">

					<a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
					<a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
					<a href="{{route('user.changepassword')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
					<a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Log out</a>
					
				</ul>

			</div>

			<div class="col-md-2">

				
				






			</div>

			<div class="col-md-6">

				<div class="card">
					<h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{Auth::user()->name}} </strong>Welcome to Flipmart</h3>
				</div>
				






			</div>
		</div>
	</div>
</div>


@endsection