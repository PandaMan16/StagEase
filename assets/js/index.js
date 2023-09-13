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
    // panda.util.log(datestart.toLocaleString().substring(0, 10), "lime"); 
    // panda.util.log(datestart.toLocaleString().substring(11, 19), "lime"); 
    let date = datestart.toLocaleString().substring(0, 10);
    date = date.substring(6, 10) + "-" + date.substring(3, 5) + "-" + date.substring(0, 2);
    // panda.util.log(datestart, "lime"); 
    let confirmform = panda.util.newelem("form",{"method":"POST","action":"/Planning/Add"});
    confirmform.appendChild(createinputform("f_date","f_datestart","Date de début","date",date));
    confirmform.appendChild(createinputform("f_start","f_start","Heure du rendez vous","time",datestart.toLocaleString().substring(11, 19)));
    confirmform.appendChild(createinputform("f_end","f_end","Heure de fin du rendez vous","time",dateend.toLocaleString().substring(11, 19)));
    confirmform.appendChild(createinputform("f_name","f_name","Nom du stagiaire visité","text",""));
    confirmform.appendChild(createinputform("f_entreprise","f_entreprise","Entreprise","text",""));
    confirmform.appendChild(createinputform("f_adresse","f_adresse","Adresse","text",""));
    confirmform.appendChild(createinputform("f_c_postal","f_c_postal","Code Postal","text",""));
    confirmform.appendChild(createinputform("f_ville","f_ville","Ville","text",""));
    confirmform.appendChild(createinputform("f_tel","f_tel","Téléphone","text",""));
    if(datestart.getHours() != 0 && datestart.getMinutes() == 0 && dateend.getHours() == 0 && dateend.getMinutes() == 0){

    }
    confirmform.appendChild(panda.util.newelem("button",{"type":"submit","className":"btn btn-primary","innerHTML":"Ajouter"}));
    myModalEl.querySelector(".modal-body").innerHTML = confirmform.outerHTML;
    myModalEl.querySelector(".modal-footer").style.display = "none";
    const modal = new bootstrap.Modal(myModalEl);
    modal.show();
}
function createinputform(name, id, label,type="text",value){
    let newinput = panda.util.newelem("div",{"className":"form-group row"});
    newinput.appendChild(panda.util.newelem("label",{"htmlFor":id,"className":"col-form-label align-middle","innerHTML":label}));
    let input = panda.util.newelem("div",{"className":"codl-sm-10"});
    input.appendChild(panda.util.newelem("input",{"type":type,"className":"form-control","id":id,"name":name,value: value}));
    // panda.util.log([name,id,label,type,value],"yellow");
    newinput.appendChild(input);
    return newinput;
}