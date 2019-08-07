<?php 

	use App\Http\Controllers\Controller;
	$posts = Controller::footerNews();
	$catname = Controller::footerCat();

?>

<footer class="bg-191 pos-relative color-ccc bg-dark-primary pt-50">
		<div class="abs-tblr pt-50 z--1 text-center">
			<div class="h-80 pos-relative"><div class="bg-map abs-tblr opacty-1"></div></div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-4 col-sm-4">	
					<h5 class="f-title"><b>CATEGORIES</b></h5>
					<ul class="mb-30 list-hover list-block list-a-ptb-5">
						@foreach($catname as $cn)
						<li><a href="{{ url('/category/'.$cn->category_url) }}">{{ $cn->category_name }}</a></li>
						@endforeach
					</ul>
				</div><!-- col-sm-2 -->
				
				<div class="col-lg-4 col-md-8 col-sm-8">	
					<div class="pl-10 pl-sm-0">	
						<h5 class="f-title"><b>FEATURED VIDEO</b></h5>
						
						<?php $counter = 0; ?>
						@foreach($posts as $post)
						@if($post->post_type == 2)
						<?php $counter++; ?>
						@if($counter <= 2)
						<div class="sided-80x mb-30">
							<a class="s-left" href="#">
								@if(!empty($post->post_image))
                                <td><img width="60px" class="thumb" src="{{ asset('/images/backend_images/post_images/large/'.$post->post_image) }}"></td>
                                @elseif(!empty($post->video_id))
                                <td><iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$post->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                @endif
								<!-- <div class="hover-video sm"><span class="icon"><i class="ion-play"></i></span></div> -->
							</a><!-- s-left -->
							
							<div class="s-right pl-10 mb-30 ">
								<h5><a href="#"><b>{{ str_limit($post->post_title, $limit=50) }}</b></a></h5>
								<ul class="mtb-5 list-li-mr-20 color-ash">
									<li><i class="mr-5 font-12 ion-clock color-white"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
									<!-- <li><i class="mr-5 font-12 ion-eye color-white"></i>105</li> -->
								</ul>
							</div><!-- s-left -->
						</div><!-- sided-80x -->
						@endif
						@endif
						@endforeach
					</div><!-- pl-10 -->
				</div><!-- col-sm-4 -->
				
				
				
				<div class="col-lg-4 col-md-8 col-sm-8">		
					<div class="pr-10 pr-sm-0">	
						<h5 class="f-title"><b>LATEST NEWS</b></h5>
						<?php $counter=1; ?>
						@foreach($posts as $post)
						@if($post->post_type == 1)
						@if($counter <= 2 )
							<div class="sided-80x mb-30">
								<a class="s-left" href="#">
									<img src="{{ url('images/backend_images/post_images/large/'.$post->post_image) }}" alt="">
									<!--<div class="hover-video sm"><span class="icon"><i class="ion-play"></i></span></div>-->
								</a><!-- s-left -->
								
								<div class="s-right pl-10">
									<h5><a href="#"><b>{{ str_limit($post->post_title, $limit=50) }}</b></a></h5>
									<ul class="mtb-5 list-li-mr-20 color-ash">
										<li><i class="mr-5 font-12 ion-clock color-white"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</li>
										<!-- <li><i class="mr-5 font-12 ion-eye color-white"></i>105</li> -->
									</ul>
								</div><!-- s-left -->
							</div><!-- sided-80x -->
							<?php $counter++ ; ?>		
						@endif
						@endif
						@endforeach

					</div><!--pr-10 -->
				</div><!-- col-sm-4 -->

				<div class="col-lg-2 col-md-4 col-sm-4">	
						<h5 class="f-title"><b>Contact us</b></h5>
						<ul class="mb-30 list-hover list-block list-a-ptb-5">
							<li><b>फ़ोन: </b>9041601115</li>
							<li><b>पता: </b>A-3/172 पत्रकारपुरम क्रॉसिंग रोड, विधायक पुरम, विनय खंड 3, गोमती नगर, लखनऊ उत्तर प्रदेश 226010</li>
							
						</ul>
					</div><!-- col-sm-2 -->
				
			</div><!-- row -->
			
			<div class="text-center">
				<div class="row">
					<div class="col-sm-3">
						<a class="mtb-10 logofooter" href="#"><img src="{{ url('images/frontend/images/logo-black.jpg')}}" alt=""></a>
					</div><!-- col-sm-3 -->
					
					<div class="col-sm-5">
                            <p class="text-md-center font-9 pt-5 mtb-5"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright © <script>document.write(new Date().getFullYear());</script>2019 | All rights reserved 
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p><p class="font-7 pt-5">
							<a href="{{ url('privacy-policy') }}">Privacy policy</a> | <a href="{{ url('terms') }}">Terms &amp; condition</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
					<div class="col-sm-4">
						<ul class="mtb-10 font-12 list-radial-35 list-li-mlr-3">
							<li><a href="https://www.facebook.com/Awaze-UttarPradesh-2252636938165590/"><i class="ion-social-facebook"></i></a></li>
							<li><a href="
https://www.linkedin.com/company/awazeuttarpradesh/"><i class="ion-social-linkedin"></i></a></li>
							<li><a href="https://pinterest.com/awazeuttarpradesh/"><i class="ion-social-pinterest"></i></a></li>
							<li><a href="#"><i class="ion-social-google"></i></a></li>
							<li><a href="#"><i class="ion-social-rss"></i></a></li>
						</ul>
					</div><!-- col-sm-3 -->
				</div><!-- row -->
			</div><!-- text-center -->
		</div><!-- container -->
    </footer><!-- footer end -->