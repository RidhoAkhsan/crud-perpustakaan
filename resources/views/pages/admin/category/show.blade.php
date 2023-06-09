@extends('layouts.parent')

@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Show Category Buku</h4>
        </div>
        <div class="card">
            <div class="card-body">

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Genre Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name" value="{{ $category->name }}" readonly>
                        </div>
                    </div>

                    <div class="text-center">
                        <a class="btn btn-success" href="{{ route('dashboard.category.index') }}">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </a>
                    </div>

            </div>
        </div>

    </div>
</div>
@endsection