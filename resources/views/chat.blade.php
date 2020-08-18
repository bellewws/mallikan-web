@extends('layouts.portal')
@section('content')

<div class="container">
    <div class="card rare-wind-gradient chat-room">
        <div class="card-body">
      
          <!-- Grid row -->
          <div class="row px-lg-2 px-2">
      
            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0">
      
              <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
                <ul class="users list-unstyled friend-list">
                    @foreach($users as $user)
                        <li class="user "  id="{{ $user->id }}" >
                            {{--will show unread count notification--}}
                                @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif
                           
                            <div class="media">
                                <div class="media-left">
                                    <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                </div>

                                <div class="media-body">

                                    <p class="name">{{ $user->name }}</p>
                                   
                                    <p class="name">{{ $user->toko }}</p>
                                   
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
              </div>
      
            </div>
            <!-- Grid column -->
      
            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">
      
              <div class="chat-message" id="messages">
      
                
              </div>
      
            </div>
            <!-- Grid column -->
      
          </div>
          <!-- Grid row -->
      
        </div>
      </div>
</div>
@endsection