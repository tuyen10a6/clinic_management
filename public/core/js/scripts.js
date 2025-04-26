!(function (NioApp, $) {
    "use strict";
    NioApp.Package.name = "DashLite";
    NioApp.Package.version = "2.3";

    var $win = $(window), $body = $('body'), $doc = $(document),

        //class names
        _body_theme = 'nio-theme',
        _menu = 'nk-menu',
        _mobile_nav = 'mobile-menu',
        _header = 'nk-header',
        _header_menu = 'nk-header-menu',
        _sidebar = 'nk-sidebar',
        _sidebar_mob = 'nk-sidebar-mobile',
        //breakpoints
        _break = NioApp.Break;

    function extend(obj, ext) {
        Object.keys(ext).forEach(function (key) { obj[key] = ext[key]; });
        return obj;
    }
    // ClassInit @v1.0
    NioApp.ClassBody = function () {
        NioApp.AddInBody(_sidebar);
    };

    // ClassInit @v1.0
    NioApp.ClassNavMenu = function () {
        NioApp.BreakClass('.' + _header_menu, _break.lg, { timeOut: 0 });
        $win.on('resize', function () {
            NioApp.BreakClass('.' + _header_menu, _break.lg);
        });
    };

    // Code Prettify @v1.0
    NioApp.Prettify = function () {
        window.prettyPrint && prettyPrint();
    };

    // Toggle Screen @v1.0
    NioApp.TGL.screen = function (elm) {
        if ($(elm).exists()) {
            $(elm).each(function () {
                var ssize = $(this).data('toggle-screen');
                if (ssize) { $(this).addClass('toggle-screen-' + ssize); }
            });
        }
    };

    // Toggle Content @v1.0
    NioApp.TGL.content = function (elm, opt) {
        var toggle = (elm) ? elm : '.toggle', $toggle = $(toggle), $contentD = $('[data-content]'),
            toggleBreak = true, toggleCurrent = false, def = { active: 'active', content: 'content-active', break: toggleBreak }, attr = (opt) ? extend(def, opt) : def;

        NioApp.TGL.screen($contentD);

        $toggle.on('click', function (e) {
            toggleCurrent = this;
            NioApp.Toggle.trigger($(this).data('target'), attr);
            e.preventDefault();
        });

        $doc.on('mouseup', function (e) {
            if (toggleCurrent) {
                var $toggleCurrent = $(toggleCurrent), currentTarget =  $(toggleCurrent).data('target'), $contentCurrent=$(`[data-content="${currentTarget}"]`), $dpd = $('.datepicker-dropdown'), $tpc = $('.ui-timepicker-container');
                if (!$toggleCurrent.is(e.target) && $toggleCurrent.has(e.target).length === 0 && !$contentCurrent.is(e.target) && $contentCurrent.has(e.target).length === 0
                    && $(e.target).closest('.select2-container').length === 0  && !$dpd.is(e.target) && $dpd.has(e.target).length === 0
                    && !$tpc.is(e.target) && $tpc.has(e.target).length === 0) {
                    NioApp.Toggle.removed($toggleCurrent.data('target'), attr);
                    toggleCurrent = false;
                }
            }
        });

        $win.on('resize', function () {
            $contentD.each(function () {
                var content = $(this).data('content'), ssize = $(this).data('toggle-screen'), toggleBreak = _break[ssize];
                if (NioApp.Win.width > toggleBreak) {
                    NioApp.Toggle.removed(content, attr);
                }
            });
        });
    };

    // ToggleExpand @v1.0
    NioApp.TGL.expand = function (elm, opt) {
        var toggle = (elm) ? elm : '.expand', def = { toggle: true }, attr = (opt) ? extend(def, opt) : def;

        $(toggle).on('click', function (e) {
            NioApp.Toggle.trigger($(this).data('target'), attr);
            e.preventDefault();
        });
    };

    // Dropdown Menu @v1.0
    NioApp.TGL.ddmenu = function (elm, opt) {
        var imenu = (elm) ? elm : '.nk-menu-toggle',
            def = { active: 'active', self: 'nk-menu-toggle', child: 'nk-menu-sub' },
            attr = (opt) ? extend(def, opt) : def;

        $(imenu).on('click', function (e) {
            if ((NioApp.Win.width < _break.lg) || ($(this).parents().hasClass(_sidebar))) {
                NioApp.Toggle.dropMenu($(this), attr);
            }
            e.preventDefault();
        });
    };

    // Show Menu @v1.0
    NioApp.TGL.showmenu = function (elm, opt) {
        var toggle = (elm) ? elm : '.nk-nav-toggle', $toggle = $(toggle), $contentD = $('[data-content]'),
            toggleBreak = ($contentD.hasClass(_header_menu)) ? _break.lg : _break.xl,
            toggleOlay = _sidebar + '-overlay', toggleClose = { profile: true, menu: false },
            def = { active: 'toggle-active', content: _sidebar + '-active', body: 'nav-shown', overlay: toggleOlay, break: toggleBreak, close: toggleClose },
            attr = (opt) ? extend(def, opt) : def;

        $toggle.on('click', function (e) {
            NioApp.Toggle.trigger($(this).data('target'), attr);
            e.preventDefault();
        });

        $doc.on('mouseup', function (e) {
            if (!$toggle.is(e.target) && $toggle.has(e.target).length === 0 && !$contentD.is(e.target) && $contentD.has(e.target).length === 0 && NioApp.Win.width < toggleBreak) {
                NioApp.Toggle.removed($toggle.data('target'), attr);
            }
        });

        $win.on('resize', function () {
            if (NioApp.Win.width < _break.xl || NioApp.Win.width < toggleBreak) {
                NioApp.Toggle.removed($toggle.data('target'), attr);
            }
        });
    };

    // Compact Sidebar @v1.0
    NioApp.sbCompact = function () {
        var toggle = '.nk-nav-compact', $toggle = $(toggle), $content = $('[data-content]');
        $toggle.on('click', function (e) {
            e.preventDefault();
            var $self = $(this), get_target = $self.data('target'),
                $self_content = $('[data-content=' + get_target + ']');

            $self.toggleClass('compact-active');
            $self_content.toggleClass('is-compact');
        });
    };

    // BootStrap Extended
    NioApp.BS.ddfix = function (elm, exc) {
        var dd = (elm) ? elm : '.dropdown-menu',
            ex = (exc) ? exc : 'a:not(.clickable), button:not(.clickable), a:not(.clickable) *, button:not(.clickable) *';

        $(dd).on('click', function (e) {
            if (!$(e.target).is(ex)) {
                e.stopPropagation();
                return;
            }
        });
        if (NioApp.State.isRTL) {
            var $dMenu = $('.dropdown-menu');
            $dMenu.each(function () {
                var $self = $(this);
                if ($self.hasClass('dropdown-menu-end') && !$self.hasClass('dropdown-menu-center')) {
                    $self.prev('[data-bs-toggle="dropdown"]').dropdown({
                        popperConfig: {
                            placement: 'bottom-start'
                        }
                    });
                } else if (!$self.hasClass('dropdown-menu-end') && !$self.hasClass('dropdown-menu-center')) {
                    $self.prev('[data-bs-toggle="dropdown"]').dropdown({
                        popperConfig: {
                            placement: 'bottom-end'
                        }
                    });
                }
            });
        }
    }

    // BootStrap Specific Tab Open
    NioApp.BS.tabfix = function (elm) {
        var tab = (elm) ? elm : '[data-toggle="modal"]';
        $(tab).on('click', function () {
            var _this = $(this), target = _this.data('target'), target_href = _this.attr('href'),
                tg_tab = _this.data('tab-target');

            var modal = (target) ? $body.find(target) : $body.find(target_href);
            if (tg_tab && tg_tab !== '#' && modal) {
                modal.find('[href="' + tg_tab + '"]').tab('show');
            } else if (modal) {
                var tabdef = modal.find('.nk-nav.nav-tabs');
                var link = $(tabdef[0]).find('[data-bs-toggle="tab"]');
                $(link[0]).tab('show');
            }
        });
    }

    // Extra @v1.1
    NioApp.OtherInit = function () {
        NioApp.ClassBody();
        NioApp.LinkOff('.is-disable');
        NioApp.ClassNavMenu();
        NioApp.SetHW('[data-height]', 'height');
        NioApp.SetHW('[data-width]', 'width');
    };

    // BootstrapExtend Init @v1.0
    NioApp.BS.init = function () {
        NioApp.BS.menutip('a.nk-menu-link');
        NioApp.BS.tooltip('.nk-tooltip');
        NioApp.BS.tooltip('.btn-tooltip', { placement: 'top' });
        NioApp.BS.tooltip('[data-toggle="tooltip"]');
        NioApp.BS.tooltip('[data-bs-toggle="tooltip"]');
        NioApp.BS.tooltip('.tipinfo,.nk-menu-tooltip', { placement: 'right' });
        NioApp.BS.popover('[data-toggle="popover"]');
        NioApp.BS.popover('[data-bs-toggle="popover"]');
        NioApp.BS.progress('[data-progress]');
        NioApp.BS.fileinput('.form-file-input');
        NioApp.BS.modalfix();
        NioApp.BS.ddfix();
        NioApp.BS.tabfix();
    }

    // Picker Init @v1.0
    NioApp.Picker.init = function () {
        NioApp.Picker.date('.date-picker');
        NioApp.Picker.dob('.date-picker-alt');
        NioApp.Picker.time('.time-picker');
        NioApp.Picker.date('.date-picker-range', {
            todayHighlight: false,
            autoclose: false
        });
    };

    // Toggler @v1
    NioApp.TGL.init = function () {
        NioApp.TGL.content('.toggle');
        NioApp.TGL.expand('.toggle-expand');
        NioApp.TGL.expand('.toggle-opt', { toggle: false });
        NioApp.TGL.showmenu('.nk-nav-toggle');
        NioApp.TGL.ddmenu('.' + _menu + '-toggle', { self: _menu + '-toggle', child: _menu + '-sub' });
    };

    NioApp.BS.modalOnInit = function () {
        $('.modal').on('shown.bs.modal', function () {
            NioApp.Select2.init();
            NioApp.Validate.init();
        });
    };

    NioApp.init = function () {
        NioApp.coms.docReady.push(NioApp.OtherInit);
        NioApp.coms.docReady.push(NioApp.Prettify);
        NioApp.coms.docReady.push(NioApp.ColorBG);
        NioApp.coms.docReady.push(NioApp.ColorTXT);
        NioApp.coms.docReady.push(NioApp.Copied);
        NioApp.coms.docReady.push(NioApp.Ani.init);
        NioApp.coms.docReady.push(NioApp.TGL.init);
        NioApp.coms.docReady.push(NioApp.BS.init);
        NioApp.coms.docReady.push(NioApp.Picker.init);
        NioApp.coms.docReady.push(NioApp.Wizard);
        NioApp.coms.docReady.push(NioApp.sbCompact);
    }

    NioApp.init();

    return NioApp;
})(NioApp, jQuery);
