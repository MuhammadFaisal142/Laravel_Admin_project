@extends('admin.admin')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            @if($authUser->role == 1)
                <ol class="breadcrumb">
                
                    <a href="{{ route('add.user') }}" class="btn btn-inverse-info">Add Users
                    </a>
                </ol>
            @else
                
            @endif
            
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">User List</h6>
        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        @if($authUser->role == 1 )
                                            <th style="width: 150px">Action</th>
                                         @else
                                            
                                        @endif 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            @if($authUser->role == 1)
                                                <td>
                                                    <a href="/user/edit/{{ $user->id }}/{{ $user->role }}" class="btn btn-inverse-warning">Edit</a>
                                                    <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
                                                </td>
                                            @else
                                                
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
@endsection
