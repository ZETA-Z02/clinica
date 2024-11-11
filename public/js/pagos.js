//var host = "192.168.1.41";
var host = "localhost";
$(document).ready(function () {
  numberFloat("#monto");
  numberLeght("#dni", 8);
  numberLeght("#telefono", 9);
  getPagos();
  // test end
  $("#pagos-detalles").hide();
  $("#formulario-nuevo-pago").hide();
  // Detalles pagos por id
  $(document).on("click", "#btn-detalle", function () {
    //console.log($(this).attr('id-data'));
    let id = $(this).attr("id-data");
    $("#btn-boleta").attr("id-data", id);
    $("#pagos").hide();
    $.ajax({
      type: "POST",
      url: `http://${host}/clinica/pagos/getPagos`,
      dataType: "json",
      data: { id },
      success: function (response) {
        let html = "";
        response.forEach((element) => {
          html += `
                    <tr>
                        <th>${element.fecha}</th>
                        <th>${element.concepto}</th>
                        <th>s/.${element.monto}</th>
                    </tr>
                `;
        });
        $("#data-pagos-detalles").html(html);
      },
      error: function (error) {
        console.log("error GET", error);
      },
    });
    $("#pagos-detalles").show();
  });
  // IMPRIMIR BOLETA
  $(document).on("click", "#btn-boleta", function () {
    let id = $(this).attr("id-data");
    let btn = $(this).attr("href", `http://${host}/clinica/pagos/boleta/${id}`);
  });
  // cerrar detalles
  $("#btn-cerrar-detalles,#btn-cancelar-pago").on("click", function () {
    $("#pagos-detalles").hide();
    $("#formulario-nuevo-pago").hide();
    $("#pagos").show();
  });
  // Nuevo pago
  $(document).on("click", "#btn-pago", function () {
    $("#pagos").hide();
    $("#formulario-nuevo-pago").show();
    let id = $(this).attr("id-data");
    $("#idpago").val(id);
  });
  $("#form-pago").on("submit", function (event) {
    event.preventDefault();
    let formData = $(this).serialize();
    //console.log(formData);
    insert(formData, "pagos", "create");
    getPagos();
    pagos_detalles();
    $("#input-pago").val('');
    $("#input-concepto").val('');
  });
  // Nuevo Pago END
  // Buscador
  search();
  // TESTS
  pagos_detalles();
  nuevo_pago();
});
// BUSCADOR CON PURO JAVASCRIPT
function search() {
  $("#search").on("keyup", function () {
    let value = $(this).val().toLowerCase();
    $("#tabla-pagos tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
}
function getPagos() {
  $.ajax({
    type: "GET",
    url: `http://${host}/clinica/pagos/get`,
    dataType: "json",
    success: function (data) {
      //console.log(data);
      let html = "";
      data.forEach((element) => {
        html += `
                  <tr>
                    <td><a href="http://${host}/clinica/clientes/detalles/${element.idcliente}" class="button">Detalles</a></td>
                    <td>${element.nombres}</td>
                    <td>${element.dni}</td>
                    <td>${element.total}</td>
                    <td>${element.saldo}</td>
                    <td>${element.monto}</td>
                    <td><button class="button success" id="btn-pago" id-data="${element.idpago}">Nuevo Pago</button></td>
                    <td><button class="button warning" id="btn-detalle" id-data="${element.idpago}">Detalles de pagos</button></td>
                  </tr>
                `;
      });
      $("#tabla-pagos").html(html);
      initPaginador(5, "tabla-pagos", "pagos-paginador");
    },
    error: function (error) {
      console.log("error GET", error);
    },
  });
}

function insert(array, controller, method = "create") {
  //console.log(array);
  $.ajax({
    type: "POST",
    url: `http://${host}/clinica/${controller}/${method}`,
    data: array,
    success: function (response) {
      //console.log('success POST',response);
      alert("Registro de pago EXITOSO!", response);
    },
    error: function (error) {
      //console.log('error POST',error);
      alert("Error al llenar los campos, INTENTARLO DE NUEVO", error);
    },
  });
}

function pagos_detalles() {
  $(document).on("click", "#btn-pago", function () {
    var id = $(this).attr("id-data");
    $.ajax({
      type: "POST",
      url: `http://${host}/clinica/pagos/read`,
      dataType: "json",
      data: {id},
      success: function (response) {
        //console.log(response);
        let html = "";
        let num = response.fechas.length;
        for(let i=0;i< num ; i++){
          html += `<tr>
                    <td>${response.fechas[i]}</td>
                    <td>${response.monto_total[i]}</td>
                    <td>${response.importe[i]}</td>
                    <td>${response.deudas[i]}</td>
                    <td>${response.conceptos[i]}</td>
                  </tr>
                `;
        }
        $("#data-nuevo-pago").html(html);
      },
      error: function (error) {
        console.log("error GET", error);
      },
    });
  });
  var id = $("#idpago").val();
  console.log(id); 
  $.ajax({
    type: "POST",
    url: `http://${host}/clinica/pagos/read`,
    dataType: "json",
    data: {id},
    success: function (response) {
      //console.log(response);
      let html = "";
      let num = response.fechas.length;
      for(let i=0;i< num ; i++){
        html += `<tr>
                  <td>${response.fechas[i]}</td>
                  <td>${response.monto_total[i]}</td>
                  <td>${response.importe[i]}</td>
                  <td>${response.deudas[i]}</td>
                  <td>${response.conceptos[i]}</td>
                </tr>
              `;
      }
      $("#data-nuevo-pago").html(html);
    },
    error: function (error) {
      console.log("error GET", error);
    },
  });
}
function nuevo_pago(){
  var lista = [];
  $(document).on("click","#input-pago", function(){
    $("#tabla-nuevo-pago tbody tr").each(function(){
      var fila = [];
      $(this).find("td").each(function(){
        fila.push($(this).text());
      });
      lista.push(fila);
    });
    console.log(lista);
    $("#mostrar-total").text(lista.at(-1)[1]);
    $("#mostrar-deuda").text(lista.at(-1)[3]);
  })
  $(document).on("keyup", "#input-pago", function () {
    console.log($(this).val());
    let total = $("#mostrar-total").text() - $(this).val();
    $("#mostrar-deuda").text(total);
  });
}