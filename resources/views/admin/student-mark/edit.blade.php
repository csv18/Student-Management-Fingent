@extends('admin.layouts.app') @push('style') @endpush @section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<h4 class="box-title">Edit Student Mark</h4> </div>
			    <form class="form" id="student-mark-edit-form" method="POST"> @method('PUT')
				<input type="hidden" name="student_mark_id" value="{{$data->id}}">
                <input type="hidden" id="default_term_id" name="default_term_id" value="{{$data['term']['id'] ?? ''}}">
                <input type="hidden" id="default_term_name" name="default_term_name" value="{{$data['term']['name'] ?? ''}}">
                <input type="hidden" id="default_student_id" name="default_student_id" value="{{$data['student']['id'] ?? ''}}">
                <input type="hidden" id="default_student_name" name="default_student_name" value="{{$data['student']['name'] ?? ''}}">
				<div class="box-body">
					<h4 class="box-title text-info"><i class="ti-info-alt mr-15"></i> Student Mark</h4>
					<hr class="my-15">
					<div class="row">
                        <div class="col-md-6">
                            <div class="form-group multi-form theme-select2-section">
                                <label for="js-student">Student</label>
                                <select name="student_id" id="js-student" class="form-control select2 web-select2" required  style="width: 100%" >
                                </select>
                            </div>
						</div>
                        <div class="col-md-6">
                            <div class="form-group multi-form theme-select2-section">
                                <label for="js-term">Term</label>
                                <select name="term_id" id="js-term" class="form-control select2 web-select2" required  style="width: 100%" >
                                </select>
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Maths</label>
								<input type="number" class="form-control" name="maths" placeholder="Maths Mark" value="{{$data->maths}}">
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Science</label>
								<input type="number" class="form-control" name="science" placeholder="Science Mark" value="{{$data->science}}">
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>History</label>
								<input type="number" class="form-control" name="history" placeholder="History Mark" value="{{$data->history}}">
                            </div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a type="button" href="{{url('admin/student-mark')}}" class="btn btn-rounded btn-warning btn-outline mr-1"> <i class="ti-close"></i> Cancel </a>
					<button type="submit" class="btn btn-rounded btn-primary btn-outline"> <i class="ti-save-alt"></i> Save </button>
				</div>
			</form>
		</div>
	</div>
</div> @endsection @push('script')
<script src="{{ asset('admin/js/student-mark.js') }}"></script> @endpush
