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
								<th>Brand English</th>
								<th>Brand Hindi</th>
								<th>Images</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($brand as $brand)
							<tr>
								<td>{{$brand->brand_name_en}}</td>
								<td>{{$brand->brand_name_hin}}</td>
								<td><img src="{{asset($brand->brand_image)}}" style="height: 40px; width: 70px;"></td>
								<td><a href="{{route('brand.delete',$brand->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									<a href="{{route('brand.edit',$brand->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></a></td>
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


						<form method="post" action="{{route('brand-store')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">
									<div class="form-group">
								<h5>Brand Name In English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_en" id="current_password" class="form-control" value=""> 
									@error('brand_name_en')
									<span class="text-danger">{{$message}}</span>
									@enderror

								</div>
							</div>

									<div class="form-group">
								<h5>Brand Name In Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" id="password" name="brand_name_hin" value="" class="form-control" >
								@error('brand_name_hin')
									<span class="text-danger">{{$message}}</span>
									@enderror</div>
							</div>				
								
									<div class="form-group">
								<h5>Brand Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="brand_image" value="" class="form-control" id="password_confirmation">
									@error('brand_image')
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