@include('layouts.header')
<body>
  
    <div class="container">

        <a href={{route('home')}}  style="text-decoration: none;" >
          <img src="{{asset('/images/logo_cm24.png')}}" alt="cm_logo" style="border-radius: 50%">
        </a>
        <div class="buttons">
          <a href="{{route('startgame')}}">
            <button class="button">Start Game</button>
          </a>
          <button class="button" data-toggle="modal" data-target="#databaseModal">Database</button>
          <button class="button">Quit Game</button>
        </div>
       
      </div>


      <!-- Modal -->
    <div class="modal fade" id="databaseModal" tabindex="-1" aria-labelledby="databaseModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="databaseModalLabel">Seed Database Options</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <a href="{{route('countries.seed')}}">
              <button class="btn btn-primary">Countries ({{App\Models\Country::count()}})</button>
            </a>
            <a href="{{route('teams.seed')}}">
              <button class="btn btn-primary">Teams({{App\Models\Team::count()}})</button>
            </a>
            <a href="{{route('players.seed')}}">
              <button class="btn btn-primary">Players({{App\Models\Player::count()}})</button>
            </a>


          </div>
        </div>
      </div>
    </div>

    
</body>
</html>


@include('layouts.footer'); 




