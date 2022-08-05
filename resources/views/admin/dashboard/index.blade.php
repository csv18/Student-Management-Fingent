@extends('admin.layouts.app') @push('style') @endpush @section('content')
<section class="service-categories text-xs-center">
	<div class="container-fluid">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-3 col-xs-12 text-center">
				<a href="{{url('admin/teacher')}}">
					<div class="card service-card card-inverse">
						<div class="card-block"> <span class=""><img src="{{asset('assets/images/teacher.png')}}" class="img-dashboard"></span>
							<h4 class="card-title">Teachers</h4> </div>
					</div>
				</a>
			</div>
			<div class="col-md-3 col-xs-12 text-center">
				<a href="{{url('admin/term')}}">
					<div class="card service-card card-inverse">
						<div class="card-block"> <span class=""><img src="{{asset('assets/images/terms.png')}}" class="img-dashboard"></span>
							<h4 class="card-title">Terms</h4> </div>
					</div>
				</a>
			</div>
			<div class="col-md-3 col-xs-12 text-center">
				<a href="{{url('admin/student')}}">
					<div class="card service-card card-inverse">
						<div class="card-block"> <span class=""><img src="{{asset('assets/images/students.png')}}" class="img-dashboard"></span>
							<h4 class="card-title">Students</h4> </div>
					</div>
				</a>
			</div>
			<div class="col-md-3 col-xs-12 text-center">
				<a href="{{url('admin/student-mark')}}">
					<div class="card service-card card-inverse">
						<div class="card-block"> <span class=""><img src="{{asset('assets/images/mark.png')}}" class="img-dashboard"></span>
							<h4 class="card-title">Student Marks</h4> </div>
					</div>
				</a>
			</div>
		</div>
		<!--End Row-->
	</div>
</section> @endsection @push('script') @endpush
