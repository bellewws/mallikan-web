@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-dark float-left">Data User</h1>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="min-height: 800px; background-color: white; padding: 20px">
                <div class="x_content">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Kontak</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->sortby('id') as $index => $k)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td>{{$k->name}}</td>
                                <td>{{$k->email}}</td>
                                <td>{{$k->no_kontak}}</td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection