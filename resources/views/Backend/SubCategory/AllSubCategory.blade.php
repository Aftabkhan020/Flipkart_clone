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
								<th>Category</th>
								<th>Subctegory English</th>
								<th>Subctegory Hindi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($subcategory as $subcategory)
							<tr>
								<td>{{$subcategory->category_id}}</td>
								<td>{{$subcategory->subcategory_name_en}}</td>
								<td>{{$subcategory->subcategory_name_hin}}</td>
								<td><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<a href="{{route('subcategory-edit',$subcategory->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></a></td>
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
				  <h3 class="box-title">Add Subcategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


						<form method="post" action="{{route('subcategory-store')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">
									<div class="form-group">
								<h5>Brand Name In English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcategory_name_en" id="current_password" class="form-control" value=""> 
									@error('subcategory_name_en')
									<span class="text-danger">{{$message}}</span>
									@enderror

								</div>
							</div>

									<div class="form-group">
								<h5>Brand Name In Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcategory_name_hin" value="" class="form-control" >
								@error('subcategory_name_hin')
									<span class="text-danger">{{$message}}</span>
									@enderror</div>
							</div>				
								
							<div class="form-group validate">
								<h5>Select Category<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control" aria-invalid="false">
										<option value="">Select Your City</option>

                                        @foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->category_name_en}}</option>
										@endforeach
                                        
									</select>
                                    @error('category_name_en')
									<span class="text-danger">{{$message}}</span>
									@enderror</div>
								<div class="help-block"></div></div>
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