@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('layouts.partials.messages')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('products.create')}}" class="btn btn-success">Add product</a>

                            <div class="card-tools">
                                <form class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="product_search" class="form-control float-right" value="{{request()->get('product_search')}}"
                                           placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Version</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->version}}</td>
                                    <td>
                                        <a class="btn btn-info rounded-circle btn-sm"
                                           href="">
                                            <i class="fas fa-folder"></i>
                                        </a>
                                        <a class="btn btn-info rounded-circle btn-sm"
                                           href="{{route('products.edit', $product->id)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button class="btn btn-info rounded-circle btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this product')"
                                                form="delete-product"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form action="{{route('products.destroy', $product->id)}}" method="post"
                                              id="delete-product">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-5">
                                {{$products->withQueryString()->links()}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection

