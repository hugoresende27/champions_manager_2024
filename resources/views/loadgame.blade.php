@include('layouts.header')
<body>

  <div class="container">

    <div class="container-fluid py-4">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <div class="card mt-4">
                  <div class="card-header p-3 text-center">
                      <h5 class="mb-0">Saved Games</h5>
                  </div>
                  <div class="card-body p-3 pb-0">
                    <div class="table-responsive">
                      <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th>Coach</th>
                            <th>Team</th>
                            <th>Current Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($loads as $loadUser)
                          <tr style="background-color: {{ App\Models\Team::getColors($loadUser->team_id)[1] }}; color: {{ App\Models\Team::getColors($loadUser->team_id)[0] }}">
                            <td>{{ $loadUser->name }}</td>
                            <td>{{ $loadUser->team()->first()->name }}</td>
                            <td>{{ $loadUser->game()->first()->current_date }}</td>
                            <td>
                              <a href="{{ route('loadgame', ['game_id' => $loadUser->id]) }}">
                                <button class="btn" type="button"  
                                  style="background-color: {{ App\Models\Team::getColors($loadUser->team_id)[0] }}; color: {{ App\Models\Team::getColors($loadUser->team_id)[1] }}" 
                                  data-target="successToast">LOAD</button>
                              </a>
                              <form action="{{ route('deletegame', ['game_id' => $loadUser->game_id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                
              </div>
          </div>

          <div class="text-center mt-3">
            <a href="/">
              <button class="btn btn-success">Back</button>
            </a>
          </div>
      </div>
    </div>

  </div>

@include('layouts.footer')
