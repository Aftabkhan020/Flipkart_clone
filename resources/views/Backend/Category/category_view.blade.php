@extends('admin.admin_master')
@section('admin')
<div class="container-full">
	<section class="content">
		<div class="row">
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table With Full Features</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category English</th>
								<th>Category Hindi</th>
								<th>Images</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($category as $category)
							<tr>
								<td>{{$category->category_name_en}}</td>
								<td>{{$category->category_name_hin}}</td>
								<td><img src="{{asset($category->category_icon)}}" style="height: 40px; width: 70px;"></td>
								<td><a href="{{route('category.delete',$category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									<a href="{{route('category.edit',$category->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></a></td>
							</tr>
							@endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --></div>

<!-- ---------------------------Add Brand---------------------- -->
<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


						<form method="post" action="{{route('category-store')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">
									<div class="form-group">
								<h5>Brand Name In English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="category_name_en" id="current_password" class="form-control" value=""> 
									@error('category_name_en')
									<span class="text-danger">{{$message}}</span>
									@enderror

								</div>
							</div>

									<div class="form-group">
								<h5>Brand Name In Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" id="password" name="category_name_hin" value="" class="form-control" >
								@error('category_name_hin')
									<span class="text-danger">{{$message}}</span>
									@enderror</div>
							</div>				
								
									<div class="form-group">
								<h5>Brand Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="category_icon" value="" class="form-control" id="password_confirmation">
									@error('category_icon')
									<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
							</div>



							
							
						</div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info" value="update">Submit</button>
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --></div>
			  </div>
	</section>
</div>

@endsection