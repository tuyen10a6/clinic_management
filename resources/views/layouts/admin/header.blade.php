<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1"><a href="#" class="nk-nav-toggle nk-quick-nav-icon"
                                                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none"><a href="#" class="logo-link"><img
                        class="logo-light logo-img" src="" srcset=""
                        alt="logo"><img class="logo-dark logo-img" src=""
                                        srcset="" alt="logo-dark"></a></div>
            <div class="nk-header-search ms-3 ms-xl-0"><em class="icon ni ni-search"></em><input type="text"
                                                                                                 class="form-control border-transparent form-focus-none"
                                                                                                 placeholder="Search anything">
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown language-dropdown d-none d-sm-block me-n1"><a href="#"
                                                                                      class="dropdown-toggle nk-quick-nav-icon"
                                                                                      data-bs-toggle="dropdown">
                        </a>
                    </li>

                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1"
                           data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('statics/images/profile-default.png') }}" alt="Phạm Xuân Tuyển" style="border-radius: 50%; object-fit: cover; width: 100%; height: 100%">
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div
                                        class="user-status user-status-unverified">{{\Illuminate\Support\Facades\Auth::user()->permission}}</div>
                                    <div
                                        class="user-name dropdown-indicator">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <ul class="link-list-opt">
{{--                                <li><a href="{{route('doctor-update-view')}}"><span>Cập nhật thông tin</span></a></li>--}}
                                <li><a href="#"></em><span>Đổi mật khẩu</span></a></li>
                                <li>
                                    <form action="{{route('admin-logout')}}" method="post">
                                        @csrf
                                        <button class="btn" type="submit"><span>Đăng xuất</span></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
