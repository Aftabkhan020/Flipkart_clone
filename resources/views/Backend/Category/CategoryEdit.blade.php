@extends('admin.admin_master')
@section('admin')
<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


		<form method="post" action="{{route('category.Update')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$category->id}}">
		<input type="hidden" name="old_image" value="{{$category->category_icon}}">

						<div class="col-12">
									<div class="form-group">
								<h5>Category Name In English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="category_name_en" id="current_password" class="form-control" value="{{$category->category_name_en}}"> 

								</div>
							</div>

									<div class="form-group">
								<h5>Category Name In Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" id="password" name="category_name_hin" value="{{$category->category_name_hin}}" class="form-control" >
							</div>
							</div>				
								
									<div class="form-group">
								<h5>Category Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="category_icon" value="{{$category->category_icon}}" class="form-control" id="password_confirmation">
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