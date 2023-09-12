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
    panda.util.log(info, "lime");
    // const modal = document.querySelector("#modal");
    // modal.classList.add("show");
    // const modal = new bootstrap.Modal('#myModal');
    const datestart = new Date(info.startStr);
    const dateend = new Date(info.endStr);
    if(datestart.getHours() == 0 && datestart.getMinutes() == 0 && dateend.getHours() == 0 && dateend.getMinutes() == 0){
        
    }
    const myModalEl = document.querySelector('#modal');
    myModalEl.querySelector(".modal-title").innerHTML = "Ajoutés un Entretiens";
    let confirmform = panda.util.newelem("form",{"className":"d-flex flex-column container-fluid col-10 col-sm-8 col-md-6 m-5","method":"POST"});
    // confirmform.appendChild(createinputform("date","f_datestart","Date de début","date")); wip
    myModalEl.querySelector(".modal-body").innerHTML = confirmform.outerHTML;
    const modal = new bootstrap.Modal(myModalEl);
    modal.show();
}
function createinputform(name, id, labe,type="text"){
    let newinput = panda.util.newelem("div",{"class":"form-group row"});
    newinput.appendChild(panda.util.newelem("label",{"for":id,"class":"col-form-label align-middle","innerHTML":label}));
    let input = panda.util.newelem("div",{"class":"codl-sm-10"});
    input.appendChild(panda.util.newelem("input",{"type":type,"class":"form-control","id":id,"name":name}));
    newinput.appendChild(input);
    return newinput;
}