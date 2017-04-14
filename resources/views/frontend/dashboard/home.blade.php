@extends('layout.frontend.general.layout')

@section('title', 'Home')

@section('css')
<style type="text/css">
	/*-- Events Section --*/
.events{
	background-color:black;
	padding: 50px 0px;
}
.events h3{
	color:#fff;
	text-align:center;
    font-size:30px;
}
.edifice h3{
	text-align:center;
    font-size:30px;
}
/*-- Edifice-Starts-Here --*/
.edifice {
    padding-bottom: 50px;
    border-bottom: 1px solid #EEE;
    text-align: center;
}
img.lazyOwl {
    width: 100%;
}
#owl-demo .item img {
    height: 250px;
}
/*-- //Edifice-Ends-Here --*/
.events h6{
    color: #797979;
    padding-bottom: 30px;
    width: 45%;
    margin: 0 auto;
    font-size: 15px;
    text-align: center;
    line-height: 25px;

}
.egrid{
	width: 48%;
    margin: 10px 1%;
	border:5px solid white;
	padding:0;
	position:relative;
	padding:10px;
	margin-bottom:30px;
}
.textt{
	width:45%;
	float:left;
	margin-left:5%;
}
.date-event{
	position:absolute;
	top: -16px;
    left: 230px;
	background-color:#0088cc;
	padding:10px 10px 10px 10px;
	height: 40px;
}
.date-event h5{
	color:white;
}
.img{
	float:left;
   width:50%;
 }
 .textt h3{
	font-size:18px;
    margin-top: 35px;
	text-align: left;
	color:#B3B3B3;
}
 .textt p{
	margin-top:3px ;
	margin-bottom:10px;
	font-size: 14px;
	color: #4E4E4E;
 }
  .textt a{
	color:#0088cc;
	border:2px solid #0088cc; 
	padding:7px 15px;
	display:inline-block;
    margin-top:10px;
	font-size: 14px;
}
.textt a:hover{
	border:2px solid white;
	color:white;
}
label.eline{
    display: block;
    background-color: #0088cc;
    width: 55px;
    height: 2px;
	margin: 15px 0px;
}
label.line{
	background-color:#0088cc;
	display:block;
	width: 100px;
    height: 2px;
	margin:15px auto;
}
label.line-infra{
	background-color:#000;
	display:block;
	width: 100px;
    height: 2px;
	margin:15px auto;
}
.bold-color{
	color: #0088cc;
}
	/*#2243e8 2807ff buru ungu
#32ddff 09cff7 tosca
#0011ff biru*/
.infra{
	background-color: #32ddff;
	padding-top: 40px;
}
.infra h3{
	color: #000;
}
.facilities-slider{
	background-color: #000;
	padding : 10px 10px 0 0; 
}
.facilities-slider label{
	padding-top: 5px;
	font-size: 18px; 
	color: #fff;
}
/*-- //Events Section --*/
</style>
@endsection
@section('content')

<div role="main" class="main">

	<div class="slider-container slider-container-fullscreen">
		<div class="slider" id="revolutionSliderFullScreen" data-plugin-revolution-slider data-plugin-options='{"fullScreen": "on"}'>
			<ul>
				<li data-transition="fade" data-slotamount="10" data-masterspeed="300">
					<img src="{{ asset('assets/frontend/general/img/slides/cek.png') }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" />

					<div class="tp-caption tp-fade fadeout fullscreenvideo"
						data-x="0"
						data-y="0"
						data-speed="1000"
						data-start="100"
						data-easing="Power4.easeOut"
						data-elementdelay="0.01"
						data-endelementdelay="0.1"
						data-endspeed="1500"
						data-endeasing="Power4.easeIn"
						data-autoplay="true"
						data-autoplayonlyfirsttime="false"
						data-nextslideatend="true"
						data-volume="mute"
						data-forceCover="1"
						data-aspectratio="16:9"
						data-forcerewind="on">

						<video preload="none" width="100%" height="100%" poster="{{ asset('assets/frontend/general/img/slides/cek.png') }}"> 
							<source src="{{ asset('assets/frontend/general/video/cek.mp4') }}" type="video/mp4" />
						</video>

					</div>

					<!-- <div class="tp-caption top-label lfl stl"
						 data-x="140"
						 data-y="180"
						 data-speed="300"
						 data-start="500"
						 data-easing="easeOutExpo">You just found the</div>

					<div class="tp-caption main-label sft stb"
						 data-x="135"
						 data-y="210"
						 data-speed="300"
						 data-start="1500"
						 data-easing="easeOutExpo">BEST SOLUTION</div>

					<div class="tp-caption bottom-label sft stb"
						 data-x="150"
						 data-y="280"
						 data-speed="500"
						 data-start="2000"
						 data-easing="easeOutExpo">The #1 Selling HTML Site Template on ThemeForest</div>

					<a class="tp-caption customin btn btn-lg btn-primary main-button" data-hash href="#home-intro"
						data-x="260"
						data-y="335"
						data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
						data-speed="800"
						data-start="2500"
						data-easing="Back.easeInOut"
						data-endspeed="300">
							Get Started Now!
					</a>

					<div class="tp-caption main-label sft stb visible-lg"
						 data-x="345"
						 data-y="415"
						 data-speed="500"
						 data-start="2700"
						 data-easing="easeOutExpo"><a data-hash href="#home-intro"><i class="fa fa-arrow-circle-o-down"></i></a></div> -->

				</li>
				<li data-transition="fade" data-slotamount="10" data-masterspeed="300">
					<img src="{{ asset('assets/frontend/general/img/slides/slider_1.jpeg') }}" data-fullwidthcentering="on" alt="">

						<!-- <div class="tp-caption sft stb visible-lg"
							 data-x="417"
							 data-y="100"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo"><img src="{{ asset('assets/frontend/general/img/slides/slide-title-border.png') }}" alt=""></div>

						<div class="tp-caption top-label lfl stl"
							 data-x="center" data-hoffset="0"
							 data-y="100"
							 data-speed="300"
							 data-start="500"
							 data-easing="easeOutExpo">DO YOU NEED A NEW</div>

						<div class="tp-caption sft stb visible-lg"
							 data-x="717"
							 data-y="100"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo"><img src="{{ asset('assets/frontend/general/img/slides/slide-title-border.png') }}" alt=""></div>

						<div class="tp-caption main-label sft stb"
							 data-x="center" data-hoffset="0"
							 data-y="130"
							 data-speed="300"
							 data-start="1500"
							 data-easing="easeOutExpo">WEB DESIGN?</div>

						<div class="tp-caption bottom-label sft stb"
							 data-x="center" data-hoffset="0"
							 data-y="200"
							 data-speed="500"
							 data-start="2000"
							 data-easing="easeOutExpo">Check out our options and features.</div>

						<a class="tp-caption customin btn btn-lg btn-primary main-button" data-hash href="#projects"
							data-x="center" data-hoffset="0"
							data-y="250"
							data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
							data-speed="800"
							data-start="1700"
							data-easing="Back.easeInOut"
							data-endspeed="300">
								Get Started Now!
						</a> -->
				</li>
				<li data-transition="fade" data-slotamount="10" data-masterspeed="300">
					<img src="{{ asset('assets/frontend/general/img/slides/slider_2.jpeg') }}" data-fullwidthcentering="on" alt="">

						<!-- <div class="tp-caption sft stb visible-lg"
							 data-x="417"
							 data-y="100"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo"><img src="{{ asset('assets/frontend/general/img/slides/slide-title-border.png') }}" alt=""></div>

						<div class="tp-caption top-label lfl stl"
							 data-x="center" data-hoffset="0"
							 data-y="100"
							 data-speed="300"
							 data-start="500"
							 data-easing="easeOutExpo">DO YOU NEED A NEW</div>

						<div class="tp-caption sft stb visible-lg"
							 data-x="717"
							 data-y="100"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo"><img src="{{ asset('assets/frontend/general/img/slides/slide-title-border.png') }}" alt=""></div>

						<div class="tp-caption main-label sft stb"
							 data-x="center" data-hoffset="0"
							 data-y="130"
							 data-speed="300"
							 data-start="1500"
							 data-easing="easeOutExpo">WEB DESIGN?</div>

						<div class="tp-caption bottom-label sft stb"
							 data-x="center" data-hoffset="0"
							 data-y="200"
							 data-speed="500"
							 data-start="2000"
							 data-easing="easeOutExpo">Check out our options and features.</div>

						<a class="tp-caption customin btn btn-lg btn-primary main-button" data-hash href="#projects"
							data-x="center" data-hoffset="0"
							data-y="250"
							data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
							data-speed="800"
							data-start="1700"
							data-easing="Back.easeInOut"
							data-endspeed="300">
								Get Started Now!
						</a> -->
				</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<hr class="tall" />
		</div>
	</div>
	<!-- Edifice-Starts-Here -->
    <div class="edifice slideanim infra" id="edifice">
    	<h3><b>@lang('general.title.infrastructure')</b></h3>
    	<label class="line-infra"></label>
        <div class="gallery-cursual">
            <!-- start content_slider -->
            <div id="owl-demo" class="owl-carousel text-center" data-plugin-options='{"items": 3, "dots": false, "autoplay": true, "autoplayTimeout": 3000}'>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/11.jpg') }}" alt="name">
                    <label>Fasilitas 1</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/12.jpg') }}" alt="name">
                    <label>Fasilitas 2</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/13.jpg') }}" alt="name">
                    <label>Fasilitas 3</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/15.jpg') }}" alt="name">
                    <label>Fasilitas 4</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/1.jpg') }}" alt="name">
                    <label>Fasilitas 5</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/2.jpg') }}" alt="name">
                    <label>Fasilitas 6</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/3.jpg') }}" alt="name">
                    <label>Fasilitas 7</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/5.jpg') }}" alt="name">
                    <label>Fasilitas 8</label>
                </div>
                <div class="item facilities-slider">
                    <img class="lazyOwl" src="{{ asset('assets/frontend/general/img/6.jpg') }}" alt="name">
                    <label>Fasilitas 9</label>
                </div>
            </div>
            <!--//sreen-gallery-cursual -->
        </div>
    </div>
	<!-- //Edifice-Ends-Here -->
	<div class="container">
		<div class="row">
			<hr class="tall" />
		</div>
	</div>
	<!-- Events Section -->
	<div class="events" id="events">
		<div class="container">
	        <h3><b>@lang('general.title.recent_post')</b></h3>
	        <label class="line"></label>
	        <div class="col-md-6 col-sm-6 egrid">
				<div class="img">
				    <img src="{{ asset('assets/frontend/general/img/bl1.jpg') }}">
				</div>
			    <div class="textt">
				    <div class="date-event">
					    <h5>15 AUG</h5>
					</div>
				    <h3>SPORTS DAY</h3>
					<label class="eline"></label>
				    <p>Donec sed odio dui nulla vilae eli libem.Donec sed odio dui nulla vilae eli libem.</p>
					<a href="#" data-toggle="modal" data-target="#myModal5">@lang('general.public.read_more')</a>
					<!-- Modal -->
					<div class="modal fade" id="myModal5" role="dialog">
						<div class="modal-dialog">
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4>Sports Day</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
	        </div>
			<div class="col-md-6 col-sm-6 egrid">
				<div class="img">
				    <img src="{{ asset('assets/frontend/general/img/bl2.jpg') }}">
				</div>
				<div class="textt">
					<div class="date-event">
					    <h5>20 AUG</h5>
					</div>
				    <h3>ANNUAL DAY</h3>
					<label class="eline"></label>
				    <p>Donec sed odio dui nulla vilae eli libem.Donec sed odio dui nulla vilae eli libem.</p>
					<a href="#" data-toggle="modal" data-target="#myModal6">@lang('general.public.read_more')</a>
					<!-- Modal -->
					<div class="modal fade" id="myModal6" role="dialog">
						<div class="modal-dialog">
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4>Annual Day</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
	        </div>
			<div class="col-md-6 col-sm-6 egrid">
				<div class="img">
				    <img src="{{ asset('assets/frontend/general/img/bl3.jpg') }}">
				</div>
				<div class="textt">
					<div class="date-event">
					    <h5>25 AUG</h5>
					</div>
					<h3>EXCURSION</h3>
					<label class="eline"></label>
					<p>Donec sed odio dui nulla vilae eli libem.Donec sed odio dui nulla vilae eli libem.</p>
					<a href="#" data-toggle="modal" data-target="#myModal7">@lang('general.public.read_more')</a>
					<!-- Modal -->
					<div class="modal fade" id="myModal7" role="dialog">
						<div class="modal-dialog">
									<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4>Excursion</h4>
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-6 col-sm-6 egrid">
				<div class="img">
				    <img src="{{ asset('assets/frontend/general/img/bl4.jpg') }}">
				</div>
				<div class="textt">
					<div class="date-event">
					    <h5>28 AUG</h5>
				    </div>
				    <h3>GRADUATION CEREMONY</h3>
					<label class="eline"></label>
					<p>Donec sed odio dui nulla vilae eli libem.Donec sed odio dui nulla vilae eli libem.</p>
					<a href="#" data-toggle="modal" data-target="#myModal8">@lang('general.public.read_more')</a>
					<!-- Modal -->
				    <div class="modal fade" id="myModal8" role="dialog">
					    <div class="modal-dialog">
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4>Graduation Ceremony</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--// Events Section -->
	
	<div class="container">
		<div class="row">
			<hr class="tall" />
		</div>
	</div>
	<div id="projects" class="">
		<section class="featured footer map">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="recent-posts push-bottom">
							<h2>@lang('general.title.latest_article')</h2>
							<div class="row">
								<div class="owl-carousel" data-plugin-options='{"items": 1, "dots": false, "autoplay": true, "autoplayTimeout": 3000}'>
									<div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
									</div>
									<div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">12</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">11</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
									</div>
									<div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="recent-posts push-bottom">
							<h2>@lang('general.title.latest_news')</h2>
							<div class="row">
								<div class="owl-carousel" data-plugin-options='{"items": 1, "dots": false, "autoplay": true, "autoplayTimeout": 3000}'>
									<div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
									</div>
									<div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">12</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">11</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
									</div>
									<div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
										<div class="col-md-6">
											<article>
												<div class="date">
													<span class="day">15</span>
													<span class="month">Jan</span>
												</div>
												<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">@lang('general.public.read_more') <i class="fa fa-angle-right"></i></a></p>
											</article>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection