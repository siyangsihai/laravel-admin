<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
<button id='RequestConnection' type="button" onclick='RequestConnection();'>连接服务器</button><br /><br />
</body>
<script src="/js/jquery-min.js" type="text/javascript"></script>
<script type="text/javascript">
    var ws;
    function RequestConnection() {
        try {
          //连接服务器
          //ws = new WebSocket("ws://127.0.0.1:2000");
          ws = new WebSocket("http://www.laravel-test.com/server");
          ws.onopen = function (event) {
              alert("已经与服务器建立了连接\\r\\n当前连接状态："+this.readyState);
          };
          ws.onmessage = function (event) {
              alert("接收到服务器发送的数据：\\r\\n\""+event.data);
          };
          ws.onclose = function (event) {
              alert("已经与服务器断开连接\r\n当前连接状态："+this.readyState)
          };
          ws.onerror = function (event) {
              alert("WebSocket异常！")
          }
        } catch (e) {
            alert(e.message)
        }
    }
</script>
</html>
