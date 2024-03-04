@props(['activePage'])

<style>
    #sidenav-main {
    max-height: 150vh !important; /* Limit the height of the sidenav to the viewport height */
    overflow-y: auto !important; /* Enable vertical scrolling if content exceeds the height */
}
</style>
<aside
    {{-- class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" --}}
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="#">

            <span class="ms-2 font-weight-bold text-white">{{ date('d/m/y - H.i') }}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-0">
    <div class="  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Team</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white"
                    style="background-color: {{ $activePage == 'team-profile' ? (App\Models\Team::getColors(auth()->user()->about)[0]) : '' }};
                    color: {{(App\Models\Team::getColors(auth()->user()->about)[1])}}"
                    href="{{ route('team-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">announcement</i>
                    </div>
                    <span class="nav-link-text ms-1">Team Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" 
                    style="background-color: {{ $activePage == 'team-management' ? (App\Models\Team::getColors(auth()->user()->about)[0]) : '' }};
                    color: {{(App\Models\Team::getColors(auth()->user()->about)[1])}}"
                    href="{{ route('team-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Team Management</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Coaching</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">fitness_center</i>
                    </div>
                    <span class="nav-link-text ms-1">Training</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white "
                    style="background-color: {{ $activePage == 'squad' ? (App\Models\Team::getColors(auth()->user()->about)[0]) : '' }};
                    color: {{(App\Models\Team::getColors(auth()->user()->about)[1])}}""
                    href="{{ route('squad') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Squad</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'billing' ? ' active bg-gradient-primary' : '' }}  "
                    href="">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">account_balance</i>
                    </div>
                    <span class="nav-link-text ms-1">Finances</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'virtual-reality' ? ' active bg-gradient-primary' : '' }}  "
                    href="">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Tactics</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'rtl' ? ' active bg-gradient-primary' : '' }}  "
                    href="">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">event</i>
                    </div>
                    <span class="nav-link-text ms-1">Calendar</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'notifications' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'profile' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul> --}}
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn  w-100" href=""
             style="background-color: {{(App\Models\Team::getColors(auth()->user()->about)[0])}};
             color: {{(App\Models\Team::getColors(auth()->user()->about)[1])}}"">Settings</a>
        </div>
        <div class="mx-3">
            <a class="btn  w-100" href="{{ route('home')}}"
               style="background-color: {{(App\Models\Team::getColors(auth()->user()->about)[0])}};
                      color: {{(App\Models\Team::getColors(auth()->user()->about)[1])}}">Exit Game</a>
        </div>
       
    </div>
</aside>
