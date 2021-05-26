@extends('layouts.app')

@section('title', 'Licences')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('licences.create')}}" class="btn btn-success">Add licence</a>

                            <div class="card-tools">
                                <form class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="licence_search" class="form-control float-right"
                                           value="{{request()->get('licence_search')}}"
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
                                    <th>Product</th>
                                    <th>Serial key</th>
                                    <th>Ending date</th>
                                    <th>Demo</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($licences as $licence)
                                    <tr>
                                        <td>{{$licence->id}}</td>
                                        <td>{{$licence->product->name}}</td>
                                        <td>{{$licence->serial_key}}</td>
                                        <td>{{$licence->days}}</td>
                                        <td>
                                            @if($licence->is_demo)
                                                <span class="fas fa-check text-success"></span>
                                            @else
                                                <span class="fas fa-times text-danger"></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($licence->is_active)
                                                <span class="fas fa-check text-success"></span>
                                            @else
                                                <span class="fas fa-times text-danger"></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info rounded-circle btn-sm"
                                               href="">
                                                <i class="fas fa-folder"></i>
                                            </a>
                                            <a class="btn btn-info rounded-circle btn-sm"
                                               href="{{route('licences.edit', $licence->id)}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button class="btn btn-info rounded-circle btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this licence')"
                                                    form="delete-licence"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form action="{{route('licences.destroy', $licence->id)}}" method="post"
                                                  id="delete-licence">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-5">
                                {{$licences->withQueryString()->links()}}
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

