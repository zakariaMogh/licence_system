@extends('layouts.app')

@section('title', 'Clients')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
{{--                            <a href="{{route('clients.create')}}" class="btn btn-success">Add client</a>--}}

                            <div class="card-tools">
                                <form class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="client_search" class="form-control float-right"
                                           value="{{request()->get('client_search')}}"
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
                        <div class="card-body table-responsive p-0" >
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->company_name}}</td>
                                    <td>
                                        <a class="btn btn-info rounded-circle btn-sm"
                                           href="">
                                            <i class="fas fa-folder"></i>
                                        </a>
                                        <a class="btn btn-info rounded-circle btn-sm"
                                           href="">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-info rounded-circle btn-sm"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-5">
                                {{$clients->withQueryString()->links()}}
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

