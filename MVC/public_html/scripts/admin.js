let formDelPhoto = document.querySelectorAll('.formDelPhoto');
let formDelFeedBack = document.querySelectorAll('.formDelFeedBack');
let formBunFeedBack = document.querySelectorAll('.formBunFeedBack');
let formConfFeedBack = document.querySelectorAll('.formConfirmFeedBack');

formDelPhoto.forEach(function (formDelButton) {
    formDelButton.addEventListener('click', function (event) {

        let id = event.srcElement.dataset.id;
        let nameImg = event.srcElement.dataset.name;
        (
            async () => {
                const response = await fetch('/gallery/delete', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                        name: nameImg
                    })
                });

                let result = await response.json();
                if (result['status'] === 'Ok') {
                    document.getElementById(id).remove();
                    document.getElementById('deleteImage').innerText = "Удалено";
                } else {
                    document.getElementById('deleteImage').innerText = "Что-то пошло не так";
                }
            }
        )();
    })
});

formDelFeedBack.forEach(function (formDelFeedButton) {
    formDelFeedButton.addEventListener('click', function (event) {

        let id = event.srcElement.dataset.id;
        let name = event.srcElement.dataset.name;
        (
            async () => {
                const response = await fetch('/feedback/delete', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                    })
                });

                let result = await response.json();
                if (result['status'] === 'Ok') {
                    document.getElementById(id).remove();
                } else {
                    alert("Ошибка!")
                }
            }
        )();
    })
});

formBunFeedBack.forEach(function (formBunFeedButton) {
    formBunFeedButton.addEventListener('click', function (event) {

        let id = event.srcElement.dataset.id;
        let name = event.srcElement.dataset.name;
        (
            async () => {
                const response = await fetch('/feedback/bun', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                    })
                });

                let result = await response.json();
                if (result['status'] === 'Ok') {
                    document.getElementById(id).classList.remove("alert__success");
                    document.getElementById(id).classList.add("alert__danger");
                } else {
                    alert("Ошибка!")
                }
            }
        )();
    })
});

formConfFeedBack.forEach(function (formConfFeedButton) {
    formConfFeedButton.addEventListener('click', function (event) {

        let id = event.srcElement.dataset.id;
        let name = event.srcElement.dataset.name;
        (
            async () => {
                const response = await fetch('/feedback/confirm', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id,
                    })
                });

                let result = await response.json();
                if (result['status'] === 'Ok') {
                    document.getElementById(id).classList.remove("alert__danger");
                    document.getElementById(id).classList.add("alert__success");
                } else {
                    alert("Ошибка!")
                }
            }
        )();
    })
});