@extends('admin.master')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 ">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary"><h3 class="text-center font-weight-light my-4">Edit Product Form</h3></div>
                    <div class="card-body">
                        <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name"  value="{{$product ->name }}" id="productName" type="text"/>
                                <label for="productName">Product Name</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"  value="{{$product ->category_name }}" name="category_name" id="inputFirstName" type="text"/>
                                        <label for="inputFirstName">Category name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" name="brand_name" value="{{$product ->brand_name }}" id="inputLastName" type="text"  />
                                        <label for="inputLastName">Brand name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="text" name="description" value="{{$product ->description }}" class="form-control" >
                                    <label for="inputPassword">description</label>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset ($product->image)}}" class="img-fluid" style="width:80px;height:50px;border-radius:50%;" alt="">
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary">Submit</button></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection