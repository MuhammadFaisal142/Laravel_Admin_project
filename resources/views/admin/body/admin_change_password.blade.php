@extends('admin.admin')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="page-content">
{{-- {{dd(profileData)}} --}}

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            {{-- <h6 class="card-title mb-0">About</h6> --}}

                            <div>
                                <div>
                                    @if(!empty($profileData->photo))
                                        <img class="wd-100 rounded-circle" src="/upload/admin_images/{{ $profileData->photo }}" alt="profile">
                                    @else
                                        <img class="wd-100 rounded-circle" src="/upload/admin_images/no_image.jpg" alt="profile">
                                    @endif
                                  
                                </div>
                                
                                <span class="h4 ms-3 ">{{$profileData->name}}</span>
                            </div>


                        </div>
                    
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">User Name:</label>
                            <p class="text-muted">{{$profileData->username}}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{$profileData->email}}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{$profileData->phone}}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{$profileData->address}}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Admin Change Password</h6>

                            <form method="POST" action="{{ route('admin.update.password')}}" class="form-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Old Password</label>
                                    <input type="password"  name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                                     @error('old_password')
                                         <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">New Password</label>
                                    <input type="password"  name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                                     @error('new_password')
                                         <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
                                    <input type="password"  name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">
                                    
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
