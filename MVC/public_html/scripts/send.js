formMail.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('/mail/send/', {
        method: 'POST',
        body: new FormData(formMail)
    });

    let result = await response.json();
    if (result['status'] === 'Ok') {
        document.getElementById('MailSend').innerText = "Ваше письмо отправленно, в ближайшее время с Вами свяжется специалист!";
        document.getElementById('MailDiv').remove();
    } else {
        document.getElementById('MailSend').innerText = "Проверьте правильность заполнения формы...";
    }
};

formFeedback.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('/feedback/send/', {
        method: 'POST',
        body: new FormData(formFeedback)
    });

    let result = await response.json();
    if (result['status'] === 'Ok') {
        document.getElementById('feedbackModerator').innerText = "Отзыв отправлен...";
        document.getElementById('feedbackDiv').remove();
    } else {
        document.getElementById('feedbackModerator').innerText = "Проверьте правильность заполнения формы...";
    }
};