@extends('admin.default')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-dark float-left">Transfer Penjual</h1>
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
                            <th scope="col">Pesanan</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trans->sortby('id') as $index => $k)
                            <tr>
                                <td>{{$index+1}}.</td>
                                <td>
                                <div class="card card-2">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="sq align-self-center "> 
                                                <h6>Pembeli : {{$k->user->name}}</h6>
                                            </div>
                                            <div class="media-body my-auto text-right">
                                                
                                                <div class="row my-auto flex-column flex-md-row">
                                                    <div class="col my-auto">
                                                        <h6>Produk : {{$k->jenis->jenis}} </h6>
                                                    </div>
                                                    <div class="col my-auto"> 
                                                        <h6>Jumlah : {{$k->jumlah/1000}} kg</h6>
                                                    </div>
                                                    <div class="col my-auto"> 
                                                        <h6>Sub Total : Rp {{Number_format($k->subtotal)}}</h6>
                                                        <h6>Biaya Kirim : Rp {{Number_format($k->biaya_ongkir)}}</h6>
                                                    </div>
                                                    <div class="col my-auto">
                                                        <h6 class="mb-0"><h6>Total : </h6>Rp {{Number_format($k->total_harga)}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-3 ">
                                        <div class="row">
                                            <div class="col-md-3 mb-3"> 
                                                <img src="{{asset('user/toko/'.$k->toko->id.'/'.'foto_toko/'.$k->toko->foto_toko)}}" class="img-fluid img-thumbnail" alt="mallikan" style="width: 60px; height:60px; border-radius: 50%;">
                                                <h6> {{$k->toko->name}} </h6>
                                            </div>
                                            <div class="col-md-3 mb-2"> 
                                                <h6> Kode : {{$k->kode}}</h6><br>
                                                <h6> OVO Penjual : {{$k->toko->user->no_kontak}}</h6>
                                                
                                            </div>

                                            <div class="col-md-3 mb-3"> <h6> Tanggal : </h6> {{$k->updated_at->format('d-m-Y')}}</div>
     
                                            <div class="col-md-1 mx-4">
                                                <a class="btn btn-danger btn-sm py-3 px-4" role="button" aria-pressed="true" data-toggle="modal" data-target="#myModal{{$k->id}}" style="color:white">Transfer</a>
                                            </div>
                                            <div class="modal" id="myModal{{$k->id}}">

                                            <div class="modal-dialog">
                                                <form action="{{route('transfer_penjual', $k->id)}}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Transfer Penjual</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    <input type="text" value="{{$k->id_toko}}" style="display: none" name="id_toko">
                                                        <strong><h3>Apakah Anda yakin sudah transfer?</h3></strong>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Kode:</p>
                                                                <p>Penjual:</p>
                                                                <p>Jumlah:</p>
                                                                <p>OVO Penjual:</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                            @if(isset($k->kode))
                                                                <p>{{$k->kode}}</p>
                                                            @else
                                                                <p>Kode kosong</p>
                                                            @endif
                                                                <p>{{$k->toko->name}}</p>
                                                                <p>Rp {{Number_format($k->total_harga)}}</p>
                                                                <p>{{$k->toko->user->no_kontak}}</p>
                                                            </div>            
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Iya</button>
                                                        <button type="submit" class="btn btn-light close" data-dismiss="modal">Tidak</button>
                                                    </div>

                                                    </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
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

@push('scripts')
<script>
  $(document).ready(function() {    
    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('.profile-pic').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);
        $(".profile-pic").show();
      }
    }
    $(".foto_transfer").on('change', function(){
      readURL(this);
    });
    $(".upload-button").on('click', function() {
      $(".foto_transfer").click();
    });
  });
</script>
<script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
</script>
@endpush