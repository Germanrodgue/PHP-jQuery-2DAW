function load_photo() {
    var jqxhr = $.get("module/photos_backend/controller/controller_photos.class.php?load=true", function (data) {
        var json = JSON.parse(data);
        console.log(json);
        pintar_photo(json);
        //alert( "success" );
    }).done(function () {
        //alert( "second success" );
    }).fail(function () {
        //alert( "error" );
    }).always(function () {
        //alert( "finished" );
    });
    jqxhr.always(function () {
        //alert( "second finished" );
    });
}

$(document).ready(function () {
    load_photo();
});

function pintar_photo(data) {


/*  document.getElementById("formato").innerHTML = "Formato: "

  for(var i =0;i < data.user.formato.length;i++){
alert(data.user.formato[i]);
    document.getElementById("formato").innerHTML = document.getElementById("formato").innerHTML + data.user.formato[i] ;

  }*/
  document.getElementById("link").innerHTML = "Link: " + data.user.link;
  document.getElementById("imgnombre").innerHTML = "Nombre de la imagen: " + data.user.imgnombre ;
  document.getElementById("fecha").innerHTML = "Fecha: " + data.user.fecha ;
  document.getElementById("descr").innerHTML = "Descripcion: " + data.user.descr ;
//  document.getElementById("formato").innerHTML = "Formato: " + data.user.formato;
  document.getElementById("tipo").innerHTML = "Tipo: " + data.user.tipo;
  document.getElementById("location").innerHTML = "Localizacion: " + data.user.loc;
  document.getElementById("avatar").src=data.user.avatar;
  document.getElementById("formato").innerHTML = "Formato: ";
  for(var i =0;i < data.user.formato.length;i++){
  document.getElementById("formato").innerHTML += " - "+data.user.formato[i];
    }
  document.getElementById("paises").innerHTML = "Pais: " + data.user.pais;
  document.getElementById("provincias").innerHTML = "Provincia: " + data.user.provincia ;
  document.getElementById("ciudades").innerHTML = "Ciudad: " + data.user.ciudad ;


}
