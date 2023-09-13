// import { panda } from 'https://pandatown.fr/lib/pandalib.js';
import { panda } from './pandalib.js';
document.addEventListener('DOMContentLoaded', function() {
    const divcalendar = document.getElementById("calendar");
    let calendar = new FullCalendar.Calendar(divcalendar, {
        selectable: true,
        buttonText: {
            today: "Aujourd'hui",
            month: "Mois",
            week: "Semaine",
            day: "Jour",
        },
        initialView: "timeGridWeek",
        themeSystem: "bootstrap",
        timeZone: "local",
        nowIndicator: true,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek",
        },
        locale: "fr",
        events: [],
        select: addcalendar
    });
    calendar.render();
});
function addcalendar(info){
    // panda.util.log(info, "lime");
    // const modal = document.querySelector("#modal");
    // modal.classList.add("show");
    // const modal = new bootstrap.Modal('#myModal');
    const datestart = new Date(info.startStr);
    const dateend = new Date(info.endStr);
    const myModalEl = document.querySelector('#modal');
    myModalEl.querySelector(".modal-title").innerHTML = "Ajoutés un Entretiens";
    //get time utc paris YYYY-MM-DD
    panda.util.log(datestart.toLocaleString().substring(0, 10), "lime"); 
    panda.util.log(datestart.toLocaleString().substring(11, 19), "lime"); 
    
    // panda.util.log(datestart, "lime"); 
    let confirmform = panda.util.newelem("form",{"className":"d-flex flex-column container-fluid col-10 col-sm-8 col-md-6 m-5","method":"POST"});
    confirmform.appendChild(createinputform("f_date","f_datestart","Date de début","date",datestart.toLocaleString().substring(0, 10)));
    confirmform.appendChild(createinputform("f_start","f_start","Heure du rendez vous","time",datestart.toLocaleString().substring(11, 19)));
    confirmform.appendChild(createinputform("f_end","f_end","Heure de fin du rendez vous","time",dateend.toLocaleString().substring(11, 19)));
    if(datestart.getHours() != 0 && datestart.getMinutes() == 0 && dateend.getHours() == 0 && dateend.getMinutes() == 0){

    }

    confirmform.appendChild(panda.util.newelem("button",{"type":"submit","className":"btn btn-primary","innerHTML":"Ajouter"}));
    
    myModalEl.querySelector(".modal-body").innerHTML = confirmform.outerHTML;
    const modal = new bootstrap.Modal(myModalEl);
    modal.show();
}
function createinputform(name, id, label,type="text",value){
    let newinput = panda.util.newelem("div",{"className":"form-group row"});
    newinput.appendChild(panda.util.newelem("label",{"htmlFor":id,"className":"col-form-label align-middle","innerHTML":label}));
    let input = panda.util.newelem("div",{"className":"codl-sm-10"});
    input.appendChild(panda.util.newelem("input",{"type":type,"className":"form-control","id":id,"name":name,value: value}));
    panda.util.log([name,id,label,type,value],"yellow");
    newinput.appendChild(input);
    return newinput;
}