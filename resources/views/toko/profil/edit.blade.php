@extends('toko.default')

@section('content')
<div class="container ">
    <div class="card user-card-full">
        <div class="row m-l-0 m-r-0">
            <div class="col-sm-4 bg-c-lite-green user-profile">
                <div class="card-block text-center text-white" >
                <form action="{{route('toko_profile_update', encrypt($toko->id))}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" id="id" value="{{$toko->id}}">
                    <div class="m-b-25"> 
                        @if($toko->foto_toko)
                                <img class="profile-pic img-radius" name="foto_toko" src="{{asset('user/toko/'.$toko->id.'/foto_toko/'.$toko->foto_toko)}}" width=300 height=300/>
                            @else
                                <img class="profile-pic img-radius" src="/assets/logo-biru.png" width=300 height=300 />
                            @endif
                    </div>
                        <i class="fa fa-camera upload-button"> </i> 
                        <input class="file-upload" type="file" accept="image/*" name="foto_toko"/>
                        <p>Ubah Gambar</p>
                   
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informasi</h6>
                    
                        <div class="form-group">
                            <label for="username_toko">Username Toko</label>
                            <input type="text" class="form-control" id="username_toko" name="username_toko" value="{{$toko->username_toko}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Toko</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$toko->name}}">
                        </div>
                        <div class="form-group">
                            <label for="id_kota">Lokasi</label>
                            <select class="form-control" id="id_kota" name="id_kota" name="id_kota">
                            <option selected disabled>Pilih Kota</option>
                            @foreach ($kota as $k)
                                <option value="{{$k->id}}" @if($toko->id_kota == $k->id) selected @endif>{{$k->title}}</option>
                            @endforeach
                            </select> 
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    
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
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
        $(".file-upload").click();
        });
        });
    </script>
@endpush