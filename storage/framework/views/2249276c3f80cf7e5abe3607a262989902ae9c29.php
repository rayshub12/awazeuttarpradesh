<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Post</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <?php if(Session::has('flash_message_success')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        <strong><?php echo session('flash_message_success'); ?></strong>
                    </div>
                <?php endif; ?>
                <?php if(Session::has('flash_message_error')): ?>
                <div class="alert alert-error alert-dismissible">
                    <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    <strong><?php echo session('flash_message_error'); ?></strong>
                </div>
                <?php endif; ?>
                <div class="box box-purple">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="<?php echo e(url('/admin/edit-post/'.$postdetails->id)); ?>" enctype="multipart/form-data" name="edit_post" id="edit_post" novalidate="novalidate">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-sm-12 col-lg-9">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="Post Title">Post Title</label>
                                            <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo e($postdetails->post_title); ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Post Url</span>
                                                <input type="text" name="post_url" id="post_url" class="form-control" value="<?php echo e($postdetails->post_url); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label for="Description">Description</label>
                                                <textarea name="description" id="description" class="form-control my-editor"><?php echo e($postdetails->post_content); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Allow Comments</label>
                                            <select name="allow_comment" id="allow_comment" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option <?php if($postdetails->comment_status=='1'): ?> selected <?php endif; ?> value="1">Yes</option>
                                                <option <?php if($postdetails->comment_status=='0'): ?> selected <?php endif; ?> value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- /.box-header -->
                                          <div class="box-group" id="accordion">
                                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                            <div class="panel">
                                              <div class="box-header with-border">
                                                <h4 class="box-title">
                                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                                                   <b>+</b> SEO
                                                  </a>
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="Post Title">Meta Title</label>
                                                        <input type="text" name="meta_title" id="post_title" class="form-control" value="<?php echo e($postdetails->meta_title); ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="Post Title">Meta Keywords</label>
                                                        <textarea name="meta_keyword" id="meta_keywords" class="form-control"><?php echo e($postdetails->meta_keyword); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="Post Title">Meta Description</label>
                                                        <textarea name="meta_description" id="meta_description" class="form-control"><?php echo e($postdetails->meta_description); ?></textarea>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                        <!-- /.box-body -->
                                     
                                      <!-- /.box -->
                                    </div>
                                </div>
                                
                                

        
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Post Type</label>
                                            <select name="post_type" id="blog_post_type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option <?php if($postdetails->post_type=='1'): ?> selected <?php endif; ?> value="1">Standerd (Image/Text)</option>
                                                <option <?php if($postdetails->post_type=='2'): ?> selected <?php endif; ?> value="2">Video Post</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <input name="feature_post" id="feature_post" type="checkbox" class="flat-green" <?php if($postdetails->feature_post=='1'): ?> checked <?php endif; ?> value="1"> Featured  <small class="text-purple pl-1">( If you check this set Featured Post )</small>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-12 <?php if($postdetails->post_type == 1): ?> hidden <?php else: ?> show <?php endif; ?>" id="YoutubeVideoId">
                                        <div class="form-group">
                                            <label for="Video ID">Video ID</label>
                                            <input name="video_id" id="video_post" type="text" class="form-control" value="<?php echo e($postdetails->video_id); ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Post Category</label>
                                            <select name="post_category" id="post_category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php echo $category_dropdown; ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                        <label>Country</label>
                                        <select name="country" id="country" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <?php if(!empty($country_dropdown)): ?>
                                            <?php echo $country_dropdown; ?>
                                        <?php else: ?>
                                            <option value="" selected>Select Country</option>
                                            <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($country); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                        <label for="State">State</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="state" id="state" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php if(!empty($state_dropdown)): ?>
                                                <?php echo $state_dropdown; ?>
                                            <?php else: ?>
                                                <option value selected>Select State</option>
                                            <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                        <label for="City">City</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="city" id="city" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php echo $city_dropdown; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="form-group btn-justify">
                                            <input type="submit" class="btn btn-info btn-md btn-block" value="Publish">
                                        </div>
                                    </div>

                                    <!-- <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="Post Image">Featured Image</label>
                                            <input type="file" name="featured_image" id="featured_image">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                    </div> -->
                                    
                                </div>
                            </div> <!-- Rows -->
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/brj9ibrcb139/resources/views/admin/posts/edit_post.blade.php */ ?>