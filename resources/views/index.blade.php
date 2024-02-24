@include('layouts.header')
<body>
  
    <div class="container">

        <a href="https://github.com/hugoresende27?tab=repositories" target="_blank" style="text-decoration: none;">
          <h1 class="title">Champions Manager 2024</h1>
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




