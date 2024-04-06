
document.addEventListener("DOMContentLoaded", function() {
    var calendarContainer = document.getElementById("calendar");
    var gameId = document.getElementById('gameId').dataset.var;
    var markedDays = [];
    var awayTeams = [];
    var fullObjectAwayGames = [];
    var year = '';
    var month = '';
    // Make request to get current game day
    $.ajax({
        url: 'api/current-game-day/' + gameId,
        type: 'GET',
        success: function(response) {
            var gameDate = new Date(response);
            if (!isNaN(gameDate.getTime())) {

                year = gameDate.getFullYear();
                month = gameDate.getMonth();
                var day = gameDate.getDate();
                markedDays.push(day);
                // renderCalendar(year, month, day, gameDays, fullObjectAwayGames);
            } else {
                console.error('Invalid date format received from the server.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    // Make request to get all matches
    $.ajax({
        url: 'api/all-matches/' + gameId,
        type: 'GET',
        success: function(response) {
            var gameDays = [];

         
            response.forEach(function(match) {


                var gameDate = new Date(match.game_date);
                if (!isNaN(gameDate.getTime())) {
                    var day = gameDate.getDate();
                    if (!gameDays.includes(day)) {
                        gameDays.push(day); 
                    }
                }

                var awayTeam = match.away_team_id;
                if (!isNaN(awayTeam)) {
   
                    if (!gameDays.includes(awayTeam)) {
                        awayTeams.push(awayTeam); 
                    }
                }

                 // Create an object with game_date and away_team_id properties
                var fullObjectAwayGame = {
                    game_date: match.game_date,
                    away_team_id: match.away_team_id
                };

            
   
                if (!fullObjectAwayGames.includes(fullObjectAwayGame)) {
                    fullObjectAwayGames.push(fullObjectAwayGame); 
                }
                
            });
            renderCalendar(year, month, markedDays, gameDays,fullObjectAwayGames); // Pass gameDays to renderCalendar
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    function renderCalendar(year, month, currentDay, gameDays, fullObjectAwayGames) {

        var currentDate = new Date();
        year = year || currentDate.getFullYear();
        month = month || currentDate.getMonth();
    
        var daysInMonth = new Date(year, month + 1, 0).getDate();
        var firstDayOfMonth = new Date(year, month, 1).getDay();
    
        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
    
        var calendarHTML = '<div class="calendar-header">' + monthNames[month] + ' ' + year + '</div>';
        calendarHTML += '<table class="calendar-table">';
        calendarHTML += '<thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>';
        calendarHTML += '<tbody>';
    
        var dayCounter = 1;
        for (var i = 0; i < 6; i++) {
            calendarHTML += '<tr>';
            for (var j = 0; j < 7; j++) {
                if (i === 0 && j < firstDayOfMonth) {
                    calendarHTML += '<td></td>';
                } else if (dayCounter > daysInMonth) {
                    break;
                } else {
                    var isMarked = currentDay.includes(dayCounter);
                    var isGameDay = gameDays.includes(dayCounter);
                    var isAwayTeam = false;
                    var awayTeamId = null;
                    fullObjectAwayGames.forEach(function(game) {
                        // console.log(
                        //     new Date(year, month, dayCounter).toLocaleDateString(), 
                        //     new Date(game.game_date).toLocaleDateString()
                        // );
                        if (new Date(year, month, dayCounter).toLocaleDateString() === new Date(game.game_date).toLocaleDateString()) {
                            isAwayTeam = true;
                            awayTeamId = game.away_team_id;
                        }
                    });
    
               
                    // Add a CSS class based on whether the day is marked or a game day
                    var cellClass = isMarked ? 'current-day' : '';
                    if (isGameDay) {
                        cellClass += ' game-day';
                    }
                    if (isAwayTeam) {
                        cellClass += ' away-team'; // Define CSS class for away team
                    }
    
                    // Add ID of the away team as data attribute
                    var awayTeamUrl = isAwayTeam ? 'api/teams/' + awayTeamId : ''; // Construct URL based on away team ID
                    calendarHTML += '<td class="' + cellClass + '" data-away-team-id="' + awayTeamId + '" data-away-team-url="' + awayTeamUrl + '"><a href="' + awayTeamUrl + '">' + dayCounter + '</a></td>';
                    dayCounter++;
                }
            }
            calendarHTML += '</tr>';
            if (dayCounter > daysInMonth) {
                break;
            }
        }
    
        calendarHTML += '</tbody></table>';
        calendarContainer.innerHTML = calendarHTML;
    }
    
    
    
});
