@extends('layouts.frontLayouts.frontend_design')
@section('content')

	<section class="ptb-30">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
                    @foreach($posts as $post)
					<div class="ptb-0">
						<a class="mt-10" href="{{ url('/') }}"><i class="mr-5 ion-ios-home"></i>HOME</a>
						<a class="mt-10" href="{{ url('/category/'.$post->cat_url) }}"><i class="mlr-10 ion-chevron-right"></i>{{ $post->cat_name }}</a>
						<a class="mt-10 mb-30 color-ash" href=""><i class="mlr-10 ion-chevron-right"></i>
                        {{ str_limit($post->post_title, $limit=90) }}</a>
					</div>
                    @endforeach
					
                    @foreach($posts as $post)
					<div class="p-30 mb-30 card-view">
						@if(!empty($post->post_image))
						<img src="{{ asset('/images/backend_images/post_images/large/'.$post->post_image) }}" alt="{{ $post->post_title }}">
						@elseif(!empty($post->video_id))
						<iframe width="100%" height="350" src="https://www.youtube.com/embed/{{$post->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						@endif
						<h3 class="mt-30 mb-5"><b>{{ $post->post_title }}</b></h3>
						<ul class="list-li-mr-10 color-lite-black">
							<li><i class="mr-5 font-12 ion-clock"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
							<li><i class="mr-5 font-12 ion-android-person"></i>{{ $post->auth_name }}</li>
							<li><div class="fb-share-button" data-href="{{ url('/news/'.$post->post_url) }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></li>
							<li><div class="twitter-share-button"><a class="twitter-share-button" href="https://twitter.com/intent/tweet">Tweet</a></div></li>
						</ul>
						
						<div class="mt-30">{!! $post->post_content !!}</div>
						
						<div class="sided-half">
							<ul class="s-left ptb-5 list-btn-semiwhite sided-sm-center">
								<li><a href="{{ url('/category/'.$post->cat_url) }}">{{ $post->cat_name }}</a></li>
							</ul>
							<ul class="s-right sided-sm-center ptb-5 list-a-p-5 list-a-plr-10 font-11 color-ash">
								<li><div class="fb-share-button" data-href="{{ url('/news/'.$post->post_url) }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></li>
								<li><div><a class="twitter-share-button"href="https://twitter.com/intent/tweet">Tweet</a></div></li>
								<!-- <li><a href="#"><i class="ion-social-google"></i></a></li>
								<li><a href="#"><i class="ion-social-instagram"></i></a></li> -->
							</ul>
						</div><!-- sided-half -->
					</div><!-- card-view -->
					@endforeach

					<div class="p-30 mb-30 card-view">
						<h4 class="p-title"><b>RELATED POST</b></h4>
						<div class="row">
                            <?php $counter = 0; ?>
                            @foreach($allposts as $post)
							@if($post->post_type == 1)
                            @if ($loop->first) @continue @endif
                            <?php $counter ++; ?>
                            @if( $counter <= 3)
							<div class="col-sm-4 mb-sm-20">
								<img src="{{ asset('/images/backend_images/post_images/large/'.$post->post_image) }}" alt="{{ $post->post_title }}">
								<h5 class="mt-20"><a href="{{ url('/news/'.$post->post_url) }}"><b>{{ str_limit($post->post_title, $limit=50) }}</b></a></h5>
								<ul class="mtb-5 list-li-mr-20 color-lite-black">
									<li><i class="mr-5 font-12 ion-clock"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
									<!-- <li><i class="mr-5 font-12 ion-eye"></i>105</li> -->
								</ul>
							</div><!-- col-sm-4 -->
							@endif
							@endif
                            @endforeach
						</div><!-- row -->
					</div><!-- card-view -->

				</div><!-- col-sm-8 -->
				
				<div class="col-md-12 col-lg-4">
					<!-- START OF SIDEBAR MOST READ -->
					<div class="mb-30 p-30 card-view">
						<h4 class="p-title"><b>MOST READ</b></h4>
						<?php $counter = 0; ?>
                        @foreach($allposts as $post)
                        @if ($loop->first) @continue @endif
                        <?php $counter ++; ?>
                        @if( $counter <= 5)
						<div class="sided-80x mb-20">
							<div class="s-left">
								<img src="{{ asset('/images/backend_images/post_images/large/'.$post->post_image) }}" alt="{{ $post->post_title }}">
							</div><!-- s-left -->
							
							<div class="s-right">
								<h5><a href="{{ url('/news/'.$post->post_url) }}">
									<b>{{ str_limit($post->post_title, $limit=50) }}</b></a></h5>
								<ul class="mtb-5 list-li-mr-20 color-lite-black">
									<li><i class="mr-5 font-12 ion-clock"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
									<!-- <li><i class="mr-5 font-12 ion-eye"></i>105</li> -->
								</ul>
							</div><!-- s-left -->
						</div><!-- sided-80x -->
                        @endif
                        @endforeach
						
					</div><!-- card-view -->
					<!-- END OF SIDEBAR MOST READ -->
					
					<!-- START OF SIDEBAR BANNER-->
					<div class="plr-30 ptb-50 color-white pos-relative text-center bg-7">
						<div class="bg-layer-8">
							<h3><b>REAL ESTATE</b></h3>
							<p class="mb-15 mt-5 color-white">A perfect place to find your home residential real estate may 
								contain either a single family</p>
							<h6><a class="btn-fill-white btn-b-sm plr-10" href="#"><b>READ MORE</b></a></h6>
						</div><!-- banner-area -->
					</div><!-- banner-area -->
					<!-- END OF SIDEBAR BANNER-->
					
					<!-- START OF SIDEBAR NEWSLETTER -->
					<div class="mt-30 p-30 plr-40 card-view text-center">
						@if(Session::has('subscribe_message'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<strong>{!! session('subscribe_message') !!}</strong>
						</div>
						@endif
						<h4><b>NEWSLETTER</b></h4>
						<p>The best selling Magic-Magazine</p>
						<img class="mtb-20 max-w-100x mlr-auto" src="images/sidebar-profile-5-100x150.jpg" alt="">
						
						<form class="form-sm max-w-400x mlr-auto" method="post" name="subscribe_form" id="SubscribeForm" action="{{ url('/subscribe-now') }}">
						{{ csrf_field() }}
							<input type="email" name="email" placeholder="enter your email">
							<h6><button class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>SUBSCRIBE NOW</b></button></h6>
						</form>
					</div><!-- card-view -->
					<!-- END OF SIDEBAR NEWSLETTER -->
					
				</div><!-- col-sm-4 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>

@endsection