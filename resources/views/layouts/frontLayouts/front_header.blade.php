<?php

	use App\Http\Controllers\Controller;
	$bknews = Controller::breakingNews();
 
?>

<div class="top-header d-flex">
				<div class="container align-self-center">
					<div class="oflow-hidden font-9 text-sm-center ptb-sm-5">

						<ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-5 list-a-ptb-sm-10 list-a-ptb-xs-5">

							<li class="strip-bar"><a href="#"><?php echo date("l M d Y"); ?></a></li>
							<li class="strip-bar"><a href="#"><?php date_default_timezone_set("Asia/Kolkata");
								echo date("h:i A");?></a></li>
						</ul>
						<ul class="socialicon float-right float-sm-none font-13 list-a-plr-10 list-a-plr-sm-5 list-a-ptb-5 list-a-ptb-sm-5 color-ash">
							
							<li><a href="https://www.linkedin.com/company/awazeuttarpradesh/"><i class="ion-social-linkedin"></i></a></li>
							<li><a href="https://pinterest.com/awazeuttarpradesh/"><i class="ion-social-pinterest"></i></a></li>
							<li><a href="https://www.facebook.com/Awaze-UttarPradesh-2252636938165590/"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-rss"></i></a></li>
						</ul>

					</div><!-- top-menu -->
				</div><!-- container -->
			</div><!-- top-header -->
<header id="myHeader">

		<div class="bottom-menu">
				<div class="vizew-main-menu" id="sticker">
			<div class="container">

			    <a class="logo" href="{{ url('/') }}"><img src="{{ url('images/frontend/images/logo-black.jpg') }}" alt="Logo"></a>

				<a class="menu-nav-icon" data-menu="#main-menu" href="{{ url('/') }}"><i class="ion-navicon"></i></a>

				<ul class="main-menu" id="main-menu">
					<li><a href="{{ url('/') }}"><i style="line-height:0; font-size:18px;" class="ion-home"></i></a></li>
					<li><a href="{{ url('/news/nation') }} ">देश</a></li>
					<li><a href="{{ url('/news/state/1584') }}">प्रदेश</a></li>

					@foreach(\App\PostCategory::where(['parent_cat'=>'0'])->get() as $category)
					<li><a href="/category/{{ $category->category_url }}">{{ $category->category_name }}</a></li>
					@endforeach
				</ul>
				<div class="clearfix"></div>
			</div><!-- container -->
			</div>
		</div><!-- bottom-menu -->
	</header>
	<div class="smart_container">
	<section class="pt-0 pb-0 sub_menu">
		<div class="container ptb-10">
			<div class="owl-carousel navigation_slide owl-theme">
				<div><a href="{{ url('/news/state/1584') }}">उत्तर प्रदेश</a></div>
				<div><a href="{{ url('/news/state/1585') }}">महानगर</a></div>
			</div>
		</div>
	</section>

	<!-- START OF MAIN SLIDER -->
<!-- START OF MAIN SLIDER -->
<section class="pt-0 pb-0">
		<div class="container ptb-10">
			<div class="row">
				<div class="col-md-8 col-lg-8">
					<div class="latestnews_strip">
						<div class="title_latest">
							<a class="btn-fill-red plr-10 mtb-10 btn-b-md" href="#"><b>ताज़ा खबर</b></a>
						</div>
						<div class="latestnews owl-carousel owl-theme pt-15">
							@foreach($bknews as $bn)
							<div>
								<a class="dplay-inl-block">{{ $bn->news_title }}</a>
							</div>
							@endforeach
						</div>
					</div>
				</div><!-- col-md-8 -->
				<div class="col-md-4 col-lg-4">
					<form class="abs-form mtb-10" action="{{ url('/blog') }}" method="get">
						<input type="text" placeholder="Search" name="search">
						<button type="submit"><i class="ion-ios-search"></i></button>
					</form>
				</div><!-- col-md-4 -->
			</div><!-- row -->
		</div><!-- container -->