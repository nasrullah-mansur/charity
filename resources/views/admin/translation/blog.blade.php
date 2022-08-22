@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Translation')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">{{allSettings('pl') ? allSettings('pl') : PRIMARY_LANGUAGE }}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile"
                                       aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
                                </li>
                            </ul>

                        </div>

                        <form role="form" method="POST" action="{{route('admin.translation.blog.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Header <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_blog_page_title"
                                                           id="pl_blog_page_title " value="{{ $tran['pl_blog_page_title'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Category Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_post_categories"
                                                           id="pl_post_categories " value="{{ $tran['pl_post_categories'] }}"  required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Side post Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_popular_post"
                                                           id="pl_popular_post " value="{{ $tran['pl_popular_post'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Tag Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_post_tag"
                                                           id="pl_post_tag " value="{{ $tran['pl_post_tag'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Search Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_search_keywords"
                                                           id="pl_search_keywords " value="{{ $tran['pl_search_keywords'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Others <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_blog_details" value="{{ $tran['pl_blog_details'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_related_blog" value="{{ $tran['pl_related_blog'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_author"  value="{{ $tran['pl_author'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_comment_here" value="{{ $tran['pl_comment_here'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_comment" value="{{ $tran['pl_comment'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_created_on"  value="{{ $tran['pl_created_on'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Header <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_blog_page_title"
                                                           id="sl_blog_page_title " value="{{ $tran['sl_blog_page_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Category Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_post_categories"
                                                           id="sl_post_categories " value="{{ $tran['sl_post_categories'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Side post Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_popular_post"
                                                           id="sl_popular_post " value="{{ $tran['sl_popular_post'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Tag Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_post_tag"
                                                           id="sl_post_tag " value="{{ $tran['sl_post_tag'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Search Section <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_search_keywords"
                                                           id="sl_search_keywords " value="{{ $tran['sl_search_keywords'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Others <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_blog_details" value="{{ $tran['sl_blog_details'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_related_blog" value="{{ $tran['sl_related_blog'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_author"  value="{{ $tran['sl_author'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_comment_here" value="{{ $tran['sl_comment_here'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_comment" value="{{ $tran['sl_comment'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_created_on"  value="{{ $tran['sl_created_on'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="card-footer text-left">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>

                        <!-- form end -->
                        <!-- /.card -->


                    </div>

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection
