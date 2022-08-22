<div class="card card-info">
    <div class="card-header">

        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                   aria-controls="home" aria-selected="true">{{PRIMARY_LANGUAGE}}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile"
                   aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
            </li>
        </ul>

    </div>

    <form role="form" method="POST" action="{{route('admin.blog.store')}}"
          enctype="multipart/form-data">
        @csrf

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel"
                 aria-labelledby="home-tab">
                <div class="card-body">

                </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="card-body">

                </div>

            </div>
        </div>

        <div class="form-check">
            <div class="form-group col-md-6">

                <input class="form-check-input" type="radio" name="active_status"
                       value="{{STATUS_ACTIVE}}" checked="">
                <label class="form-check-label">Active</label>
                <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                   value="{{STATUS_INACTIVE}}">
                                            <label class="form-check-label">InActive</label>
                                            </span>
            </div>


            <div class="form-group col-md-6">
                <input class="form-check-input" type="checkbox" name="popular">
                <label class="form-check-label">Popular Blog</label>

            </div>
        </div>


        <div class="card-footer text-left">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
    <!-- /.card -->


</div>
