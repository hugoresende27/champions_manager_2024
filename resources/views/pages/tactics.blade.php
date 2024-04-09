<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="tactics"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Team Tactics"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">



            <form action="{{ route('coach-settings.tactics.update', $coachSettings->game_id) }}" method="POST">
                @csrf
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
                                                                <input class="form-check-input ms-auto" type="checkbox" id="play_wings" name="tactics_wings" {{ $coachSettings->tactics_wings ? 'checked' : ''}}>
                                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="playWings">Play by the Wings</label>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item border-0 px-0">
                                                            <div class="form-check form-switch ps-0">
                                                                <input class="form-check-input ms-auto" type="checkbox" id="play_center" name="tactics_center" {{ $coachSettings->tactics_center ? 'checked' : ''}}>
                                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="playCenter">Play by the Center</label>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item border-0 px-0">
                                                            <div class="form-check form-switch ps-0">
                                                                <input class="form-check-input ms-auto" type="checkbox" id="defense_line" name="defense_line" {{ $coachSettings->defense_line ? 'checked' : ''}}>
                                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="defense_line">Defense in Line</label>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item border-0 px-0">
                                                            <div class="form-check form-switch ps-0">
                                                                <input class="form-check-input ms-auto" type="checkbox" id="waste_time" name="waste_time" {{ $coachSettings->waste_time ? 'checked' : ''}}>
                                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="waste_time">Waste Time</label>
                                                            </div>
                                                        </li>
                                                    
                                                
                                                
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="list-group">

                                                    <li class="list-group-item border-0 px-0">
                                                        <div class="form-check form-switch ps-0">
                                                            <input class="form-check-input ms-auto" type="checkbox" id="man_marking" name="man_marking" {{ $coachSettings->man_marking ? 'checked' : ''}}>
                                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="man_marking">Man Marking</label>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item border-0 px-0">
                                                        <div class="form-check form-switch ps-0">
                                                            <input class="form-check-input ms-auto" type="checkbox" id="zone_marking" name="zone_marking" {{ $coachSettings->zone_marking ? 'checked' : ''}}>
                                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="zone_marking">Zone Marking</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border-0 px-0">
                                                        <div class="form-check form-switch ps-0">
                                                            <input class="form-check-input ms-auto" type="checkbox" id="aggressive" name="aggressive" {{ $coachSettings->aggressive ? 'checked' : ''}}>
                                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="aggressive">Aggressive Tackles</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border-0 px-0">
                                                        <div class="form-check form-switch ps-0">
                                                            <input class="form-check-input ms-auto" type="checkbox" id="smooth" name="smooth" {{ $coachSettings->smooth ? 'checked' : ''}}>
                                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="smooth">Smooth Tackles</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                
                        

                                
                                </div>
                            </div>
                
                            
                            <hr>

                                    
                            @php

                                $setting = $coachSettings->balance;
                                switch ($setting) {
                                    case 'all_attack':
                                        $output = 'All attacking';
                                        break;
                                    case 'balance_attack':
                                        $output = 'Attacking Balancing';
                                        break;
                                    case 'defending':
                                        $output = 'defending teams';
                                        break;
                                    case 'all_defend':
                                        $output = 'all team is on defense';
                                        break;
                                    
                                    default:
                                        $output = '';
                                        break;
                                }

                            @endphp


                            <div class="card-header p-3">
                                <h5 class="mb-0 text-center">Tactic {{ $output }}</h5>
                
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button" 
                                            data-target="all_attack">All Attack</button>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                                        <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button" 
                                            data-target="balance_attack">Balanced Attack</button>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                                        <button class="btn bg-gradient-warning w-100 mb-0 toast-btn" type="button" 
                                            data-target="defending">Defending</button>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                                        <button class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button" 
                                            data-target="all_defend">All Defend</button>
                                    </div>

                                    <input type="hidden" name="tactic_input" id="tacticInput" value="">
         
                                </div>
                            </div>
                        </div>


                
                    </div>
                </div>


                <div class="position-fixed bottom-1 end-1 z-index-2">
                    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="all_attack" aria-atomic="true">
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
                
                    <div class="toast fade hide p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="balance_attack"   aria-atomic="true">
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
                
                    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="all_defend" aria-atomic="true">
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
            
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const playWingsCheckbox = document.getElementById('play_wings');
    const playCenterCheckbox = document.getElementById('play_center');
    const manMarking = document.getElementById('man_marking');
    const zoneMarking = document.getElementById('zone_marking');
    const aggressiveTackle = document.getElementById('aggressive');
    const smoothTackle = document.getElementById('smooth');
    const tacticInput = document.getElementById('tacticInput');
    
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


   
    document.querySelectorAll('.toast-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            // Get the target data attribute value
            var target = this.getAttribute('data-target');
            
            tacticInput.value = target;

            console.log(target)
        });
    });

});

</script>
