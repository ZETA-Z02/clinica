function numberFloat(selector) {
  $(selector).on("input", function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9.]/g, "")
    );
  });
} 
function justStrings(selector) {
  $(selector).on("input", function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^a-zA-Z\s.,&-]/g, "")
    );
  });
}
function numberLeght(selector, maxLength) {
  $(selector).on("input", function () {
    let valor = $(this)
      .val()
      .replace(/[^0-9]/g, "");
    if (valor.length > maxLength) {
      valor = valor.slice(0, maxLength);
    }
    $(this).val(valor);
  });
}

// OCULTA LOS MODALES
$(document).ready(function () {
  $('.modal-confirmacion-global, .modal-error-global').css({ 'display': 'none' });
})
// CONFIRMACION ,,, 1=EXITO, 0=ERROR
function confirmation(type, mensaje,reload = 0) {
  if (type == 1) {
    $('.modal-confirmacion-global').css({ 'display': 'flex' });
    $("#mensaje-modal").html(mensaje);
    $("#modal-confirmacion-global").fadeIn();
    //$("#modal-confirmacion-global").show();
  }
  if (type == 0) {
    $('.modal-error-global').css({ 'display': 'flex' });
    $("#mensaje-modal-error").html(mensaje);
    $("#modal-error-global").fadeIn();
    //$("#modal-error-global").show();
  }
  $("#btn-confirm,#btn-error").on("click", function () {
    $("#modal-confirmacion-global").fadeOut();
    $("#modal-error-global").fadeOut();
    // $("#modal-confirmacion-global").hide();
    // $("#modal-error-global").hide();
  });
}



