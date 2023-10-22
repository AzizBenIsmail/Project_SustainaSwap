<nav class="sidebar-nav">
    <ul id="sidebarnav" class="pt-4">

        {{--        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" --}}
        {{--                                     href="charts.blade.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span --}}
        {{--                    class="hide-menu">Charts</span></a></li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" --}}
        {{--                                     href="widgets.blade.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span --}}
        {{--                    class="hide-menu">Widgets</span></a></li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" --}}
        {{--                                     href="tables.blade.php" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span --}}
        {{--                    class="hide-menu">Tables</span></a></li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" --}}
        {{--                                     href="grid.blade.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span --}}
        {{--                    class="hide-menu">Full Width</span></a></li> --}}
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                    class="mdi mdi-receipt"></i><span class="hide-menu">Complaints Management</span>
            </a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ route('complaints.index') }}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu"> List complaints</span>
                    </a>
                </li>



            </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                    class="mdi mdi-receipt"></i><span class="hide-menu">Users Management</span>
            </a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ route('users.index') }}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu"> List Users</span>
                    </a>
                </li>
            </ul>
        </li>
            {{-- -- --}}
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                    class="mdi mdi-receipt"></i><span class="hide-menu">Items Management</span>
            </a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ route('itemsAdmin.index') }}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu"> Items</span>
                    </a>
                </li>
            </ul>
        </li>
  {{-- -- --}}
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                    class="mdi mdi-receipt"></i><span class="hide-menu">Category Management</span>
            </a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="{{ route('categories.index') }}" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu"> Categoriess</span>
                    </a>
                </li>
            </ul>
        </li>

            {{--------}}
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                    class="mdi mdi-receipt"></i><span class="hide-menu">Trades Management</span>
            </a>
            <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item">
                    <a href="tradesAdmin" class="sidebar-link">
                        <i class="mdi mdi-note-outline"></i>
                        <span class="hide-menu"> Categoriess</span>
                    </a>
                </li>
            </ul>
        </li>


        {{--        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" --}}
        {{--                                     href="pages-buttons.blade.php" aria-expanded="false"><i --}}
        {{--                    class="mdi mdi-relative-scale"></i><span class="hide-menu">Buttons</span></a></li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" --}}
        {{--                                     href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span --}}
        {{--                    class="hide-menu">Icons </span></a> --}}
        {{--            <ul aria-expanded="false" class="collapse  first-level"> --}}
        {{--                <li class="sidebar-item"><a href="icon-material.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="icon-fontawesome.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome --}}
        {{--                                            Icons </span></a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" --}}
        {{--                                     href="pages-elements.blade.php" aria-expanded="false"><i class="mdi mdi-pencil"></i><span --}}
        {{--                    class="hide-menu">Elements</span></a></li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" --}}
        {{--                                     href="javascript:void(0)" aria-expanded="false"><i --}}
        {{--                    class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a> --}}
        {{--            <ul aria-expanded="false" class="collapse  first-level"> --}}
        {{--                <li class="sidebar-item"><a href="index2.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="pages-gallery.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="pages-calendar.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="pages-invoice.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="pages-chat.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option --}}
        {{--                                        </span></a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" --}}
        {{--                                     href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span --}}
        {{--                    class="hide-menu">Authentication </span></a> --}}
        {{--            <ul aria-expanded="false" class="collapse  first-level"> --}}
        {{--                <li class="sidebar-item"><a href="authentication-login.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a> --}}
        {{--                </li> --}}
        {{--                <li class="sidebar-item"><a href="authentication-register.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register --}}
        {{--                                        </span></a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" --}}
        {{--                                     href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span --}}
        {{--                    class="hide-menu">Errors </span></a> --}}
        {{--            <ul aria-expanded="false" class="collapse  first-level"> --}}
        {{--                <li class="sidebar-item"><a href="error-403.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="error-404.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="error-405.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 --}}
        {{--                                        </span></a></li> --}}
        {{--                <li class="sidebar-item"><a href="error-500.blade.php" class="sidebar-link"><i --}}
        {{--                            class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 --}}
        {{--                                        </span></a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
    </ul>
</nav>
