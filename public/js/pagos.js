//var host = "192.168.1.41";
var host = "localhost";
$(document).ready(function () {
  numberFloat('#monto')
  numberLeght('#dni',8);
  numberLeght('#telefono',9);
  getPagos();
  $("#pagos-detalles").hide();
  $("#formulario-nuevo-pago").hide();
  // Detalles pagos por id
  $(document).on("click",'#btn-detalle',function(){
    //console.log($(this).attr('id-data'));
    let id = $(this).attr('id-data');
    $("#pagos").hide();
    $.ajax({
      type: "POST",
      url: `http://${host}/clinica/pagos/getPagos`,
      dataType: "json",
      data: {id},
      success: function (response) {
        let html = '';
          response.forEach(element => {
            html += `
                    <tr>
                        <th>${element.concepto}</th>
                        <th>s/.${element.monto}</th>
                        <th>${element.fecha}</th>
                    </tr>
                `;
          });
          $("#data-pagos-detalles").html(html);
      },error: function(error){
        console.log('error GET',error);
      }
    });
    $("#pagos-detalles").show();
  });
  // IMPRIMIR BOLETA
  $(document).on("click",'#btn-boleta',function(){
    //console.log($("#btn-detalle").attr('id-data'));
    let id = $("#btn-detalle").attr('id-data');
    let btn = $(this).attr('href', `http://${host}/clinica/pagos/boleta/${id}`);
  });
  // cerrar detalles
  $("#btn-cerrar-detalles,#btn-cancelar-pago").on('click',function(){
    $("#pagos-detalles").hide();
    $("#formulario-nuevo-pago").hide();
    $("#pagos").show();
  });
  // Nuevo pago 
  $(document).on('click','#btn-pago',function(){
    $("#pagos").hide();
    $("#formulario-nuevo-pago").show();
    let id = $(this).attr('id-data');
    $("#idpago").val(id);
  });
  $("#form-pago").on('submit',function(event){
    event.preventDefault();
    let formData = $(this).serialize();
    //console.log(formData);
    insert(formData,'pagos','create');
    $(this).trigger("reset");
    getPagos();
  })
  // Nuevo Pago END
  // Buscador
  $("#search").on("keyup", function() {
    var nombre = $(this).val().toLowerCase();
    //console.log(nombre);
    $.ajax({
      type: "GET",
      url: `http://${host}/clinica/pagos/search`,
      data: {nombre},
      dataType: "json",
      success: function (response) {
        let html = '';
        console.log(response);
        response.forEach(element => {
          html += `
                  <tr>
                    <td>${element.idpago}</td>
                    <td>${element.nombres}</td>
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
      },error: function (error){
          console.log('error GET',error);
      }
    });
    
  });

});
function getPagos(){
    $.ajax({
        type: "GET",
        url: `http://${host}/clinica/pagos/get`,
        dataType: "json",
        success: function (data) {
          let html = '';
          data.forEach(element => {
            html += `
                  <tr>
                    <td>${element.idpago}</td>
                    <td>${element.nombres}</td>
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
            alert('Registro de pago EXITOSO!',response);
        },error: function (error){
            //console.log('error POST',error);
            alert('Error al llenar los campos, INTENTARLO DE NUEVO',error);
        }
    });
  }