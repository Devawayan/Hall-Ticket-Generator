document.addEventListener("DOMContentLoaded", function () {
    const prevMonthButton = document.getElementById("prevMonth");
    const nextMonthButton = document.getElementById("nextMonth");
    const currentMonthElement = document.getElementById("currentMonth");
    const calendarDates = document.getElementById("calendarDates");

    
    const currentDate = new Date();

    
    function updateCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();

        currentMonthElement.textContent = new Intl.DateTimeFormat("en-US", { month: "long", year: "numeric" }).format(currentDate);

        let calendarHTML = "";

        for (let i = 0; i < firstDay; i++) {
            calendarHTML += '<div class="date"></div>';
        }

        for (let i = 1; i <= daysInMonth; i++) {
            if (
                i === currentDate.getDate() &&
                year === currentDate.getFullYear() &&
                month === currentDate.getMonth()
            ) {
                calendarHTML += `<div class="date current">${i}</div>`;
            } else {
                calendarHTML += `<div class="date">${i}</div>`;
            }
        }

        calendarDates.innerHTML = calendarHTML;
    }

    updateCalendar();

    prevMonthButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
    });

    nextMonthButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
    });
});
