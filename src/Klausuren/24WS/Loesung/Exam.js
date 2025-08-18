document.addEventListener('DOMContentLoaded', function () {
    let request = new XMLHttpRequest();

    function requestData() {
        let userName = document.getElementById('userName');

        if (userName.value) {
            let url = "ExamApi.php?user=" + encodeURIComponent(userName.value);
            request.open("GET", url);
            request.onreadystatechange = function () {
                processData(request);
            };
            request.send(null);
        }
    }

    function processData(request) {
        if (request.readyState == 4) {
            if (request.status == 200) {
                if (request.responseText != null) {
                    process(request.responseText);
                } else {
                    console.error("Dokument ist leer");
                }
            } else {
                console.error("Übertragung fehlgeschlagen");
            }
        }
    }

    function process(data) {
        let dataDecoded = JSON.parse(data);

        if (dataDecoded.exists) {
            document.getElementById('output').innerText = 'Benutzer ist vergeben!';
            document.getElementById('submit-button').disabled = true;
        } else {
            document.getElementById('output').innerText = 'Benutzername ist verfügbar!';
            document.getElementById('submit-button').disabled = false;
        }
    }

    function passwordCheck() {
        password = document.getElementById('password').value;
        outputStrength = document.getElementById('outputStrength');

        if (password.length < 4) {
            outputStrength.innerText = "Schwach"

            outputStrength.classList.remove("ok", "strong");
            outputStrength.classList.add("week");
        } else if (password.length > 8) {
            outputStrength.innerText = "Stark"

            outputStrength.classList.remove("week", "ok");
            outputStrength.classList.add("strong");
        } else {
            outputStrength.innerText = "Ok"

            outputStrength.classList.remove("week", "strong");
            outputStrength.classList.add("ok");
        }
    }

    let userInput = document.getElementById('userName');
    if (userInput) {
        userInput.addEventListener('input', function () {
            requestData();
        });
    }

    let passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function () {
            passwordCheck();
        });
    }
});