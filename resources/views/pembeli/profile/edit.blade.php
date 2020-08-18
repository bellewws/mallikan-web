@extends('layouts.portal')

@section('content')
@include('layouts.sidenav')
<section class="ftco-section2 d-flex justify-content-center">
    <div class="col-xl-8 col-md-12">
        <div class="card user-card-full">
            <div class="row m-l-0 m-r-0">
                <div class="col-sm-4 bg-c-lite-green user-profile">
                    <div class="card-block text-center text-white">
                        <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                        <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                        <p></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <div class="mT-30">
                            <form action="{{route('pembeli_profile_update',encrypt($user->id))}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{ method_field('PUT') }}
                                    <input type="hidden" name="id" id="id" value="{{$user->id}}">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                    name="name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                    name="email" value="{{$user->email}}" >
                                </div>
                                <div class="form-group">
                                    <label for="no_kontak">Nomor Kontak</label>
                                    <input type="text" class="form-control" id="no_kontak" name="no_kontak" value="{{$user->no_kontak}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection