document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');
    let initialLocaleCode = 'zh-cn';
    let initialTimeZone = 'local';  // echo json_encode(DateTimeZone::listIdentifiers());
    let calendar = new FullCalendar.Calendar(calendarEl, {
        locale: initialLocaleCode,
        timeZone: initialTimeZone,
        themeSystem: 'bootstrap',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialDate: '2021-06-06',
        // initialView: 'timeGridWeek', // 初始化默认周

        height: 'auto',

        weekNumbers: true,
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        selectable: true,
        nowIndicator: true,
        dayMaxEvents: true, // allow "more" link when too many events
        // showNonCurrentDates: false,

        events: {
            url: 'http://wk.bk.me:8089/campus/course-schedule/calendar-json?start=2021-05-31&end=2021-07-12&_=1622902155422',
            failure: function () {
                document.getElementById('script-warning').style.display = 'block'
            }
        },
        loading: function (bool) {
            document.getElementById('loading').style.display =
                bool ? 'block' : 'none';
        }
    });

    calendar.render();
});

