<nav class="nav-main mega-menu">
	<ul class="nav nav-pills nav-main" id="mainMenu">
		<li>
			<a href="{{ route('home') }}">@lang('general.menu.home')</a>
		</li>
		<li class="dropdown">	
			<a class="dropdown-toggle" href="#">
				@lang('general.menu.profile')
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="{{ route('profile-history') }}">@lang('general.menu.history')</a></li>
				<li><a href="{{ route('profile-structure') }}">@lang('general.menu.structure')</a></li>
				<li><a href="{{ route('profile-teacher') }}">@lang('general.menu.teacher')</a></li>
				<li><a href="{{ route('profile-achievement') }}">@lang('general.menu.achievement')</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" href="#">
				@lang('general.menu.organization')
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#">@lang('general.menu.center')</a></li>
				<li><a href="#">@lang('general.menu.region')</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" href="#">
				@lang('general.menu.uks')
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#">XXX</a></li>
				<li><a href="#">XXX</a></li>
				<li><a href="#">XXX</a></li>
				<li><a href="#">XXX</a></li>
				<li><a href="#">XXX</a></li>
				<li><a href="#">XXX</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" href="#">
				@lang('general.menu.academic')
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#">@lang('general.menu.schedule')</a></li>
				<li><a href="#">@lang('general.menu.material')</a></li>
				<li><a href="#">@lang('general.menu.academic_support')</a></li>
			</ul>
		</li>
		<li>
			<a href="#">@lang('general.menu.facilities')</a>
		</li>
		<li>
			<a href="#">@lang('general.menu.gallery')</a>
		</li>
		<li>
			<a href="#">@lang('general.menu.psb')</a>
		</li>
		<li>
			<a href="#">@lang('general.menu.bimtes')</a>
		</li>
		<li>
			<a href="{{ route('contact') }}">@lang('general.menu.contact')</a>
		</li>
	</ul>
</nav>