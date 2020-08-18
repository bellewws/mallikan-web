@extends('toko.default')

@section('content')
<div class="container" style="background:white; border-radius: 8px; padding: 20px; height: 100px">
    <h3 style="color: black">Profil Toko</h3>
</div>
<br>
<div class="container ">
    <div class="card user-card-full">
        <div class="row m-l-0 m-r-0">
            <div class="col-sm-4 bg-c-lite-green user-profile">
                <div class="card-block text-center text-white">
                    <div class="m-b-25"> 
                        @if($toko->foto_toko)
                        <img class="img-radius" name="foto_toko" width=300 height=300 src="{{asset('user/toko/'.$toko->id.'/foto_toko/'.$toko->foto_toko)}}"/>
                        @else
                        <img class="img-radius" src="/assets/logo-biru.png" width=300 height=300 />
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informasi</h6>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">UsernameToko</p>
                            <h6 class="text-muted f-w-400">{{$toko->username_toko}}</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Nama Toko</p>
                            <h6 class="text-muted f-w-400">{{$toko->name}}</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Asal Toko</p>
                            {{--<h6 class="text-muted f-w-400">{{$kota->title}}</h6>--}}
                        </div>
                    </div>
                    <br>
                    <h6>  <a href="{{route('toko_profil_edit', encrypt($toko->id))}}" class="btn btn-success btn-sm" role="button"> Edit Profil Toko</a> </h6>
                    
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