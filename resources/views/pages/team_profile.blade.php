<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="team-profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Team Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
   
            <div class="page-header min-height-250 border-radius-xl mt-4"
                style="background-color: {{ (App\Models\Team::getColors($team->id)[0]) }}">
                <span class="mask    opacity-6 text-center mt-3"> TEAM Last games</span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ url( $team->flag ) }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$team->name}}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Colors {{(App\Models\Team::getColors($team->id)[0])}} / {{(App\Models\Team::getColors($team->id)[1])}}
                            </p>
                        </div>
                    </div>
      
                    
                </div>
                <div class="row">
              
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Team Information</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">{{$team->name}}</h6>
                                      
                                        <span class="mb-2 text-xs">{{ $team->address == 'null null null' ? $team->country->name : $team->address }} </span>
                                        <span class="mb-2 text-xs">Website Address: 
                                            <a href=" {{$team->website}}" target="_blank"> 
                                                <span
                                                    class="text-dark ms-sm-2 font-weight-bold">
                                                    {{$team->website}}
                                                </span>
                                            </a>
                                            </span>
                                        <span class="text-xs">Code <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{$team->code}}</span></span>
                                    </div>
                                    <p>
                                        <span
                                                class="text-dark font-weight-bold ms-sm-2"> {{$team->funding_year}}</span>
                                    </p>
                                    <p>
                                        <span
                                                class="text-dark font-weight-bold ms-sm-2"> {{$team->stadium_id}}</span>
                                    </p>
                                  
                                </li>
                               
                            </ul>
                        </div>
          

                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
