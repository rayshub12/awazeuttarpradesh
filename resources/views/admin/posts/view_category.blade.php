@extends('layouts.adminLayouts.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Listed Categories</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-dismissible">
                        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif   
                @if(Session::has('flash_message_error')) 
                    <div class="alert alert-error alert-dismissible">
                        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                <div class="box box-purple">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>category Id</th>
                                  <th>category Image</th>
                                  <th>category Name</th>
                                  <th>Parent</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($category as $cat)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img width="60px" class="thumb" src="{{ asset('/images/backend_images/category_images/large/'.$cat->category_image)}}"></td>
                                    <td><a target="_blank" href="{{ url('/category/'.$cat->category_url) }}">{{ $cat->category_name }}</a></td>
                                    <td>{{ $cat->parent_cat }}</td>
                                    <td>{{ date('M d, Y', strtotime($cat->created_at)) }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#{{ $cat->id }}" data-toggle="modal" class="btn btn-success btn-xs">View</a>
                                        <a class="btn btn-warning btn-xs">Edit</a>
                                        <a class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>

                                <!-- Property Information Model -->
                                <div class="modal fade bs-example-modal-lg" id="{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="propertyView">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content row">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">{{ $cat->category_name }} | Full Details</h4>
                                            </div>
                                            <div class="modal-body col-sm-12">
                                                <div class="col-sm-6">
                                                    @if(!empty($cat->category_image))
                                                    <img width="320" class="img-responsive" src="{{ asset('/images/backend_images/category_images/large/'.$cat->category_image)}}">
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><strong>Description:</strong> {!! str_limit($cat->daescription, $limit=80) !!}</p>
                                                    <p><strong>Parent:</strong> {{ $cat->parent_cat }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. post information Model -->
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>category Id</th>
                                    <th>category Image</th>
                                    <th>category Name</th>
                                    <th>Parent</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection