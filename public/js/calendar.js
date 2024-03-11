document.addEventListener("DOMContentLoaded", function() {
    var calendarContainer = document.getElementById("calendar");

    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();

    renderCalendar(currentYear, currentMonth);

    function renderCalendar(year, month) {
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
                    calendarHTML += '<td>' + dayCounter + '</td>';
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
