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
    var xmlhttp = getXMLHttpRequest();
    //get input value
    var noHP = document.getElementById("noHP").value;
    var email = document.getElementById('email').value;
    var alamat = document.getElementById('alamat').value;
    var kabupaten = document.getElementById('kabupaten').value;
    var nim = document.getElementById('nim').value;
    //validate
    if (noHP !="" && email != "" && alamat != "") {

        //set url and inner
        var url = "../function/edit_profile.php";
        //alert (url);
        var inner = "responseedit";
        //open request
        var params = "nim="+ nim + "&no_hp=" + noHP + "&email=" + email + "&alamat=" + alamat + "&kabupaten=" + kabupaten;
        xmlhttp.open('POST' , url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
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

function editPKL(){
  var xmlhttp = getXMLHttpRequest();
  //get input value
  var tempat = document.getElementById("tempat").value;
  var status = document.getElementById('statuspkl').value;
  //set url and inner
  var url = "../function/edit_pkl.php";
  //alert (url);
  var inner = "responseedit";
  //open request
  var params = "tempat="+ tempat + "&status=" + status;
  xmlhttp.open('POST' , url, true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function(){
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
          document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
  }
  xmlhttp.send(params);
}
function editMhsOperator(){
  var xmlhttp = getXMLHttpRequest();
  //get input value
  var noHP = document.getElementById("noHP").value;
  var email = document.getElementById('email').value;
  var alamat = document.getElementById('alamat').value;
  var kabupaten = document.getElementById('kabupaten').value;
  var status = document.getElementById('status').value;
  var nim = document.getElementById('nim').value;
  var nama = document.getElementById('nama').value;
  //validate
  if (noHP !="" && email != "" && alamat != "") {

      //set url and inner
      var url = "../function/editMhsOp.php";
      //alert (url);
      var inner = "responseedit";
      //open request
      var params = "nim="+ nim + "&no_hp=" + noHP + "&email=" + email + "&alamat=" + alamat + "&kabupaten=" + kabupaten + "&nama=" + nama + "&status=" + status;
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

function approveIRS(){
  var xmlhttp = getXMLHttpRequest();
  var nim = document.getElementById("nim").value;
  var smt = document.getElementById('smt').value;
  //set url and inner
  var url = "../function/approveIRS.php";
  //alert (url);
  var inner = "status";
  //open request
  var params = "nim="+ nim + "&smt=" + smt;
  xmlhttp.open('POST' , url, true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function(){
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
          document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
  }
  xmlhttp.send(params);
}

function denyIRS(){
  var xmlhttp = getXMLHttpRequest();
  var nim = document.getElementById("nim").value;
  var smt = document.getElementById('smt').value;
  //set url and inner
  var url = "../function/denyIRS.php";
  //alert (url);
  var inner = "status";
  //open request
  var params = "nim="+ nim + "&smt=" + smt;
  xmlhttp.open('POST' , url, true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function(){
      if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
          document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
  }
  xmlhttp.send(params);
}

function editDoswalOperator(){
  var xmlhttp = getXMLHttpRequest();
  //get input value
  var email = document.getElementById('email').value;
  var nip = document.getElementById('nip').value;
  var nama = document.getElementById('nama').value;
  var kodewali = document.getElementById('kowal').value;
  //validate
  if (email != "") {

      //set url and inner
      var url = "../function/editDoswalOp.php";
      //alert (url);
      var inner = "responseedit";
      //open request
      var params = "nip="+ nip + "&email=" + email + "&nama=" + nama + "&kode_wali=" + kodewali;
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
// show table nilai with ajax
function showIRSD(nim, smt){
  // get input value
  var inner = "nilai-mhs"
  var url = `../function/show_irs_doswal.php?nim=${nim}&smt=${smt}`;

  if (smt == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}

function showKHSD(nim, smt){
  // get input value
  var inner = "nilai-mhs"
  var url = `../function/show_khs_doswal.php?nim=${nim}&smt=${smt}`;

  if (smt == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}

function getMatkul(smt) {
  var inner = "mata_kuliah";
  var url = `../function/getMatkul.php?id=${smt}`;
  if (smt == "") {
      document.getElementById(inner).innerHTML = "";
    } else {
      callAjax(url, inner);
    }
}

function showIRS(nim, smt) {
  var inner = "irs-mhs";
  var url = `../function/show_irs.php?nim=${nim}&smt=${smt}`;

  if (smt == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}

function showKHS(nim, smt) {
  var inner = "khs-mhs";
  var url = `../function/show_khs.php?nim=${nim}&smt=${smt}`;

  if (smt == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}
function deleteIRS(nim,matkul,kelas,smt){
  var inner = "editIRS";
  var url = `../function/deleteIRS.php?nim=${nim}&matkul=${matkul}&kelas=${kelas}&smt=${smt}`;
  callAjax(url, inner);
}
function searchMhs(namaMhs) {
  var inner = "daftarMhs";
  var url = `../function/searchMhsDept.php?nama=${namaMhs}`;
  callAjax(url, inner);
}
function searchDosen(namaDosen) {
  var inner = "daftarDosen";
  var url = `../function/searchDosenDept.php?nama=${namaDosen}`;
  callAjax(url, inner);
}
function searchMhsDoswal(namaMhs,angkatan, nip) {
  var inner = "daftarMhsDoswal";
  var url = `../function/searchMhsDoswal.php?nama=${namaMhs}&angkatan=${angkatan}&nip=${nip}`;
  callAjax(url, inner);
}
function searchUser(username) {
  var inner = "daftarUser";
  var url = `../function/searchUser.php?username=${username}`;
  callAjax(url, inner);
}