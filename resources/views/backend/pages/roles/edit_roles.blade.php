@extends('admin.admin')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Roles </h6>

                            <form method="POST" action="{{route('update.roles')}}" class="form-sample" >
                                @csrf
                                <input type="text" name="id" value="{{$role->id}}" hidden>
                                    <div class="form-group mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Roles Name </label>
                                        <input type="text"  name="role_name" class="form-control"  value="{{$role->name}}">
                                    </div>

                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>

    <!-- partial:../../partials/_footer.html -->
    <footer
        class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
        <p class="text-muted mb-1 mb-md-0">Copyright Â© 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.
        </p>
        <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
    </footer>
    <!-- partial -->

    </div>
    </div>

@endsection
