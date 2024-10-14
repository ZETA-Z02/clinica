//var host = "192.168.1.41";
var host = "localhost";
$(document).ready(function () {
  numberLeght('#dni',8);
  numberLeght('#telefono',9);
  getPersonal();
  dni();
  $("#form-personal").submit(function (event) {
    event.preventDefault();
    let formData = $(this).serialize();
    console.log(formData);
    insert(formData,'personal','create');
  });
  $("#form-update").submit(function (event){
    event.preventDefault();
    let formData = $(this).serialize();
    console.log(formData);
    insert(formData,'personal','update');
  });
  $("#form-login-update").submit(function (event){
    event.preventDefault();
    let formData = $(this).serialize();
    console.log(formData);
    insert(formData,'personal','updateLogin');
  });
});
function getPersonal(){
    $.ajax({
        type: "GET",
        url: `http://${host}/clinica/personal/get`,
        dataType: "json",
        success: function (data) {
          let html = '';
          data.forEach(element => {
            html += `
                  <tr>
                    <td>${element.id}</td>
                    <td>${element.nombres}</td>
                    <td>${element.apellidos}</td>
                    <td>${element.telefono}</td>
                    <td><a href="http://${host}/clinica/personal/detalles/${element.id}" class="button warning">Detalles</a></td>
                    <td><a href="http://${host}/clinica/personal/newlogin/${element.id}" class="button alert">Login</a></td>
                  </tr>
                `;
          });
          $("#data").html(html);
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
            console.log('success POST',response);
            alert('Success POST',response);
        },error: function (error){
            console.log('error POST',error);
            alert('error POST',error);
        }
    });
  }
  function dni() {
    var token = "apis-token-8574.bPsef4wHOYjVwA7bFoDMZqLLrNrAMKiY";
    $("#dni").on("keyup", function () {
      var dni = $("#dni").val();
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
              console.log(data);
              $("#nombre").val(data.nombres);
              $("#apellidos").val(
                data.apellidoPaterno + " " + data.apellidoMaterno
              );
            }
          },
          error: function (xhr, status, error) {
            console.log(error + "->No se pudo hacer la solicitud a la API");
          },
        });
      } else {
        console.log("no hay dni");
      }
    });
  }
  