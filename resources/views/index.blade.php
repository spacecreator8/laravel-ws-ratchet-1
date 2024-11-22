@extends('main')
@section('content')
    <div>Проверка связи.</div>
    <br>
    <form>
        @csrf
        <input type="text" name="msg" id="target"><br>
        <input type="submit" value="Send" onclick="sendMessage()">
    </form>
    <br>
    <p id="message"></p>
    <script async>
        let socket = new WebSocket("ws://192.168.56.1:8080");

        socket.onopen = function(e) {
            console.log("[open] Соединение установлено");
            console.log("Отправляем данные на сервер");
            // socket.send("Меня зовут Джон");
        };

        socket.onmessage = function(event) {
            document.getElementById('message').append(event.data);
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
        let  sendMessage = function(){
            let data = document.getElementById('target').value;
            socket.send(data);
        }

    </script>
@endsection
