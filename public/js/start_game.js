
$(document).ready(function() {


    
    $('#country-select').change(function() {
        var countryId = $(this).val();

        if (countryId == 0) {
            $('#team-select').hide();
            $('#start-game-btn').hide();
            $('#team-info').hide();
            $('#player-info').hide();
            $('#team-players').hide();
        return;
        }
        // Make AJAX request to get teams for the selected country
        $.ajax({
            url: 'api/teams/country/' + countryId,
            type: 'GET',
            success: function(response) {
                // Clear previous options
                $('#team-select').empty();

                // Append retrieved teams to the team select box
                response.forEach(function(team) {
                    $('#team-select').append($('<option>', {
                        value: team.id,
                        text: team.name,
                        id: 'team-option-' + team.id 
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
        // $('#choose-team').hide();
        // Get the selected team's name
        var teamName = $(this).find('option:selected').text();
        // Update the button text with the selected team's name
        $('#start-game-btn').text('Play with ' + teamName);

         // Get the ID of the selected team option
        const selectedTeamId = $(this).children('option:selected').attr('id').replace('team-option-', '');
        console.log(selectedTeamId);
        // Set the value of the hidden team ID input field
        $('#team_id_hidden').val(selectedTeamId);
  


        var teamId = $(this).val();

        $.ajax({
            url: 'api/teams/' + teamId,
            type: 'GET',
            success: function(response) {

                 // Extract colors from response and convert to lowercase
                if (response.colors != null) {
                    var colors = response.colors.split(" / ").map(function(color) {
                        return color.toLowerCase().trim();
                    });
                } else {
                    var colors = ['red','white'];
                }
                
            
                $('#team-code').css({
                    'background-color': colors[1], 
                    'color': colors[0] 
                });
                $('#team-card').css({
                    'background-color': colors[0], // Assuming the first color is for background
                    'color': colors[1] // Assuming the second color is for text
                });
                $('#start-game-btn').css({
                    'background-color': colors[0], // Assuming the first color is for background
                    'color': colors[1] // Assuming the second color is for text
                });
               
                $('#team-name').text(response.name);
                $('#team-funding-year').text(response.funding_year);
                $('#team-code').text(response.code);
                $('#team-website').attr('href',response.website);
                $('#team-flag').attr('src', response.flag);

              
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

        $.ajax({
            url: 'api/players/team/' + teamId,
            type: 'GET',
            success: function(response) {
                console.log(response);
                // Clear existing table rows
                $('#team-players tbody').empty();
                 // Iterate over each player in the response and create table rows
                $.each(response, function(index, player) {

                    // Calculate age based on birth date
                    var dob = new Date(player.birth_date);
                    var ageDifMs = Date.now() - dob.getTime();
                    var ageDate = new Date(ageDifMs);
                    var age = Math.abs(ageDate.getUTCFullYear() - 1970);

                    var row = '<tr>' +
                   
                        '<th scope="row" class="text-center">' + player.name + '</th>' +
                        '<td>' + age + '</td>' +
                        '<td>' + player.position + '</td>' +
                        '<td>' + player.side + '</td>' +
                        '<td>' + player.city_of_birth + '</td>' +
                        '</tr>';
                    
                    // Append the row to the table's tbody
                    $('#team-players tbody').append(row);
                });

                // Show the table after populating it
                $('#team-players').show();
                    
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    

        $('#team-info').show();
        $('#player-info').show();
        $('#team-players').show();
    });
    
});



document.addEventListener('DOMContentLoaded', function() {
    const playerNameInput = document.getElementById('player_name_input');
    const playerNameHidden = document.getElementById('player_name_hidden');

    playerNameInput.addEventListener('input', function() {
        if (this.value.length >= 4) {
            $('#start-game-btn').show();  
            playerNameHidden.value = this.value;
        } 
    });
});
