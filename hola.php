<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.5.0/js/conekta.js"></script>
<script type="text/javascript">

 // Conekta Public Key
  Conekta.setPublishableKey('key_E9ZJ6M3hWCJ14iNwWApCDAg'); //v3.2
 //Conekta.setPublicKey('key_KJysdbf6PotS2ut2'); //v5+

 // ...
</script>

</head>
<form action="php.php" method="POST" id="card-form">
  <span class="card-errors"></span>
  <div class="form-row">
    <label>
      <span>Nombre del tarjetahabiente</span>
      <input type="text" size="20" data-conekta="card[name]"/>
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Número de tarjeta de crédito</span>
      <input type="text" size="20" data-conekta="card[number]"/>
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-conekta="card[cvc]"/>
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Fecha de expiración (MM/AAAA)</span>
      <input type="text" size="2" data-conekta="card[exp_month]"/>
    </label>
    <span>/</span>
    <input type="text" size="4" data-conekta="card[exp_year]"/>
  </div>
<!-- Información recomendada para sistema antifraude -->

  <button type="submit">¡Pagar ahora!</button>
</form>

<script>
$(function () {
  $("#card-form").submit(function(event) {
    var $form = $(this);

    // Previene hacer submit más de una vez
    $form.find("button").prop("disabled", true);
    Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
   //Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler); //v5+

    // Previene que la información de la forma sea enviada al servidor
    return false;
  });
});
var conektaSuccessResponseHandler = function(token) {
  var $form = $("#card-form");

  /* Inserta el token_id en la forma para que se envíe al servidor */
  $form.append($("<input type='hidden' name='conektaTokenId'>").val(token.id));

  /* and submit */
  $form.get(0).submit();
};
var conektaErrorResponseHandler = function(response) {
  var $form = $("#card-form");

  /* Muestra los errores en la forma */
  $form.find(".card-errors").text(response.message_to_purchaser);
  $form.find("button").prop("disabled", false);
};
</script>
<body>
</body>
  </html>
