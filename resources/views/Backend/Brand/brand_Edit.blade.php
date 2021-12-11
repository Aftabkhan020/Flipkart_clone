@extends('admin.admin_master')
@section('admin')
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


		<form method="post" action="{{route('brand.Update',$brand->id)}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$brand->id}}">
		<input type="hidden" name="old_image" value="{{$brand->brand_image}}">

						<div class="col-12">
									<div class="form-group">
								<h5>Brand Name In English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_en" id="current_password" class="form-control" value="{{$brand->brand_name_en}}"> 

								</div>
							</div>

									<div class="form-group">
								<h5>Brand Name In Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" id="password" name="brand_name_hin" value="{{$brand->brand_name_hin}}" class="form-control" >
							</div>
							</div>				
								
									<div class="form-group">
								<h5>Brand Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="brand_image" value="" class="form-control" id="password_confirmation">
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






@endsection