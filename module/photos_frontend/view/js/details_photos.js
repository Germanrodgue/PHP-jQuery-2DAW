function load_photos() {
    var jqxhr = $.get("module/photos_frontend/controller/controller_photos.class.php?load_details_1=true", function (data) {
        var json = JSON.parse(data);
        pintar_photo(json.photodetails)
    })
}

$(document).ready(function () {
    load_photos();
});

function pintar_photo(data) {
      document.getElementById("link").innerHTML = "Link: " + data[0].link;
      document.getElementById("imgnombre").innerHTML = "Nombre de la imagen: " + data[0].imgnombre ;
      document.getElementById("fecha").innerHTML = "Fecha: " + data[0].fecha ;
      document.getElementById("descr").innerHTML = "Descripcion: " + data[0].Descripcion ;
      document.getElementById("tipo").innerHTML = "Tipo: " + data[0].tipo;
      document.getElementById("location").innerHTML = "Localizacion: " + data[0].Localizacion;
      document.getElementById("avatar").src=data[0].avatar;
      document.getElementById("formato").innerHTML = "Formato: ";
      document.getElementById("formato").innerHTML += " - "+data[0].formato;
      document.getElementById("paises").innerHTML = "Pais: " + data[0].country;
      document.getElementById("provincias").innerHTML = "Provincia: " + data[0].province ;
      document.getElementById("ciudades").innerHTML = "Ciudad: " + data[0].city ;
    }
    