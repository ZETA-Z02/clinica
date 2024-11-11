//var host = "192.168.1.41";
var host = "localhost";
$(document).ready(function () {
  numberFloat("#pago")
  numberFloat("#monto-total")
  numberLeght('#dni',8);
  numberLeght('#telefono',9);
  getClientes()
  detallePagos()
  dni(); 
  $("#form-cliente").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    //console.log(formData);
    insert(formData,'clientes','create');
    $(this).trigger("reset");
  });
  $("#form-update").submit(function (event){
    event.preventDefault();
    var formData = $(this).serialize();
    //console.log(formData);
    insert(formData,'clientes','update');
    $(this).trigger("reset");
    getClientes()
  });
  $("#form-pago").submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    //console.log(formData);
    insert(formData,'clientes','nuevoPago');
    $(this).trigger("reset");
    getClientes()
  });
});

// SEARCH -------------------------------------------------------------------------------
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var nombre = $(this).val().toLowerCase();
    //console.log(nombre);
    $.ajax({
      type: "GET",
      url: `http://${host}/clinica/clientes/getCliente`,
      data: {nombre},
      dataType: "json",
      success: function (response) {
        let html = '';
        //console.log(response);
        response.forEach(element => {
          html += `
                <tr id="${element.id}">
                  <td>${element.id}</td>
                  <td>${element.nombres}</td>
                  <td>${element.telefono}</td>
                  <td><a href="http://${host}/clinica/clientes/detalles/${element.id}" class="button">Detalles</a></td>
                  <td><button class="button warning" id="btn-pago" id-data="${element.id}">Nuevo Pago</button></td>
                </tr>
                  `;
        });
        $("#data").html(html);
        initPaginador(5, "data", "clientes-paginador");
      },error: function (error){
          console.log('error GET',error);
      }
    });
    
  });
});
// ---------------------------------------------------------------------------------------------
// ---------------------------BOTONES------------------------------------------------------------
$(document).ready(function(){
  $("#formulario-nuevo-cliente,#formulario-nuevo-pago").hide();
  $("#btn-nuevo-cliente").on('click',function(){
    $("#formulario-nuevo-cliente").show();
    $("#tabla-datos-clientes").hide();
    $("#formulario-nuevo-pago").hide();
  });
  $("#btn-cancelar-cliente,#btn-cancelar-pago").on('click',function(){
    $("#formulario-nuevo-cliente,#formulario-nuevo-pago").hide();
    $("#tabla-datos-clientes").show();
  });
  // btn registrar nuevo pago-> obtener id cliente y mostrar formulario
  $(document).on('click','#btn-pago',function(){
    let id = $(this).attr('id-data');
    let nombres = $(this).parent().parent().find('td').eq(1).text();
    $("#idcliente").val(id);
    $("#cliente-name").html(nombres);
    //console.log("pago",id,nombres);
    $("#tabla-datos-clientes").hide();
    $("#formulario-nuevo-pago").show();
  });
});
// ---------------------------BOTONES END------------------------------------------------------------
function getClientes(){
  $.ajax({
    type: "GET",
    url: `http://${host}/clinica/clientes/get`,
    dataType: "json",
    success: function (data) {
      let html = '';
      data.forEach(element => {
        html += `
              <tr>
                <td><a href="http://${host}/clinica/clientes/detalles/${element.id}" class="button">Detalles</a></td>
                <td>${element.nombres}</td>
                <td>${element.telefono}</td>
                <td><button class="button warning" id="btn-pago" id-data="${element.id}">Pagos</button></td>
                <td><button class="button success" id="btn-pago" id-data="${element.id}">Nuevo Pago</button></td>
              </tr>
            `;
      });
      $("#data").html(html);
      initPaginador(5, "data", "clientes-paginador");
    },error: function (error){
      console.log('error GET',error);
    },
  });
}
function insert(array,controller,method='create'){
  //console.log(array);
  $.ajax({
      type: "POST",
      url: `http://${host}/clinica/${controller}/${method}`,
      data: array,
      success: function (response) {
          //console.log('success POST',response);
          alert('Registro EXITOSO!',response);
          getClientes();
          window.location.href=`http://${host}/clinica/pagos`;
      },error: function (error){
          //console.log('error POST',error);
          alert('Error al llenar los campos, INTENTARLO DE NUEVO',error);
      }
  }); 
}
function dni() {
  var token = "apis-token-8574.bPsef4wHOYjVwA7bFoDMZqLLrNrAMKiY";
  $("#dni").on("keyup", function () {
    var dni = $("#dni").val();
    //console.log(dni.length);
    if (dni.length == 8) {
      $.ajax({
        url: `http://${host}/clinica/clientes/dni`,
        type: "POST",
        data: { dni: dni },
        success: function (response) {
          let data = JSON.parse(response);
          if (data == 1) {
            alert("El DNI debe tener 8 dígitos");
          } else {
            //console.log(data);
            $("#nombre").val(data.nombres);
            $("#apellidos").val(
              data.apellidoPaterno + " " + data.apellidoMaterno
            );
          }
        },
        error: function (xhr, status, error) {
          //console.log(error + "->No se pudo hacer la solicitud a la API");
        },
      });
    } else {
      //console.log("no hay dni");
    }
  });
}

function detallePagos(){
  let id = $("#id").val();
  $.ajax({
    type: "POST",
    url: `http://${host}/clinica/clientes/detallesPagos`,
    dataType: "json",
    data: {id},
    success: function (response) {
      console.log(response);
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
}