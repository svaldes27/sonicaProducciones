document.addEventListener('DOMContentLoaded', function() {
  let formulario = document.querySelector("form");
  
    var calendarEl = document.getElementById('agenda');


  var calendar = new FullCalendar.Calendar(calendarEl, {
    
    locale: "es",
    initialView: 'dayGridMonth',

    

    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek',
    },
    


    dateClick: function(info) {
        $("#evento").modal("show");
    }


  });
  

  calendar.render();

  document.getElementById('btnSave').addEventListener("click", function(){
    console.log('guardando...')
    const datos = new FormData(formulario);    

  })
});


