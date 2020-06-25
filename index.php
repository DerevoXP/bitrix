<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data/css/main.css">
    <title>DerevoXP ClickSend</title>
</head>

<body>

    <div class="root">

        <div class="place">

            <input id="key" name="key" pattern="[A-Z0-9-]{1,50}" placeholder='Введите API-key' />
            <input id="email" type="email" pattern="\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}" placeholder='Введите email' />
            <button onclick="submitToRegistrationFunction()">SEND</button>
            <div id="indicator"></div>

        </div>

        <div id='modal'>

                <input id="phone" name="phone" placeholder='Введите телефон адресата' />
                <textarea id="text" type="text" placeholder='Введите сообщение'></textarea>
                <button onclick="submitSMS()">SEND</button>
                <button onclick="cancel()">CANCEL</button>
                <div id="modalIndicator"></div>

        </div>

    </div>

    <script src="/data/script/script.js"></script>

</body>

</html>

<!-- derevoxp2015@gmail.com
6B4F96D2-8584-B37D-803C-D9503E05A920 -->