<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="/inspinia/img/profile_small.jpg"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">David Williams</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="/inspinia/profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="/inspinia/contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="/inspinia/mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item logout" onclick="event.preventDefault(); getElementById('logout').submit();" href="#">Logout</a></li>
                        <form id="logout" hidden="true" method="post" action="{{route('logout')}}">
                            @csrf
                        </form>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="/plan"><i class="fa fa-bars"></i> <span class="nav-label">PLAN</span></a>
            </li>
            <li>
                <a href="{{route('categories')}}"><i class="fa fa-bars"></i> <span class="nav-label">Categories</span></a>
            </li>
            <li class="active">
                <a href="/inspinia/index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="index.html">Dashboard v.1</a></li>
                    <li><a href="/inspinia/dashboard_2.html">Dashboard v.2</a></li>
                    <li><a href="/inspinia/dashboard_3.html">Dashboard v.3</a></li>
                    <li><a href="/inspinia/dashboard_4_1.html">Dashboard v.4</a></li>
                    <li><a href="/inspinia/dashboard_5.html">Dashboard v.5 </a></li>
                </ul>
            </li>
            <li>
                <a href="/inspinia/layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/graph_flot.html">Flot Charts</a></li>
                    <li><a href="/inspinia/graph_morris.html">Morris.js Charts</a></li>
                    <li><a href="/inspinia/graph_rickshaw.html">Rickshaw Charts</a></li>
                    <li><a href="/inspinia/graph_chartjs.html">Chart.js</a></li>
                    <li><a href="/inspinia/graph_chartist.html">Chartist</a></li>
                    <li><a href="/inspinia/c3.html">c3 charts</a></li>
                    <li><a href="/inspinia/graph_peity.html">Peity Charts</a></li>
                    <li><a href="/inspinia/graph_sparkline.html">Sparkline Charts</a></li>
                </ul>
            </li>
            <li>
                <a href="/inspinia/mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning float-right">16/24</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/mailbox.html">Inbox</a></li>
                    <li><a href="/inspinia/mail_detail.html">Email view</a></li>
                    <li><a href="/inspinia/mail_compose.html">Compose email</a></li>
                    <li><a href="/inspinia/email_template.html">Email templates</a></li>
                </ul>
            </li>
            <li>
                <a href="/inspinia/metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>  </a>
            </li>
            <li>
                <a href="/inspinia/widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/form_basic.html">Basic form</a></li>
                    <li><a href="/inspinia/form_advanced.html">Advanced Plugins</a></li>
                    <li><a href="/inspinia/form_wizard.html">Wizard</a></li>
                    <li><a href="/inspinia/form_file_upload.html">File Upload</a></li>
                    <li><a href="/inspinia/form_editors.html">Text Editor</a></li>
                    <li><a href="/inspinia/form_autocomplete.html">Autocomplete</a></li>
                    <li><a href="/inspinia/form_markdown.html">Markdown</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="float-right label label-primary">SPECIAL</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/contacts.html">Contacts</a></li>
                    <li><a href="/inspinia/profile.html">Profile</a></li>
                    <li><a href="/inspinia/profile_2.html">Profile v.2</a></li>
                    <li><a href="/inspinia/contacts_2.html">Contacts v.2</a></li>
                    <li><a href="/inspinia/projects.html">Projects</a></li>
                    <li><a href="/inspinia/project_detail.html">Project detail</a></li>
                    <li><a href="/inspinia/activity_stream.html">Activity stream</a></li>
                    <li><a href="/inspinia/teams_board.html">Teams board</a></li>
                    <li><a href="/inspinia/social_feed.html">Social feed</a></li>
                    <li><a href="/inspinia/clients.html">Clients</a></li>
                    <li><a href="/inspinia/full_height.html">Outlook view</a></li>
                    <li><a href="/inspinia/vote_list.html">Vote list</a></li>
                    <li><a href="/inspinia/file_manager.html">File manager</a></li>
                    <li><a href="/inspinia/calendar.html">Calendar</a></li>
                    <li><a href="/inspinia/issue_tracker.html">Issue tracker</a></li>
                    <li><a href="/inspinia/blog.html">Blog</a></li>
                    <li><a href="/inspinia/article.html">Article</a></li>
                    <li><a href="/inspinia/faq.html">FAQ</a></li>
                    <li><a href="/inspinia/timeline.html">Timeline</a></li>
                    <li><a href="/inspinia/pin_board.html">Pin board</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/search_results.html">Search results</a></li>
                    <li><a href="/inspinia/lockscreen.html">Lockscreen</a></li>
                    <li><a href="/inspinia/invoice.html">Invoice</a></li>
                    <li><a href="/inspinia/login.html">Login</a></li>
                    <li><a href="/inspinia/login_two_columns.html">Login v.2</a></li>
                    <li><a href="/inspinia/forgot_password.html">Forget password</a></li>
                    <li><a href="/inspinia/register.html">Register</a></li>
                    <li><a href="/inspinia/404.html">404 Page</a></li>
                    <li><a href="/inspinia/500.html">500 Page</a></li>
                    <li><a href="/inspinia/empty_page.html">Empty page</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info float-right">NEW</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/toastr_notifications.html">Notification</a></li>
                    <li><a href="/inspinia/nestable_list.html">Nestable list</a></li>
                    <li><a href="/inspinia/agile_board.html">Agile board</a></li>
                    <li><a href="/inspinia/timeline_2.html">Timeline v.2</a></li>
                    <li><a href="/inspinia/diff.html">Diff</a></li>
                    <li><a href="/inspinia/pdf_viewer.html">PDF viewer</a></li>
                    <li><a href="/inspinia/i18support.html">i18 support</a></li>
                    <li><a href="/inspinia/sweetalert.html">Sweet alert</a></li>
                    <li><a href="/inspinia/idle_timer.html">Idle timer</a></li>
                    <li><a href="/inspinia/truncate.html">Truncate</a></li>
                    <li><a href="/inspinia/password_meter.html">Password meter</a></li>
                    <li><a href="/inspinia/spinners.html">Spinners</a></li>
                    <li><a href="/inspinia/spinners_usage.html">Spinners usage</a></li>
                    <li><a href="/inspinia/tinycon.html">Live favicon</a></li>
                    <li><a href="/inspinia/google_maps.html">Google maps</a></li>
                    <li><a href="/inspinia/datamaps.html">Datamaps</a></li>
                    <li><a href="/inspinia/social_buttons.html">Social buttons</a></li>
                    <li><a href="/inspinia/code_editor.html">Code editor</a></li>
                    <li><a href="/inspinia/modal_window.html">Modal window</a></li>
                    <li><a href="/inspinia/clipboard.html">Clipboard</a></li>
                    <li><a href="/inspinia/text_spinners.html">Text spinners</a></li>
                    <li><a href="/inspinia/forum_main.html">Forum view</a></li>
                    <li><a href="/inspinia/validation.html">Validation</a></li>
                    <li><a href="/inspinia/tree_view.html">Tree view</a></li>
                    <li><a href="/inspinia/loading_buttons.html">Loading buttons</a></li>
                    <li><a href="/inspinia/chat_view.html">Chat view</a></li>
                    <li><a href="/inspinia/masonry.html">Masonry</a></li>
                    <li><a href="/inspinia/tour.html">Tour</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/typography.html">Typography</a></li>
                    <li><a href="/inspinia/icons.html">Icons</a></li>
                    <li><a href="/inspinia/draggable_panels.html">Draggable Panels</a></li> <li><a href="/inspinia/resizeable_panels.html">Resizeable Panels</a></li>
                    <li><a href="/inspinia/buttons.html">Buttons</a></li>
                    <li><a href="/inspinia/video.html">Video</a></li>
                    <li><a href="/inspinia/tabs_panels.html">Panels</a></li>
                    <li><a href="/inspinia/tabs.html">Tabs</a></li>
                    <li><a href="/inspinia/notifications.html">Notifications & Tooltips</a></li>
                    <li><a href="/inspinia/helper_classes.html">Helper css classes</a></li>
                    <li><a href="/inspinia/badges_labels.html">Badges, Labels, Progress</a></li>
                </ul>
            </li>

            <li>
                <a href="/inspinia/grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/table_basic.html">Static Tables</a></li>
                    <li><a href="/inspinia/table_data_tables.html">Data Tables</a></li>
                    <li><a href="/inspinia/table_foo_table.html">Foo Tables</a></li>
                    <li><a href="/inspinia/jq_grid.html">jqGrid</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/ecommerce_products_grid.html">Products grid</a></li>
                    <li><a href="/inspinia/ecommerce_product_list.html">Products list</a></li>
                    <li><a href="/inspinia/ecommerce_product.html">Product edit</a></li>
                    <li><a href="/inspinia/ecommerce_product_detail.html">Product detail</a></li>
                    <li><a href="/inspinia/ecommerce-cart.html">Cart</a></li>
                    <li><a href="/inspinia/ecommerce-orders.html">Orders</a></li>
                    <li><a href="/inspinia/ecommerce_payments.html">Credit Card form</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/inspinia/basic_gallery.html">Lightbox Gallery</a></li>
                    <li><a href="/inspinia/slick_carousel.html">Slick Carousel</a></li>
                    <li><a href="/inspinia/carousel.html">Bootstrap Carousel</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="#" id="damian">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Second Level Item</a></li>
                </ul>
            </li>
            <li>
                <a href="/inspinia/css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info float-right">62</span></a>
            </li>
            <li class="landing_link">
                <a target="_blank" href="/inspinia/landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning float-right">NEW</span></a>
            </li>
            <li class="special_link">
                <a href="/inspinia/package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
            </li>
        </ul>

    </div>
</nav>