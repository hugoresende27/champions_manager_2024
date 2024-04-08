<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="tactics"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Team Tactics"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <div class="card mt-4">
                        <div class="card card-plain h-100">
                      
                            <div class="card-body p-3">

                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="playWings" checked>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="playWings">Play by the Wings</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="playCenter">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="playCenter">Play by the Center</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Defense in Line</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Waste Time</label>
                                                </div>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-group">

                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="manMarking">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">Man Marking</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="zoneMarking" checked>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Zone Marking</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="aggressiveTackle">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Aggressive Tackles</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" id="smoothTackle">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault6">Smooth Tackles</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                         


                              
                            </div>
                        </div>
               
                        
                        <hr>



                        <div class="card-header p-3">
                            <h5 class="mb-0 text-center">Tactic Balance</h5>
               
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button"
                                        data-target="allAttack">All Attack</button>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                                    <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button"
                                        data-target="balanceAttack">Balanced Attack</button>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                                    <button class="btn bg-gradient-warning w-100 mb-0 toast-btn" type="button"
                                        data-target="defending">Defending</button>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                                    <button class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button"
                                        data-target="allDefend">All Defend</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="position-fixed bottom-1 end-1 z-index-2">
                <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="allAttack" aria-atomic="true">
                    <div class="toast-header border-0">
                        <i class="material-icons text-success me-2">check</i>
                        <span class="me-auto font-weight-bold">All-out Attack</span>
                        <small class="text-black">Tactic</small>
                        <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                    </div>
                    <hr class="horizontal dark m-0">
                    <div class="toast-body">
                        All team members will push forward aggressively to attack the opponent's goal.
                    </div>
                </div>
            
                <div class="toast fade hide p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="balanceAttack" aria-atomic="true">
                    <div class="toast-header bg-transparent border-0">
                        <i class="material-icons text-white me-2">notifications</i>
                        <span class="me-auto text-white font-weight-bold">Balanced Attack</span>
                        <small class="text-black">Tactic</small>
                        <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                    </div>
                    <hr class="horizontal light m-0">
                    <div class="toast-body text-white">
                        The team will maintain a balanced approach between attacking and defending.
                    </div>
                </div>
            
                <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="defending" aria-atomic="true">
                    <div class="toast-header border-0">
                        <i class="material-icons text-warning me-2">travel_explore</i>
                        <span class="me-auto font-weight-bold">Defensive Strategy</span>
                        <small class="text-black">Tactic</small>
                        <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                    </div>
                    <hr class="horizontal dark m-0">
                    <div class="toast-body">
                        The team adopts a defensive posture, focusing on protecting their own goal.
                    </div>
                </div>
            
                <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="allDefend" aria-atomic="true">
                    <div class="toast-header border-0">
                        <i class="material-icons text-danger me-2">campaign</i>
                        <span class="me-auto text-gradient text-danger font-weight-bold">All-out Defense</span>
                        <small class="text-black">Tactic</small>
                        <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                    </div>
                    <hr class="horizontal dark m-0">
                    <div class="toast-body">
                        All team members will prioritize defending, aiming to prevent the opponent from scoring.
                    </div>
                </div>
            </div>
            


            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const playWingsCheckbox = document.getElementById('playWings');
    const playCenterCheckbox = document.getElementById('playCenter');
    const manMarking = document.getElementById('manMarking');
    const zoneMarking = document.getElementById('zoneMarking');
    const aggressiveTackle = document.getElementById('aggressiveTackle');
    const smoothTackle = document.getElementById('smoothTackle');
    
    playWingsCheckbox.addEventListener('change', function () {
        if (this.checked) {
            playCenterCheckbox.checked = false;
        }
    });
    
    playCenterCheckbox.addEventListener('change', function () {
        if (this.checked) {
            playWingsCheckbox.checked = false;
        }
    });

    manMarking.addEventListener('change', function () {
        if (this.checked) {
            zoneMarking.checked = false;
        }
    });
    
    zoneMarking.addEventListener('change', function () {
        if (this.checked) {
            manMarking.checked = false;
        }
    });


    aggressiveTackle.addEventListener('change', function () {
        if (this.checked) {
            smoothTackle.checked = false;
        }
    });
    
    smoothTackle.addEventListener('change', function () {
        if (this.checked) {
            aggressiveTackle.checked = false;
        }
    });

});

</script>
