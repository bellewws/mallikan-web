@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12" style="margin-left:15px">
                <h1 class="text-dark float-left">Data Toko</h1>
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
                                <th scope="col">Foto Toko</th>


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($toko->sortby('id') as $index => $k)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td>{{$k->name}}</td>
                                <td>{{$k->user->email}}</td>
                                <td>{{$k->user->no_kontak}}</td>
                                <td><img src="{{asset('user/toko/'.$k->id.'/'.'foto_toko/'.$k->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 60px; height:60px; border-radius: 50%;">
</td>

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