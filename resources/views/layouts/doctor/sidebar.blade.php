<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a>
                <img class="w-120px" src="{{asset('statics/images/logo-top.png')}}"/>
            </a>
        </div>
        <div class="nk-menu-trigger me-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                                              data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a><a
                href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a></div>
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
                                        <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span
                                                    class="nk-menu-icon">
                                                    <em class="icon ni ni-calendar-alt-fill"></em>
                                                     </span><span
                                                    class="nk-menu-text">Quản lý lịch khám</span></a></li>
                                        <li class="nk-menu-item"><a href="{{route('doctor-schedule-view')}}"
                                                                    class="nk-menu-link"><span class="nk-menu-icon">
                                                   <em class="icon ni ni-clock-fill"></em>
                                                </span><span
                                                    class="nk-menu-text">Cập nhật giờ làm việc</span></a></li>
                                        <li class="nk-menu-item"><a href="{{route('patient.index')}}" class="nk-menu-link"><span
                                                    class="nk-menu-icon">
                                                    <em class="icon ni ni-file"></em>
                                                    </span><span
                                                    class="nk-menu-text">Hồ sơ bệnh nhân</span></a></li>
{{--                                        <li class="nk-menu-item"><a href="#"--}}
{{--                                                                    class="nk-menu-link"><span class="nk-menu-icon"><em--}}
{{--                                                        class="icon ni ni-growth-fill"></em></span><span--}}
{{--                                                    class="nk-menu-text">Chỉ định cận lâm sàng</span></a></li>--}}
                                        <li class="nk-menu-item"><a href="#"
                                                                    class="nk-menu-link"><span class="nk-menu-icon">
                                                    <em class="icon ni ni-file-docs"></em>
                                                </span><span
                                                    class="nk-menu-text">Kê đơn thuốc</span></a></li>
                                        <li class="nk-menu-item"><a href="#"
                                                                    class="nk-menu-link"><span class="nk-menu-icon">
                                                  <em class="icon ni ni-eye"></em>
                                                </span><span
                                                    class="nk-menu-text">Theo dõi quá trình điều trị</span></a></li>
                                        <li class="nk-menu-item"><a href="#"
                                                                    class="nk-menu-link"><span class="nk-menu-icon">
                                                  <em class="icon ni ni-users"></em>
                                                </span><span
                                                    class="nk-menu-text">Giao tiếp nội bộ và tư vấn</span></a></li>
                                        <li class="nk-menu-item"><a href="#"
                                                                    class="nk-menu-link"><span class="nk-menu-icon">
                                                    <em class="icon ni ni-reports"></em>
                                                </span><span
                                                    class="nk-menu-text">Xem báo cáo thống kê cá nhân</span></a></li>
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
