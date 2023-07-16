

document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioEvento");
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {

      initialView: 'dayGridMonth',

      locale:"es",

      headerTooblbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },

      events: "http://127.0.0.1:8000/agenda/mostrar",

      dateClick:function(info){
        formulario.reset();
        formulario.start.value=info.dateStr;
        $("#evento").modal("show");
      },

      eventClick:function(info){

        var evento = info.event;

        axios.post("http://127.0.0.1:8000/agenda/modificar/"+info.event.id).then(
          (respuesta) =>{

            formulario.id.value= respuesta.data.id;
            formulario.local_id.value= respuesta.data.local_id;
            formulario.banda_id.value= respuesta.data.banda_id;
            formulario.start.value= respuesta.data.start;

          $("#evento").modal("show");
        }
        ).catch(
          error=>{
            if(error.response){
              console.log(error.response.data);
            }
          }
        )  
      }

    });

    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click",function(){
       
      enviarDatos("http://127.0.0.1:8000/agenda/agregar")

    });

    document.getElementById("btnEliminar").addEventListener("click",function(){
       
      enviarDatos("http://127.0.0.1:8000/agenda/eliminar/"+formulario.id.value);

    });

    document.getElementById("btnModificar").addEventListener("click",function(){
       
      enviarDatos("http://127.0.0.1:8000/agenda/actualizar/"+formulario.id.value);

    });



    function enviarDatos(url){

      const datos = new FormData(formulario);
      axios.post(url,datos).then(
          (respuesta) =>{
            calendar.refetchEvents();
            $("#evento").modal("hide");
          }
          ).catch(
            error=>{
              if(error.response){
                console.log(error.response.data);
              }
            }
          ) 
      }


});

