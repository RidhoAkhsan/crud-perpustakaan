@extends('layouts.parent')

@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Create Category Buku</h4>
        </div>
        <div class="card">
            <div class="card-body">



                <form method="post" action="{{ route('dashboard.category.index') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <a href="{{ route('dashboard.category.index') }}" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Genre Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name" value="">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection