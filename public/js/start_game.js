
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
        // Show the button
        $('#start-game-btn').show();


        var teamId = $(this).val();

        $.ajax({
            url: 'api/teams/' + teamId,
            type: 'GET',
            success: function(response) {
            // Update team info card with the retrieved team information
            $('#team-name').text(response.name);
            $('#team-funding-year').text(response.funding_year);
            $('#team-code').text(response.code);
            // You can update other fields similarly
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
