@extends('admin.layouts.app') @push('style') @endpush @section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<h4 class="box-title">Edit Student</h4> </div>
			<form class="form" id="student-edit-form" method="POST"> @method('PUT')
				<input type="hidden" name="student_id" value="{{$data->id}}">
                <input type="hidden" id="default_teacher_id" name="default_teacher_id" value="{{$data['teacher']['id'] ?? ''}}">
                <input type="hidden" id="default_teacher_name" name="default_teacher_name" value="{{$data['teacher']['name'] ?? ''}}">
				<div class="box-body">
					<h4 class="box-title text-info"><i class="ti-info-alt mr-15"></i> Student Info</h4>
					<hr class="my-15">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Student Name"> </div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<label>Age</label>
								<input type="text" class="form-control" value="{{$data->age}}" name="age" placeholder="Student Age">
                            </div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="gender">
                                    <option value="male" @if($data->gender=="male") selected @endif>Male</option>
                                    <option value="female" @if($data->gender=="female") selected @endif>Female</option>
                                    <option value="other" @if($data->gender=="other") selected @endif>Other</option>
                                </select>
                            </div>
						</div>
						<div class="col-md-6">
                            <div class="form-group multi-form theme-select2-section">
                                <label for="js-teacher">Reporting Teacher</label>
                                <select name="teacher_id" id="js-teacher" class="form-control select2 web-select2" required  style="width: 100%" >
                                </select>
                            </div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a type="button" href="{{url('admin/student')}}" class="btn btn-rounded btn-warning btn-outline mr-1"> <i class="ti-close"></i> Cancel </a>
					<button type="submit" class="btn btn-rounded btn-primary btn-outline"> <i class="ti-save-alt"></i> Save </button>
				</div>
			</form>
		</div>
	</div>
</div> @endsection @push('script')
<script src="{{ asset('admin/js/student.js') }}"></script> @endpush
