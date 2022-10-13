function getXMLHttpRequest() {
    if (window.XMLHttpRequest) {
        //code for modern browser
        return new XMLHttpRequest();
    } else {
        //code for old IE browser
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}
function callAjax(url, inner) {
    const xmlHttp = getXMLHttpRequest();
    xmlHttp.open("GET", url, true);
  
    xmlHttp.onreadystatechange = function () {
      document.getElementById(inner).innerHTML =
        '<img src="../img/ajax_loader.png" alt="ajax_loader" />';
  
      if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        document.getElementById(inner).innerHTML = xmlHttp.responseText;
      }
  
      return false;
    };
  
    xmlHttp.send(null);
  }

  function getKabupaten(idProv) {
    var inner = "kabupaten";
    var url = `../function/get_kabupaten.php?id_prov=${idProv}`;
    //TODO: write ajax getKabupaten
    if (idProv == "") {
        document.getElementById(inner).innerHTML = "";
      } else {
        callAjax(url, inner);
      }

}
// edit profile mhs ajax
function editProfile(){
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var noHP = document.getElementById("noHP").value;
    var email = document.getElementById('email').value;
    var alamat = document.getElementById('alamat').value;
    var provinsi = document.getElementById('provinsi').value;
    var kabupaten = document.getElementById('kabupaten').value;
    //validate
    if (name !="" && address != "" && city != "") {

        //set url and inner
        var url = "../function/edit_profile.php";
        //alert (url);
        var inner = "add_response";
        //open request
        var params = "name=" + name + "&address=" + address + "&city=" + city;
        xmlhttp.open('POST' , url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if ( (xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }else{
        alert("Please fill all the fields");
    }
}