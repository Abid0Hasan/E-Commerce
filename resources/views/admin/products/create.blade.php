@extends('admin.app')
@section('title') Product Create @endsection
@section('content')

    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add New Products
                            <br>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label"> Product Name</label>
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label"> Product Description</label>
                                    <textarea name="description" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label"> Product Price</label>
                                <div class="form-line">
                                    <input type="number" id="price" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image">
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.products.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
        <!-- Horizontal Layout -->


@endsection
