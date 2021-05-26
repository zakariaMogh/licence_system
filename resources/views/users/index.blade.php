@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('layouts.partials.messages')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('users.create')}}" class="btn btn-success">Add user</a>

                            <div class="card-tools">
                                <form class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="user_search" class="form-control float-right"
                                           value="{{request()->get('user_search')}}"
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
                                    <th>Admin</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->is_admin)
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
                                               href="{{route('users.edit', $user->id)}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button class="btn btn-info rounded-circle btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user')"
                                                    form="delete-user"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form action="{{route('users.destroy', $user->id)}}" method="post"
                                                  id="delete-user">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-5">
                                {{$users->withQueryString()->links()}}
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

