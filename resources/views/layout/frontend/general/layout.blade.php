<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>Al Ihsan Website</title>
		<meta name="keywords" content="HTML5" />
		<meta name="description" content="Al Ihsan Website">
		<meta name="author" content="alihsan">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		{!! Html::style('assets/frontend/general/vendor/bootstrap/bootstrap.css') !!}
		{!! Html::style('assets/frontend/general/vendor/fontawesome/css/font-awesome.css') !!}
		{!! Html::style('assets/frontend/general/vendor/owlcarousel/owl.carousel.min.css') !!}
		{!! Html::style('assets/frontend/general/vendor/owlcarousel/owl.theme.default.min.css') !!}
		{!! Html::style('assets/frontend/general/vendor/magnific-popup/magnific-popup.css') !!}

		<!-- bootstrap select style -->
		{!! Html::style('assets/general/select/css/bootstrap-select.css') !!}
		{!! Html::style('assets/general/select/css/bootstrap-select.min.css') !!}


		<!-- Theme CSS -->
		{!! Html::style('assets/frontend/general/css/theme.css') !!}
		{!! Html::style('assets/frontend/general/css/theme-elements.css') !!}
		{!! Html::style('assets/frontend/general/css/theme-blog.css') !!}
		{!! Html::style('assets/frontend/general/css/theme-animate.css') !!}

		{!! Html::style('assets/backend/porto-admin/vendor/hover/hover.css') !!}

		<!-- Current Page CSS -->
		{!! Html::style('assets/frontend/general/vendor/rs-plugin/css/settings.css') !!}
		{!! Html::style('assets/frontend/general/vendor/circle-flip-slideshow/css/component.css') !!}

		<!-- Skin CSS -->
		{!! Html::style('assets/frontend/general/css/skins/default.css') !!}

		<!-- Theme Custom CSS -->
		{!! Html::style('assets/frontend/general/css/custom.css') !!}

		<!-- Head Libs -->
		{!! Html::script('assets/frontend/general/vendor/modernizr/modernizr.js') !!}
		<style type="text/css">
			.img-flag{width: 20px;height: 20px;}
			body { background-image: url({{ asset('assets/general/images/default/back_body.jpg') }}); }
			.back-content{background: #fff; padding : 15px 40px 15px 40px;}
			#demo{
				text-align: center;
  				color: blue;
  				font-family: 'Raleway',sans-serif; font-size: 30px; font-weight: 800;
			    text-shadow: 1px 1px 1px #ccc;
			    /*font-size: 1.5em;*/
			}
		</style>
		<script type="text/javascript">
			function cek(){
				$("#myModal").modal('show');
			}
		</script>
		<script>
			// Set the date we're counting down to
			var countDownDate = new Date("Apr 16, 2017 01:00:00").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

			    // Get todays date and time
			    var now = new Date().getTime();
			    
			    // Find the distance between now an the count down date
			    var distance = countDownDate - now;
			    
			    // Time calculations for days, hours, minutes and seconds
			    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			    // Output the result in an element with id="demo"
			    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
			    + minutes + "m " + seconds + "s ";
			    
			    // If the count down is over, write some text 
			    if (distance < 0) {
			        clearInterval(x);
			        document.getElementById("demo").innerHTML = "EXPIRED";
			    }
			}, 1000);
		</script>
		@yield('css')
	</head>
	<body onload="cek()">
		<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content" style="margin-top:300px">
		      <div class="modal-header">
		        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
		        <h4 style="font-weight: 600" class="modal-title">[Beta Version] This website will be released on :</h4>
		      </div>
		      <div class="modal-body">
		        <p id="demo"></p>
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		      </div>
		    </div>

		  </div>
		</div>
		<div class="body">
		@if(request()->segment(2) == NULL)
			<header id="header" class="single-menu flat-menu valign transparent font-color-light" data-plugin-options='{"stickyEnabled": true, "stickyBodyPadding": false}'>
		@else
			<header id="header" class="colored flat-menu" data-plugin-options='{"stickyEnabled": true, "stickyBodyPadding": false}'>
		@endif
				<div class="header-top">
					<div class="container">
						<nav>
							<ul class="nav nav-pills nav-top">
								<li>
									<span style="color: #fff">@lang('general.public.language')</span>
								</li>
								<li>
									<a href="{{ route('session', 'in') }}" title="Indonesia"><img class="img-flag" src="{{ asset('assets/general/images/identity/in.ico') }}"></a>
								</li>
								<li>
									<a href="{{ route('session','en') }}" title="English (UK)"><img class="img-flag" src="{{ asset('assets/general/images/identity/uk.ico') }}"></a>
								</li>
								<!-- <li>
									<a href="{{ route('session','ar') }}" title="Saudi Arabia"><img class="img-flag" src="{{ asset('assets/general/images/identity/ar.ico') }}"></a>
								</li> -->
							</ul>
						</nav>
						<ul class="social-icons">
							<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" data-tooltip title="Facebook">Facebook</a></li>
							<li class="instagram"><a href="http://www.instagram.com/alihsan_hits/" target="_blank" data-placement="bottom" data-tooltip title="Instagram">Instagram</a></li>
						</ul>
					</div>
				</div>
				<div class="container">
					<div class="logo">
						<a href="index.html">Header Logo
							<!-- <img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="{{ asset('assets/frontend/general/img/logo-default-slim.png') }}"> -->
						</a>
					</div>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						@include('layout.frontend.general.partials.menu-nav')

					</div>
				</div>
			</header>
			@yield('content')

			@include('layout.frontend.general.partials.footer')
		</div>

		<!-- Vendor -->
		{!! Html::script('assets/frontend/general/vendor/jquery/jquery.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery.appear/jquery.appear.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery.easing/jquery.easing.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery-cookie/jquery-cookie.js') !!}
		{!! Html::script('assets/frontend/general/vendor/bootstrap/bootstrap.js') !!}
		{!! Html::script('assets/frontend/general/vendor/common/common.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery.validation/jquery.validation.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery.stellar/jquery.stellar.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jquery.gmap/jquery.gmap.js') !!}
		{!! Html::script('assets/frontend/general/vendor/isotope/jquery.isotope.js') !!}
		{!! Html::script('assets/frontend/general/vendor/owlcarousel/owl.carousel.js') !!}
		{!! Html::script('assets/frontend/general/vendor/jflickrfeed/jflickrfeed.js') !!}
		{!! Html::script('assets/frontend/general/vendor/magnific-popup/jquery.magnific-popup.js') !!}
		{!! Html::script('assets/frontend/general/vendor/vide/vide.js') !!}

		<!-- Theme Base, Components and Settings -->
		{!! Html::script('assets/frontend/general/js/theme.js') !!}

		<!-- Specific Page Vendor and Views -->
		{!! Html::script('assets/frontend/general/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') !!}
		{!! Html::script('assets/frontend/general/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}
		{!! Html::script('assets/frontend/general/vendor/circle-flip-slideshow/js/jquery.flipshow.js') !!}
		{!! Html::script('assets/frontend/general/js/views/view.home.js') !!}

		<!-- Theme Custom -->
		{!! Html::script('assets/frontend/general/js/custom.js') !!}

		<!-- Theme Initialization Files -->
		{!! Html::script('assets/frontend/general/js/theme.init.js') !!}

		{!! Html::script('assets/general/select/js/bootstrap-select.js') !!}
		{!! Html::script('assets/general/select/js/bootstrap-select.min.js') !!}

		@yield('scripts')
	</body>
</html>
