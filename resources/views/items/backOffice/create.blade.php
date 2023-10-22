@extends('layouts.admin')
@section('content')

    <h1>Item management</h1>
    <div class="container mt-5 ">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-3">
                <form method="POST" action="{{ route('itemsAdmin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="title">Title :</label>
                        <input type="text" name="title" class="form-control" >
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Description :</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="category">Category :</label>
                        <select name="category" class="form-control" >
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mt-3">
                        <label for="state">State :</label>
                        <select name="state" class="form-control" >
                            <option value="Good">Good</option>
                            <option value="Bad">Bad</option>
                            <option value="Medium">Medium</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="picture">Picture :</label>
                        <input type="file" name="picture" class="form-control" >
                        @error('picture')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div >
                        <button type="submit" class="btn btn-primary mt-5">Add New Item</button>
                    </div>
                </form>
            </div>
            <div class=" mt-3"></div>
            <div class=" mt-3"></div>
        </div>
    </div>
    </div>
    </div>
    <form id="delete-post-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

@endsection

