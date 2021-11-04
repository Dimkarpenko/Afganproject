<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<style>
#feedback-form { /* вся форма */
  max-width: 550px;
  padding: 2%;
  border-radius: 3px;
  background: #14171A;
  color:#fff;
}
#feedback-form label { /* наименование полей */
  float: left;
  display: block;
  clear: right;
}
#feedback-form .w100 { /* поля */
  float: right;
  max-width: 400px;
  width: 97%;
  margin-bottom: 1em;
  padding: 1.5%;
}
#feedback-form .border { /* граница полей */
  border-radius: 1px;
  border-width: 1px;
  border-style: solid;
  border-color: #C0C0C0 #D9D9D9 #D9D9D9;
  box-shadow: 0 1px 1px rgba(255,255,255,.5), 0 1px 1px rgba(0,0,0,.1) inset;
}
#feedback-form .border:focus {
  outline: none;
  border-color: #abd9f1 #bfe3f7 #bfe3f7;
}
#feedback-form .border:hover {
  border-color: #7eb4ea #97cdea #97cdea;
}
#feedback-form .border:focus::-moz-placeholder { /* убрать при фокусе первоначальный текст поля */
  color: transparent;
}
#feedback-form .border:focus::-webkit-input-placeholder {
  color: transparent;
}
#feedback-form .border:not(:focus):not(:hover):valid { /* правильно заполненные поля */
  opacity: .8;
}
#submitFF { /* кнопка "Отправить" */
  padding: 2%;
  border: none;
  border-radius: 2px;
  border:2px solid #494949;
  background-color:#3D3D3D;
  color: #fff;
}
#feedback-form br {
  height: 0;
  clear: both;
}
#submitFF:hover {
  background-color:#464646;
  border:2px solid #575757;
}
#submitFF:focus {
  box-shadow: 0 1px 1px #fff, inset 0 1px 2px rgba(0,0,0,.8), inset 0 -1px 0 rgba(0,0,0,.05);
}
* {
  font-family:roboto,sans-serif;
}
#g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
</style>

<form enctype="multipart/form-data" id="feedback-form">
<label for="nameFF">Имя:</label>
<input type="text" name="nameFF" id="nameFF" required placeholder="например, Иван Иванович Иванов" x-autocompletetype="name" class="w100 border" style="color:#fff;background-color:#464646;border:2px solid #464646;border-radius:3px;" >
<label for="contactFF">Email:</label>
<input type="email" name="contactFF" id="contactFF" required placeholder="например, ivan@yandex.ru" x-autocompletetype="email" class="w100 border" style="color:#fff;background-color:#464646;border:2px solid #464646;border-radius:3px;">
<label for="fileFF">Прикрепить файл:</label>
<input type="file" name="fileFF[]" multiple id="fileFF" class="w100">
<label for="messageFF">Сообщение:</label>
<textarea name="messageFF" id="messageFF" required rows="5" placeholder="Детали заявки…" class="w100 border" style="color:#fff;background-color:#464646;border:2px solid #464646;border-radius:3px;resize:none;"></textarea>
<br>
<div class="g-recaptcha" data-sitekey="6Le4HOscAAAAAD9PABqQHVKKziyLE7a1BhrJ1Sib" data-theme="dark"></div><br>
<input value="Отправить" type="submit" id="submitFF">
</form>
</body>
<script>
var request;
$("#feedback-form").submit(function(event){
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
    request = $.ajax({
        url: "../scripts/send",
        type: "post",
        data: serializedData
    });
    
    request.done(function (response, textStatus, jqXHR){
        alert("Ваше сообщение получено,спасибо!");
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "Ошибка отправки сообщения: "+
            textStatus, errorThrown
        );
    });
    
    request.always(function () {
        $inputs.prop("disabled", false);
    });

});
</script>
<script>
window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>
<style>
#g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
</style>
