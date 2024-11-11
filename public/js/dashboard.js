//var host = "192.168.1.41";
var host = "localhost";
$(document).ready(async function () {
  const data = await get();
  let ctx = $("#bar");
  let config = {
    type: "bar",
    data: {
      labels: data[1],
      datasets: [
        {
          label: "Clientes Atendidos",
          data: data[0],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)", // Color de fondo de las barras
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(99, 255, 132, 0.2)",
            "rgba(162, 54, 235, 0.2)",
            "rgba(206, 255, 86, 0.2)",
            "rgba(192, 75, 192, 0.2)",
            "rgba(102, 153, 255, 0.2)",
            "rgba(159, 255, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)", // Color de borde
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
            "rgba(99, 255, 132, 1)",
            "rgba(162, 54, 235, 1)",
            "rgba(206, 255, 86, 1)",
            "rgba(192, 75, 192, 1)",
            "rgba(102, 153, 255, 1)",
            "rgba(159, 255, 64, 1)",
          ],
          borderWidth: 2, // Grosor del borde
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "rgba(200, 200, 200, 0.2)", // Color de las líneas del grid
          },
          ticks: {
            color: "#333", // Color de los números en el eje y
          },
        },
        x: {
          ticks: {
            color: "#333", // Color de los nombres de los meses en el eje x
          },
        },
      },
      plugins: {
        legend: {
          labels: {
            color: "#333", // Color del texto de la leyenda
            font: {
              size: 14, // Tamaño de fuente para la leyenda
              weight: "bold",
            },
          },
        },
        tooltip: {
          backgroundColor: "rgba(0, 0, 0, 0.7)", // Color de fondo del tooltip
          titleColor: "#fff", // Color del título en el tooltip
          bodyColor: "#fff", // Color del cuerpo en el tooltip
          titleFont: {
            size: 16, // Tamaño de fuente del título
            weight: "bold",
          },
          bodyFont: {
            size: 14, // Tamaño de fuente del cuerpo
          },
        },
      },
    },
  };
  new Chart(ctx, config);
});
async function get() {
  try {
    const response = await $.ajax({
      type: "GET",
      url: `http://${host}/clinica/dashboard/get`,
      dataType: "json",
    });
    let total_meses = [];
    let total_clientes = [];
    response.forEach((element) => {
      total_clientes.push(element.total_clientes);
      total_meses.push(element.mes);
    });
    const data = [total_clientes, total_meses];
    //console.log(data);
    return data; // Devolvemos los datos correctamente
  } catch (error) {
    console.log("Error GET", error);
  }
}

$(document).ready(function () {
    numberFloat("#pago");
    numberFloat("#monto-total");
    numberLeght('#dni',8);
    numberLeght('#telefono',9);
    dni();
    $("#formulario-nuevo-cliente").hide();
    $("#abrir-nuevo-cliente").click(function(){
        $("#formulario-nuevo-cliente").show();
        $("#cards, #graficos, #botones").hide();
    });
    $("#btn-cancelar-cliente").click(function(){
        $("#formulario-nuevo-cliente").hide();
        $("#cards, #graficos, #botones").show();
    });
    $("#form-cliente").submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        insert(formData, "clientes", "create");
        $(this).trigger("reset");
    });
})
function insert(array, controller, method = "create") {
  //console.log(array);
  $.ajax({
    type: "POST",
    url: `http://${host}/clinica/${controller}/${method}`,
    data: array,
    success: function (response) {
      //console.log('success POST',response);
      alert("Registro EXITOSO!", response);
      window.location.href = `http://${host}/clinica/pagos`;
    },
    error: function (error) {
      //console.log('error POST',error);
      alert("Error al llenar los campos, INTENTARLO DE NUEVO", error);
    },
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