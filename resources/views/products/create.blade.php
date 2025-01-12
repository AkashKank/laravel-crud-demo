@extends('products.layout')

@section('content')

<div class="row bg-red">
    <div class="col-lg-12 margin-tb d-flex">
        <div class="p-2">
            <h2>Add New Product</h2>
        </div>
        <div class="p-2">
            <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Details" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="col-x5-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection