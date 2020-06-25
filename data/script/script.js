let key;
let email;

function submitToRegistrationFunction() {

    if (document.getElementById('key').value && document.getElementById('email').value) { //

        key = document.getElementById('key').value;
        email = document.getElementById('email').value;

        let xhr = new XMLHttpRequest();
        // проверяем, возможна ли отправка SMS с данного аккаунта
        xhr.open("GET", 'https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=' + email + '&key=' + key +'&to=61411111111&message=testingMessage/');
        xhr.onload = function () {
            let result = xhr.responseText;
            if (result.indexOf('<errortext>Success</errortext>') !== -1) { // я не знаю, как сделать эту проверку по феншую. Надеюсь, что меня этому научат у вас в компании :)

                let xhr2 = new XMLHttpRequest();
                xhr2.open("GET", '/data/engine/setNewUser.php?email=' + email + '&key=' + key);
                xhr2.onload = function () {
                    let result2 = xhr2.responseText;
                    if (result2 == 1) { // возвращается модулем записи в БД при успешном добавлении в базу новой записи
                        document.getElementById('indicator').innerText = "В базу добавлен новый пользователь";
                        setTimeout(() => modalRender(), 1000);
                    } else if (result2 == 0) { // возвращается, если ключ валиден, отсутствует в базе SQL, но записать в базу почему-то не вышло
                        document.getElementById('indicator').innerText = 'Что-то пошло не так... Обратитесь к разработчику.';
                    } else if (result2 == 'ok') { // возвращается, если в БД уже есть запись с валидными данными
                        document.getElementById('indicator').innerText = "Открываем форму отправки SMS...";
                        setTimeout(() => modalRender(), 1000);
                    } else { // позвоните по телефону +79271121204, если это условие когда-нибудь отработает
                        document.getElementById('indicator').innerText = result2;
                    }
                }
                xhr2.send();
            } else { // если введённые в форму данные отсутствуют в базе clicksend.com
                document.getElementById('indicator').innerHTML = 'Данные невалидны. Извините, мы не знаем, по какой причине. Проверьте правильность ввода или обратитесь в <a href="https://developers.clicksend.com/docs/">Спортлото</a>.';
            }
        }
        xhr.send();
    } else { // если пользователь наркоман или просто невнимателен
        document.getElementById('indicator').innerText = "Заполните необходимые поля!"
    }
}

function modalRender() { // открываем модалку
    document.getElementById('modal').style = 'display: flex';
}

function submitSMS() {  // функция отправки SMS
    if (document.getElementById('phone').value && document.getElementById('text').value) {
        let phone = document.getElementById('phone').value;
        let text = document.getElementById('text').value;
        let xhr = new XMLHttpRequest();
        xhr.open("GET", 'https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=' + email + '&key=' + key +'&to=' + phone + '&message=' + text + '/');
        xhr.onload = function () {
            let result = xhr.responseText;
            if (result.indexOf('<errortext>Success</errortext>') !== -1) {
                document.getElementById('modalIndicator').innerText = "Отправка сообщения прошла успешно! Хотя, в своё время SMS для подтверждения регистрации на clicksend.com разработчику так и не пришло, пришлось голосовым сервисом пользоваться - так что всякое может быть."
            } else {
                document.getElementById('modalIndicator').innerText = "Сообщение не отправлено. Возможно, на вашем счёте недостаточно средств.";
            }
        }
        xhr.send();
    } else {
        document.getElementById('modalIndicator').innerText = "Заполните необходимые поля!"
    }
}

function cancel() { // закрываем модалку
    document.getElementById('modal').style = 'display: none';
}
