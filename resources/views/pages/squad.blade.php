<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="squad"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Squad"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">

                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class=" shadow-primary border-radius-lg pt-4 pb-3"
                                     style="background-color: {{(App\Models\Team::getColors(auth()->user()->team_id)[0])}};
                                     color: {{(App\Models\Team::getColors(auth()->user()->team_id)[1])}}">
                                    
                         

                                    <div class="row p-2">
                                        <div class="col-md-6">
                                            <h6 class="text-white text-capitalize ps-3">
                                                <span class="float-left">Squad</span>
                                            </h6>
                                        </div>
                                        <div class="col-md-5 text-end">
                                            <h6 class="text-white text-capitalize">
                                                {{ (App\Services\GameService::userTeamName()->name)}}
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                      
                            
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Name
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Position
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Age
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nationality
                                                </th>
                                                <th   
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Form
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($team as $player)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="{{ asset('assets') }}/img/drake.jpg"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{$player->name}}</h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    €{{ number_format($player->salary, 2, ',', '.') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{$player->position}}</p>
                                                        <p class="text-xs text-secondary mb-0">{{$player->side}}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @php
                                                            $birthDate = $player->birth_date;
                                                            $age = date_diff(date_create($birthDate), date_create('now'))->y;
                                                        @endphp
                                                        {{$age}}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $player->country->name }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                   
                                                        <span class="badge badge-sm bg-gradient-success">Good</span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
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
