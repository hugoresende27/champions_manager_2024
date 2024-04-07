<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="team-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Team Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0  text-center">Team Management</h5>

                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox" id="playWings" checked>
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="playWings">Day off after game day</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox" id="playCenter">
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="playCenter">Player Development</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Team Meetings</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Scouting Reports</label>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-group">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
                   

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
