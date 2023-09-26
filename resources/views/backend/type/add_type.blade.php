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

                            <h6 class="card-title">Add Property Type </h6>

                            <form method="POST" action="{{ route('store.type')}}" class="form-sample" >
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type Name </label>
                                    <input type="text"  name="type_name" class="form-control @error('type_name') is-invalid @enderror" >
                                     @error('type_name')
                                         <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type icon </label>
                                    <input type="text"  name="type_icon" class="form-control @error('type_icon') is-invalid @enderror" >
                                     @error('type_icon')
                                         <span class="text-danger">{{$message}}</span>
                                     @enderror
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
