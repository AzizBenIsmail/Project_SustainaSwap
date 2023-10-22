@extends('layouts.admin')
@section('css')
    #user_profile_image {
    width: 25px;
    height:25px;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
    }
@endsection
@section('content')
<div class="card card-default" id="content">
    <div class="card-header">
        <b>Users: There {{ count($users) > 1 ? 'are' : 'is' }}</b>
        <span style="color: red; font-size: 1.2em;">{{ count($users) }}</span>
        <b>Registered Users On This Page</b>
        <a class="btn btn-success btn-sm float-end" href="{{ route('users.create') }}">Add User</a>    </div>
    <div class="card-body">
        @include('inc.feedback')

        <table class="table table-striped">
            @if(count($users)> 0)
                <thead >
                <th>Image</th>
                <th> User Name</th>
                <th> User Email</th>
                <th> User Role</th>
                <th>Actions</th>
                </thead>
                @foreach($users as $user)

                    <tbody>
                    <tr>
                        <td>

                            <img src="{{ asset('storage/profile_pictures/' . $user->image) }}" alt="User Image" id="user_profile_image">

                        </td>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td> <div class="badge rounded-pill bg-primary">{{$user->role->roleName}}</div></td>
                        <td>
                            <div class="row">

                                    @if(auth()->user()->isAdmin())
                                        <div class="col">
{{--                                    <a href="{{route('admin.view-user-profile',$user->id)}}" class="btn btn-primary btn-sm" >View Profile</a>--}}
                                    <a href="" class="btn btn-cyan btn-sm text-white" >View Profile</a>
                                          </div>
                                                            @if($user->isSuperAdmin())
                                                               <div class="col">
                                                                <button class="btn btn-success btn-sm" disabled>Owner</button>
                                                                </div>
                                                                @elseif($user->isAdmin() )


                                                                                @if(auth()->user()->isSuperAdmin())
                                                                                <div class="col">

                                                                                            <button type="submit" class="btn btn-warning btn-sm" onclick="revokeAdminPrivileges({{$user->id}})">Revoke Privileges</button>
                                                                                </div>
                                                                                    @else
                                                                                            <div class="col">
                                                                                           <button class="btn btn-success btn-sm" disabled>Administrator</button>
                                                                                            </div>

                                                                                    @endif

                                                                @else
{{--                                                                    if user is not admin or super admin--}}

                                                                    <div class="col">
                                                                        <button type="submit" class="btn btn-dark btn-sm" onclick="makeAdmin({{$user->id}})">Make Admin</button>
                                                                    </div>













                                                            @endif

                                                                                        @if(auth()->user()->isAdmin())
                                                                                                        @if($user->isUser())
                                                                                                <div class="col">

                                                                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="handleDelete({{$user->id}})">Delete User</button>

                                                                                                </div>
                                                                                                        @endif
                                                                                        @endif


                    @endif


                            </div>
                        </td>





                    </tr>
                    @endforeach
                    </tbody>


        </table>
        @else
            <h3 class="text-center">No Users found</h3>

        @endif
        <div class="row justify-content-between mt-3" id="pagination">
            <div id="requestingParty-pagination" class="col-md-6">
                <span>Showing {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} entries</span>
            </div>
            <div class="col-md-6 float-end"> <!-- Use 'text-end' to right-align content within this column -->
                {{$users->links()}}
            </div>
        </div>



    </div>
</div>
@endsection

@section('scripts')
    <script>

        $(document).ready(function() {
            setTimeout(function() {
                $("#success-alert").fadeOut(1000);
            }, 5000);
        });

        function handleUpdate($message) {
            Swal.fire($message);

        }
        function handleDelete(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: id+'/deleteUser',
                        dataType: 'json',
                        success: function (res) {
                            if (res.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: res.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#content").load(" #content");
                            } else {
                                console.log("In success");
                                console.log(res);
                            }
                        },
                        error: function (res) {
                            console.log("in error");
                            console.log(res);
                        }
                    });
                }
            })

        }

        function revokeAdminPrivileges(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Revoke Admin Privileges!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: id+'/revokeAdminPrivileges',
                        dataType: 'json',
                        success: function (res) {
                            if (res.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: res.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#content").load(" #content");
                            } else {
                                console.log("In success");
                                console.log(res);
                            }
                        },
                        error: function (res) {
                            console.log("in error");
                            console.log(res);
                        }
                    });
                }
            })

        }

        function makeAdmin(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Grant Admin Privileges!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: id+'/grantAdminPrivileges',
                        dataType: 'json',
                        success: function (res) {
                            if (res.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: res.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#content").load(" #content");
                            } else {
                                console.log("In success");
                                console.log(res);
                            }
                        },
                        error: function (res) {
                            console.log("in error");
                            console.log(res);
                        }
                    });
                }
            })

        }



    </script>

@endsection

