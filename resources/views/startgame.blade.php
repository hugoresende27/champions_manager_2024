@include('layouts.header')
<body>
  
  <div class="container">

    <a href={{route('home')}}  style="text-decoration: none;" class="float-left">
      <img src="{{asset('/images/logo_cm24.png')}}" alt="game_logo" width="150px" height="150px"  style="border-radius: 50%">
    </a>


    

    <div class="row col-12">

      <div class="col-4">
  

          <div id="team-info" class="card text-center" style="width: 18rem; display:none;">
            <img src="..." class="card-img-top" alt="team_logo">
            <div class="card-body">
              <h5 class="card-title">Team Info</h5>
              <p class="card-text" id="team-name"></p>
              <p class="card-text" id="team-funding-year"></p>
              <a href="#" class="btn btn-primary" id="team-code"></a>
            </div>
          </div>


      </div>

      <div class="col-4">

          <div class="p-2 m-2">
            <select id="country-select" class="form-select custom-select" aria-label="Portugal">
                <option value="0" selected>Choose a country...</option>
                @foreach ($countries as $country)
                    <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                @endforeach
            </select>
          </div>
          
          <div class="p-2 m-2">
            <select id="team-select" class="form-select custom-select" aria-label="Teams" style="display: none;">
                <option value="0" selected id="choose-team">Choose a team...</option>
                <!-- Teams will be dynamically populated here -->
            </select>
          </div>
          
          <div class="p-2 m-2">
            <a href="{{route('dashboard')}}">
              <button id="start-game-btn" class="btn btn-primary" style="display: none;"></button>
            </a>
          </div>

      </div>


      <div class="col-4">
        <div id="player-info" style="display: none">
          <div class="mb-3">
      
            <input type="text" class="form-control" id="player_name" placeholder="Coach Name">
          </div>
          <div class="mb-3">
  
            <textarea class="form-control" id="player_description" rows="3" placeholder="Coach Description"></textarea>
          </div>
        </div>
      </div>
      
    </div>


    <div class="row col-12 mt-3 p-3" id="team-players"  style="display: none; overflow-y: auto; max-height: 300px;">

      <table class="table table-dark table-striped" >
        <thead>
          <tr>
            <th scope="col" class="text-center">Full Name</th>
            <th scope="col">Age</th>
            <th scope="col">Position</th>
            <th scope="col">Side</th>
            <th scope="col">City of Birth</th>
          </tr>
        </thead>
        <tbody>
          <tr>
    
          </tr>
     
        </tbody>
      </table>
    </div>






  </div>

    





@include('layouts.footer')