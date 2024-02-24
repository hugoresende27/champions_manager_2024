@include('layouts.header')
<body>
  
  <div class="container">

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
      <button id="start-game-btn" class="btn btn-primary" style="display: none;"></button>
    </div>

  </div>

    


<script>
  $(document).ready(function() {
      $('#country-select').change(function() {
          var countryId = $(this).val();

          if (countryId == 0) {
            $('#team-select').hide();
            return;
          }
          // Make AJAX request to get teams for the selected country
          $.ajax({
              url: 'api/teams/' + countryId,
              type: 'GET',
              success: function(response) {
                  // Clear previous options
                  $('#team-select').empty();

                  // Append retrieved teams to the team select box
                  response.forEach(function(team) {
                      $('#team-select').append($('<option>', {
                          value: team.id,
                          text: team.name,
                      }));
                  });

                  // Show the team select box
                  $('#team-select').show();

                  // Trigger the change event of the team select box
                  $('#team-select').change();
              },
              error: function(xhr, status, error) {
                  console.error(xhr.responseText);
              }
          });
      });


      $('#team-select').change(function() {
        $('#choose-team').hide();
          // Get the selected team's name
          var teamName = $(this).find('option:selected').text();
          // Update the button text with the selected team's name
          $('#start-game-btn').text('Play with ' + teamName);
          // Show the button
          $('#start-game-btn').show();
      
      });
      
  });
</script>


@include('layouts.footer'); 