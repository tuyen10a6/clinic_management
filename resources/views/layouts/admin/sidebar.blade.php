<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a>
                <img class="w-120px" src="{{asset('statics/images/logo-top.png')}}"/>
            </a>
        </div>
        <div class="nk-menu-trigger me-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                                              data-target="sidebarMenu">
            </a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu">
            </a></div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu simplebar-scrollable-y" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -16px 0px -40px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                 aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 16px 0px 40px;">
                                    <ul class="nk-menu">
                                        <li class="nk-menu-heading"><h6 class="overline-title text-primary-alt">Danh
                                                mục</h6></li>
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('admin.customer-advice.*') ? 'active' : '' }}"><a href="{{route('admin.customer-advice.index')}}" class="nk-menu-link"><span
                                                    class="nk-menu-icon">
                                                     </span><span
                                                    class="nk-menu-text">Quản lý lịch hẹn</span></a>
                                        </li>
                                        <li class="nk-menu-item p-0 pb-1 {{request()->routeIs('admin.quan-ly-lich-kham.*') ? 'active': ''}}"><a href="{{route('admin.quan-ly-lich-kham.index')}}" class="nk-menu-link"><span
                                                    class="nk-menu-icon">
                                                     </span><span
                                                    class="nk-menu-text">Quản lý khám bệnh</span></a>
                                        </li>
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('admin.doctor.schedule.*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.doctor.schedule.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"></span>
                                                <span class="nk-menu-text">Giờ làm việc các bác sĩ</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('dmin.ho-so-benh-an.*') ? 'active' : '' }}"><a href="{{route('admin.ho-so-benh-an.index')}}"
                                                                             class="nk-menu-link"><span
                                                    class="nk-menu-icon">
                                                    </span><span
                                                    class="nk-menu-text">Hồ sơ bệnh án bệnh nhân</span></a></li>
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('test-type.*') ? 'active' : '' }}">
                                            <a href="{{ route('test-type.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"></span>
                                                <span class="nk-menu-text">Danh mục xét nghiệm</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('medicines.*') ? 'active' : '' }}">
                                            <a href="{{ route('medicines.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"></span>
                                                <span class="nk-menu-text">Danh mục thuốc</span>
                                            </a>
                                        </li>
{{--                                        <li class="nk-menu-item p-0 pb-1"><a href=""--}}
{{--                                                                             class="nk-menu-link"><span--}}
{{--                                                    class="nk-menu-icon">--}}
{{--                                                </span><span--}}
{{--                                                    class="nk-menu-text">Các thủ thuật đang thực hiện</span></a></li>--}}
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('admin.chuyen-khoa.*') ? 'active' : '' }}"><a href="{{route('admin.chuyen-khoa.index')}}"
                                                                             class="nk-menu-link"><span
                                                    class="nk-menu-icon">
                                                </span><span
                                                    class="nk-menu-text">Quản lý chuyên khoa</span></a></li>
                                        <li class="nk-menu-item p-0 pb-1 {{ request()->routeIs('admin.doctor.*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.doctor.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"></span>
                                                <span class="nk-menu-text">Danh mục các bác sĩ</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item p-0 pb-1 {{request()->routeIs('admin.notification.*') ? 'active': ''}}">
                                            <a href="{{route('admin.notification.index')}}" class="nk-menu-link">
                                                <span class="nk-menu-icon"></span>
                                                <span class="nk-menu-text">Thông báo</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item p-0 pb-1">
                                            <a href="{{route('admin.report.index')}}" class="nk-menu-link">
                                                <span class="nk-menu-icon"></span>
                                                <span class="nk-menu-text">Xem BCTK phòng khám</span>
                                            </a>
                                        </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 289px; height: 1678px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                     style="height: 50px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>
</div>
</div>
