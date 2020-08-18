<div class="header navbar" style="background: #007fa9">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a style="color: white" id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                    <i class="ti-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="notifications dropdown">
                <span class="counter bgc-red">
                    {{--  {{\DB::table('transaksis')
                    ->join('users', 'users.id', '=', 'tokos.id_users')
                    ->join('tokos', 'tokos.id', '=', 'transaksis.id_toko')
                    ->where('transaksis.id_toko', '=', 'tokos.id')
                    ->whereIn('transaksis.id_status',[3,6,8])->count()}}  --}}
                    {{$notif->count()}}

                </span>
                <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
                    <i style="color: white" class="ti-bell"></i>
                </a>

                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB">
                        <i style="color: white" class="ti-bell pR-10"></i>
                        <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                    </li>
                    <li>
                        @foreach($notif->take(3) as $n)
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                            <li>
                                <a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                                    
                                    <div class="peer peer-greed">
                                        @if(isset($n->id_status))
                                        <span>
                                            <span class="c-grey-600">{{$n->user->name}}<span class="text-dark"> {{$n->status->status}} </span>
                                            </span>
                                        </span>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        </ul>
                        @endforeach
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT">
                        <span>
                            <a href="{{route('toko_notif')}}" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications
                                <i class="ti-angle-right fsz-xs mL-10"></i>
                            </a>
                        </span>
                    </li>
                </ul>
            </li>
            <li class="notifications dropdown">
                <span class="counter bgc-blue">{{\DB::table('messages')->where('is_read', '=', '0')->count()}}</span>
                <a href="{{route('chat')}}" class="no-after">
                    <i style="color: white" class="ti-email"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="/images/avatar.png" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-grey-900">{{ Auth::user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    {{--<li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-settings mR-10"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-user mR-10"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-email mR-10"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>--}}
                    <li>
                        {{--<a href="/logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-power-off mR-10"></i>
                            <span>Logout</span>
                        </a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
