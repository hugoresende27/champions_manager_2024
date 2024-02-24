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
          <button class="button">Settings</button>
          <button class="button">Quit Game</button>
        </div>
       
      </div>
    
</body>
</html>


@include('layouts.footer'); 




