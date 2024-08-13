<style>
    .text-slate {
        color: rgb(226, 232, 240);
    }
</style>
<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
            <div
                class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
            >
                <a class="navbar-brand brand-logo" href="{{ url('/Home') }}"
                    ><i class="mdi mdi-book-open-page-variant text-success"></i>
                    <b class="text-success">eLearning App</b></a
                >
                <a
                    class="navbar-brand brand-logo-mini"
                    href="{{ url('/Home') }}"
                    ><i class="mdi mdi-book-open-page-variant text-success"></i>
                    <b class="text-success">eLearning</b></a
                >
            </div>
            <div
                class="navbar-menu-wrapper d-flex align-items-center justify-content-end"
            >
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div
                                class="input-group-prepend hover-cursor"
                                id="navbar-search-icon"
                            >
                                <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                id="navbar-search-input"
                                placeholder="Search projects"
                                aria-label="search"
                                aria-describedby="search"
                            />
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="profileDropdown"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <div class="nav-profile-img">
                                <img
                                    src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/faces/face12.jpg') }}"
                                    alt="profile"
                                    class=" img-fluid rounded-circle"
                                    style="object-fit: cover;"
                                />

                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="text-slate">
                                    {{auth()->user()->name}}
                                </p>
                            </div>
                        </a>
                        <div
                            class="dropdown-menu navbar-dropdown"
                            aria-labelledby="profileDropdown"
                        >
                            
                            <div class="dropdown-divider"></div>
                            <a
                                class="dropdown-item"
                                href="{{ route('ChangePasswordST') }}"
                              
                            >
                                <i class="  mdi mdi-textbox-password me-2 text-primary"></i>
                                Change Password
                            </a>
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                <i class="mdi mdi-logout me-2 text-primary"></i>
                                Signout
                            </a>
                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                class="d-none"
                            >
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-flex full-screen-link">
                        <a class="nav-link">
                            <i
                                class="mdi mdi-fullscreen"
                                id="fullscreen-button"
                            ></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link count-indicator dropdown-toggle"
                            id="notificationDropdown"
                            href="#"
                            data-bs-toggle="dropdown"
                        >
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count-symbol bg-danger"></span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown"
                        >
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                                >
                                    <h6
                                        class="preview-subject font-weight-normal mb-1"
                                    >
                                        Event today
                                    </h6>
                                    <p class="text-gray ellipsis mb-0">
                                        Just a reminder that you have an event
                                        today
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-cog"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                                >
                                    <h6
                                        class="preview-subject font-weight-normal mb-1"
                                    >
                                        Settings
                                    </h6>
                                    <p class="text-gray ellipsis mb-0">
                                        Update dashboard
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-link-variant"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                                >
                                    <h6
                                        class="preview-subject font-weight-normal mb-1"
                                    >
                                        Launch Admin
                                    </h6>
                                    <p class="text-gray ellipsis mb-0">
                                        New admin wow!
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">
                                See all notifications
                            </h6>
                        </div>
                    </li>
                </ul>
                <button
                    class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                    type="button"
                    data-toggle="horizontal-menu-toggle"
                >
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('Home') }}">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <span class="menu-title">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('Pricing') }}">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <span class="menu-title">Subscription</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('Exams') }}" class="nav-link">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">Exams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('getCoursesTypeS') }}" class="nav-link">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">Course</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('Learn') }}" class="nav-link">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Learn</span></a
                    >
                </li>
            </ul>
        </div>
    </nav>
</div>
