@extends('layouts.admin')
@section('content')


    <div class="card" style="width: 100%;" id="content">

        <div class="card-header">
            <b>Complaints :</b>
            <div class="float-right">

            </div>
        </div>
        <div class="card-body">
            @include('inc.feedback')

            @if( count($complaints) >0 )

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Received</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Mark as Solved</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($complaints as $key => $complaint)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$complaint->created_at->diffForHumans()}}</td>
                            <td>{{$complaint->userName }}</td>
                            <td>{{$complaint->userEmail}}</td>
                            <td>{{$complaint->phoneNumber}}</td>
                            <td>{{$complaint->emailSubject}}</td>
{{--                            <td><span style="display: block;width: 100px;overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">{{$complaint->emailMessage}} </span><a href="javascript:void(0);" onclick="handleUpdate('{{$complaint->emailMessage}}')" >Continue reading</a></td>--}}
                            <td><span style="display: block;width: 100px;overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">{{$complaint->emailMessage}} </span><a href="javascript:void(0);" onclick="handleUpdate('{{$complaint->emailMessage}}')" data-toggle="modal" data-target="#readUpdateModal">Continue reading</a></td>

                            <td>
                                <form id="status" method="post" action="{{route('complaints.update',$complaint->id)}}">
                                    @csrf
                                    @method('put')
                                    <div class="input-group-text float-right" >
                                        <input  id="box" type="checkbox"  name="answered"  {{$complaint->status ? 'checked' :'' }}   onchange="this.form.submit()" >
                                    </div>


                                </form>
                            </td>
                            {{--                            <td>{{$complaint->answeredBy ==null?'Not set yet':$complaint->answeredBy}}</td>--}}
                            <td>
                                <div class="row">


                                    <div class="col">

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="handleDelete({{$complaint->id}})" >Delete</button>
                                    </div>


                                    {{--                                        {{$complaint->file}}--}}
                                </div>
                            </td>
                        </tr>
                        @if($complaint->answeredBy != null)
                            <tr >
                                <td colspan="9"> <small style="color: green">*This complaint was marked <b>{{$complaint->status == true?'solved':'unsolved'}}</b> by <b style="color:black;">{{$complaint->answeredBy}}</b> on <b style="color: red">{{$complaint->updated_at->format('d/m/Y | h:m:s')}}</b></small></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            @else
                <h3 class="text-center"> There Is No complaints Yet</h3>
            @endif

            {{--Update Compltaint Modal--}}
            <div class="modal fade" id="showReadModall" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel">User complaint Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold" id="msg"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--                        end of update modal--}}

            {{--Delete catalogue--}}
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form  method="post"   id="deleteComplaintForm" >
                        @csrf
                        @method('delete')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete complaint: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">Once deleted this complaint can not be recovered. How ever it is still accessible from your website official email. Do you wish to proceed! </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--                        end of Delete modal--}}

        </div>
        {{$complaints->links()}}
    </div>


@endsection
@section('scripts')
    <script>
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
                            url: "complaints/" +id,
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

            // var form = document.getElementById('deletecomplaintForm')
            // form.action =  'complaints/'+ id
            // $('#deleteModal').modal('show')
            // // alert(' current id is '+id);
        }


    </script>

@endsection
