let request = new XMLHttpRequest();

function requestData() { // fordert die Daten asynchron an
    "use strict";
    request.open("GET", "ExamApi.php"); // URL für HTTP-GET
    request.onreadystatechange = processData; //Callback-Handler zuordnen
    request.send(null); // Request abschicken
}

function processData() {
    "use strict";
    if (request.readyState === 4) { // Uebertragung = DONE
        if (request.status === 200) { // HTTP-Status = OK
            if (request.responseText != null)
                process(request.responseText); // Daten verarbeiten
            else console.error("Dokument ist leer");
        } else console.error("Uebertragung fehlgeschlagen");
    } // else; // Uebertragung laeuft noch
}

function process(data) {
    "use strict";
    let dataObject = JSON.parse(data);
    let ranking = document.getElementById("ranking");

    ranking.innerText=dataObject.rank;
}

function pollRank() {
    "use strict";
    requestData();
    window.setInterval(requestData, 1000);
}

window.onload=pollRank;