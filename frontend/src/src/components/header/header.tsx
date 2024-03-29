import { component$ } from "@builder.io/qwik"

const Logo = () => (
    <a href="#" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">CARD Informatics</span>
    </a>
);

const SearchBar = () => (
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
);

const Notifications = () => (
    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                    <h4>Lorem Ipsum</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>30 min. ago</p>
                </div>
            </li>
            {/* ... Additional notification items ... */}
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
            </li>
        </ul>
    </li>
);

const Messages = () => (
    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li class="message-item">
                <a href="#">
                    <img src="/img/messages-1.jpg" alt="" class="rounded-circle" />
                    <div>
                        <h4>Maria Hudson</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>4 hrs. ago</p>
                    </div>
                </a>
            </li>
            {/* ... Additional message items ... */}
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li class="dropdown-footer">
                <a href="#">Show all messages</a>
            </li>
        </ul>
    </li>
);

const ProfileDropdown = () => (
    <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>Emmanuel Mtera</h6>
                <span>Developer</span>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </li>
);

export const Header = component$(() => {
    return (
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between" style="font-family: 'Niconne', cursive; font-size: 24px;">
                <Logo />
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>
            <SearchBar />
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <Notifications />
                    <Messages />
                    <ProfileDropdown />
                </ul>
            </nav>
        </header>
    );
});
