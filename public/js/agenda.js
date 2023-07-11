document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('agenda');


  var calendar = new FullCalendar.Calendar(calendarEl, {

      initialView: 'listWeek',
      //cambiamos de idioma a aespañol
      locale: 'esLocale',

      headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,listWeek',
          locale: 'esLocale'
      },
      


      dateClick: function(info) {
          $("#evento").modal("show");
      }
  });
  

  calendar.render();
});


