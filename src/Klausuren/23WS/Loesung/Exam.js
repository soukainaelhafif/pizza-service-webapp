// request als globale Variable anlegen (haesslich, aber bequem)
let requestSession = new XMLHttpRequest();

let requestSearch = new XMLHttpRequest();

function setSessionData(element) { // fordert die Daten asynchron an
    requestSession.open("GET", "ExamService.php?star=" + element.dataset.artikelid); // URL für HTTP-GET
    requestSession.send(null); // Request abschicken
    if (element.classList.contains('star-full')) {
        element.classList.remove('star-full');
    } else {
        element.classList.add('star-full');
    }
}

function requestData() { // fordert die Daten asynchron an
    element = document.getElementById('input');
    
    requestSearch.open("GET", "ExamAPI.php?input=" + element.value); // URL für HTTP-GET
    requestSearch.onreadystatechange = processData; //Callback-Handler zuordnen
    requestSearch.send(null); // Request abschicken
}

function processData() {
	if(requestSearch.readyState == 4) { // Uebertragung = DONE
		if (requestSearch.status == 200) {   // HTTP-Status = OK
            while (output.firstChild) {
                document.getElementById('output').removeChild(output.lastChild);
            }
			process(requestSearch.responseText);// Daten verarbeiten   
		} 
		else console.error ("Uebertragung fehlgeschlagen");
	} else ;          // Uebertragung laeuft noch
}

function process(data) {
    let dataDecoded = JSON.parse(data);
    let output = document.getElementById('output');

    if(!dataDecoded.length) {
        let heading = document.createElement('h3');
        heading.innerText = 'Es wurden keine Artikel gefunden';
        output.appendChild(heading);
    } else {
        let headingFound = document.createElement('h3');
        headingFound.classList.add('headingFound');
        headingFound.innerText = 'Folgende Artikel wurden gefunden:';
        output.appendChild(headingFound);

        dataDecoded.forEach(element => {
            let heading = document.createElement('p');
            heading.classList.add('heading');
            heading.innerText = 'Artikelnummer: ' + element.artikelnummer + ' Name: ' + element.name + ' Preis: ' + element.preis;
            output.appendChild(heading);
        });
    }
}