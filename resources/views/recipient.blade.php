@extends('main')
@section('content')
    <h2>Здесть должны отображаться новые сообщения в реальном времени.</h2>
    <div>
        <div><b>Сообщения:</b></div>
        <div id = "msg_container">

        </div>
    </div>
    <script async>
        let socket = new WebSocket("ws://192.168.56.1:8080");

        socket.onopen = function(e) {
            console.log("[open] Соединение установлено");
            console.log("Отправляем данные на сервер");
            socket.send("Тестовое сообщение WS-сервера.");
        };

        socket.onmessage = function(event) {
            const newMessageDiv = document.createElement('div');

            newMessageDiv.textContent = event.data;

            newMessageDiv.style.border = "1px solid #ccc";
            newMessageDiv.style.margin = "5px";
            newMessageDiv.style.padding = "10px";

            document.getElementById('msg_container').appendChild(newMessageDiv);
        };

        socket.onclose = function(event) {
            if (event.wasClean) {
                console.log(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
            } else {
                // например, сервер убил процесс или сеть недоступна
                // обычно в этом случае event.code 1006
                console.log('[close] Соединение прервано');
            }
        };

        socket.onerror = function(error) {
            console.log(`[error]`);
        };
    </script>
@endsection
