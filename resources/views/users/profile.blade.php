@section('css')

@endsection
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">My Profile <a class="btn btn-secondary float-end mr-1  btn-sm " href="#" id="goBackLink"> Go Back</a></div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="role"> Your role : </label>
                    <input  id="role" type="text" class="form-control form-control-lg is-valid"  name="role"  value="{{$user->role->roleName}}" disabled >
                </div>
                <div class="col-md-5 mb-3">
                    <label for="email">Email : </label>
                    <input  id="email" type="email" class="form-control form-control-lg is-valid"  name="email"  value="{{$user->email}}" disabled >
                </div>


                <div class="col-md-8 mb-3">
                    <form  action="{{route('user.update-profile-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')



                        <label for="upload">Profile Image :</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <div class="custom-file">

                                    <input type="file" name="image" class="custom-file-input {{$errors->has('image')==true?'is-invalid':'is-valid'}} " id="upload">
                                    @if ($errors->has('image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @else
                                        <div class="valid-feedback">
                                            Choose an image that shows your face clearly
                                        </div>
                                    @endif
                                    <label class="custom-file-label" for="upload">Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <button type="submit " class="btn btn-outline-dark ">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <form class="needs-validation"  action="{{route('user.update-profile')}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label for="name">Username :</label>
                        <input class="form-control {{ isset($user->name) ? 'is-valid': 'is-invalid'}}" name="name" id="name" value="{{$user->name}}" >
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @else
                            {{--                            <div class="valid-feedback">--}}
                            {{--                                perfect!--}}
                            {{--                            </div>--}}
                        @endif
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control  {{ isset($user->firstName) ? 'is-valid': 'is-invalid'}}" name="firstName" id="firstName" value="{{ isset($user->firstName) ? $user->firstName:old('firstName')}}"  >
                        @if ($errors->has('firstName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstName') }}
                            </div>

                        @endif
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control {{ isset($user->lastName) ? 'is-valid': 'is-invalid'}}" name="lastName" id="lastName" value="{{ isset($user->lastName) ? $user->lastName:old('lastName')}}" >
                        @if ($errors->has('lastName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastName') }}
                            </div>

                        @endif
                    </div>



                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">

                        <label for="gender">Gender</label>
                        <select class="select2 form-select shadow-none select2-hidden-accessible {{ isset($user->gender) ? 'is-valid': 'is-invalid'}}" id="gender" name="gender">
                            @if(!isset($user->gender))
                                <option selected disabled value="">Choose...</option>
                                <option value="Mr." >Male</option>
                                <option value="Ms." >Female</option>

                            @else
                                <option selected disabled value="">Choose...</option>
                                <option value="Mr." {{ $user->gender =="Mr." ? 'selected':''}}>Male</option>
                                <option value="Ms."{{ $user->gender =="Ms." ? 'selected':''}}>Female</option>
                            @endif
                        </select>
                        @if ($errors->has('gender'))
                            <div class="invalid-feedback">
                                {{ $errors->first('gender') }}
                            </div>

                        @endif

                    </div>

                    <div class="col-md-4 mb-9">
                        <label for="birthDate">Birthdate</label>
                        <div class="input-group">
                            <input type="text" class="date form-control {{ isset($user->birthDate) ? 'is-valid': 'is-invalid'}}" id="birthDate" placeholder="yyyy/dd/mm" name="birthDate" value="{{ isset($user->birthDate) ? $user->lastName:old('birthdate')}}">
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                            </div>

                        @if ($errors->has('birthDate'))
                            <div class="invalid-feedback">
                                {{ $errors->first('birthDate') }}
                            </div>
                        @else
                            {{--                            <div class="valid-feedback">--}}
                            {{--                               Plz make sure you birthdate is correct--}}
                            {{--                            </div>--}}
                        @endif

                    </div>


                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control  {{ isset($user->address) ? 'is-valid': 'is-invalid'}}" name="address" id="address" value="{{ isset($user->address) ? $user->address:old('address')}}" >
                        @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @else
                            {{--                            <div class="valid-feedback">--}}
                            {{--                                perfect!--}}
                            {{--                            </div>--}}
                        @endif
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="phone">Phone number :</label>
                        <div class="input-group">
                            <span class="input-group-text ">+216</span>
                            <input  type="number" class="form-control {{ isset($user->phoneNumber) ? 'is-valid': 'is-invalid'}}"name="phoneNumber" id="phone" value="{{ isset($user->phoneNumber) ? $user->phoneNumber:old('phoneNumber')}}" maxlength="8">
                            @if ($errors->has('phoneNumber'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phoneNumber') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-success">Update Profile</button>
            </form>


        </div>
    </div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script>

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


            $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });

            document.getElementById('goBackLink').addEventListener('click', function(e) {
            e.preventDefault();
            history.back(); // This will take the user back to the last visited page.
        });


    </script>
@endsection
