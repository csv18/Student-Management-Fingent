<!-- Site wrapper -->
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar-->
	<section class="sidebar position-relative">
		<div class="multinav">
			<div class="multinav-scroll" style="height: 100%;">
				<!-- sidebar menu-->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
						<a href="{{url('admin/dashboard')}}"> <i class="fa fa-dashboard"><span class="path1"></span><span class="path2"></span></i> <span>Dashboard</span> <span class="pull-right-container">  </span> </a>
					</li>
					<li class="treeview {{ request()->is('admin/teacher*')  ? 'active menu-open' : '' }}">
						<a href="#"> <i class="fa fa-id-badge"><span class="path1"></span><span class="path2"></span></i><span>Teachers</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span> </a>
						<ul class="treeview-menu">
                            <li class="{{ request()->is('admin/teacher') ? 'active' : '' }}">
                                <a href="{{url('admin/teacher')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List All Teachers </a>
                            </li>
							<li class="{{ request()->is('admin/teacher/create') ? 'active' : '' }}">
								<a href="{{url('admin/teacher/create')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Teacher </a>
							</li>
						</ul>
					</li>
					<li class="treeview {{ request()->is('admin/term*')  ? 'active menu-open' : '' }}">
						<a href="#"> <i class="fa fa-graduation-cap"><span class="path1"></span><span class="path2"></span></i><span>Terms</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span> </a>
						<ul class="treeview-menu">
                            <li class="{{ request()->is('admin/term') ? 'active' : '' }}">
                                <a href="{{url('admin/term')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List All Terms </a>
                            </li>
							<li class="{{ request()->is('admin/term/create') ? 'active' : '' }}">
								<a href="{{url('admin/term/create')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Term </a>
							</li>
						</ul>
					</li>
					<li class="treeview {{ request()->is('admin/student')  ? 'active menu-open' : '' }}">
						<a href="#"> <i class="fa fa-user"><span class="path1"></span><span class="path2"></span></i><span>Students</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span> </a>
						<ul class="treeview-menu">
                            <li class="{{ request()->is('admin/student') ? 'active' : '' }}">
                                <a href="{{url('admin/student')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List All Students </a>
                            </li>
							<li class="{{ request()->is('admin/student/create') ? 'active' : '' }}">
								<a href="{{url('admin/student/create')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Student </a>
							</li>
						</ul>
					</li>
					<li class="treeview {{ request()->is('admin/student-mark*')  ? 'active menu-open' : '' }}">
						<a href="#"> <i class="fa fa-book"><span class="path1"></span><span class="path2"></span></i><span>Student Marks</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span> </a>
						<ul class="treeview-menu">
                            <li class="{{ request()->is('admin/student-mark') ? 'active' : '' }}">
                                <a href="{{url('admin/student-mark')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List All Marks </a>
                            </li>
							<li class="{{ request()->is('admin/student-mark/create') ? 'active' : '' }}">
								<a href="{{url('admin/student-mark/create')}}"> <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Mark </a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out "><span class="path1"></span><span class="path2"></span></i> <span>Logout</span> <span class="pull-right-container">  </span> </a>
					</li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
				</ul>
			</div>
		</div>
	</section>
</aside>
