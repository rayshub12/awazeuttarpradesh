@extends('layouts.adminLayouts.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Recent Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Posts</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php $i = 0 ?>
              @foreach($posts as $post)
              @if( $i < 4 )
              <?php $i++ ?>
                <li class="item">
                  <div class="product-img">
                  @if(!empty($post->post_image))
                    <img src="{{ asset('/images/backend_images/post_images/large/'.$post->post_image) }}" alt="Product Image">
                  @elseif(!empty($post->video_id))
                    <iframe width="50" height="50" src="https://www.youtube.com/embed/{{$post->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  @endif
                  </div>
                  <div class="product-info">
                      <span class="product-description">{{ $post->cat_name }}</span>
                      <span class="label label-warning pull-right">{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                      <a target="_blank" href="{{ url('/news/'.$post->post_url) }}" class="product-title">{!! str_limit($post->post_title, $limit=150) !!}</a>
                  </div>
                </li>
              @endif  
              @endforeach  
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ url('/admin/posts') }}" class="uppercase">View All News</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection