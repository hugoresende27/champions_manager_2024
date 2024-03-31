

document.addEventListener("DOMContentLoaded", function() {
    var calendarContainer = document.getElementById("calendar");

    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();

    // Example of marked days (you can replace this with your own array of marked days)
    // var markedDays = [5, 10, 15]; // Assuming 1-indexed days for simplicity
    // Fetch current game day via AJAX
    var gameId = 13;
    $.ajax({
        url: 'api/current-game-day/' + gameId,
        type: 'GET',
        success: function(response) {

            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    markedDays = [1];

    console.log(markedDays, gameId, response);


    renderCalendar(currentYear, currentMonth, markedDays);

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
