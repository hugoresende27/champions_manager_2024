

document.addEventListener("DOMContentLoaded", function() {
    var calendarContainer = document.getElementById("calendar");

    var gameId = document.getElementById('gameId').dataset.var;

    var markedDays = []; 

    $.ajax({
        url: 'api/current-game-day/' + gameId,
        type: 'GET',
        success: function(response) {

            var gameDate = new Date(response);
            // Check if the parsed date is valid
            if (!isNaN(gameDate.getTime())) {
                // If valid, get the year, month, and day
                var year = gameDate.getFullYear();
                var month = gameDate.getMonth();
                var day = gameDate.getDate();
                // Add year, month, and day to the markedDays array
                markedDays.push(day);

                // Render the calendar with the marked days
                renderCalendar(year, month, markedDays);
            } else {
                console.error('Invalid date format received from the server.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    
    // markedDays = [day];

    


    // renderCalendar(currentYear, currentMonth, markedDays);

    function renderCalendar(year, month, markedDays) {
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
                    // Check if the current day is in the array of marked days
                    var isMarked = markedDays.includes(dayCounter);
                    // Add a class to mark the day if it's in the array of marked days
                    calendarHTML += '<td class="' + (isMarked ? 'marked-day' : '') + '">' + dayCounter + '</td>';
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
