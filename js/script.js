function addEntryIRS() {
    var html = "<tr>";
        html = html + "<td><select class='form-select' name='mata_kuliah[]' aria-label='Default select example'>";
        html = html + "<option selected>Pilih Mata Kuliah</option>";
        html = html + "<option value='1'>One</option>";
        html = html + "<option value='2'>Two</option>";
        html = html + "<option value='3'>Three</option>";
        html = html + "</select></td>";
        
        html = html + "<td><select class='form-select' name='kelas[]' aria-label='Default select example'>";
        html = html + "<option selected>Pilih Kelas</option>";
        html = html + "<option value='1'>One</option>";
        html = html + "<option value='2'>Two</option>";
        html = html + "<option value='3'>Three</option>";
        html = html + "</select></td>";
    html += "<tr>"
    document.getElementById("tambahIRS").insertRow().innerHTML += html;
}

function addEntryKHS() {
    var html = "<tr>";
        html = html + "<td><select class='form-select' name='mata_kuliah[]' aria-label='Default select example'>";
        html = html + "<option selected>Pilih Mata Kuliah</option>";
        html = html + "<option value='1'>One</option>";
        html = html + "<option value='2'>Two</option>";
        html = html + "<option value='3'>Three</option>";
        html = html + "</select></td>";

        html = html + "<td><input name='nilai[]' aria-label='Default select example' placeholder='Nilai'></td>";
    html += "<tr>"
    document.getElementById("tambahKHS").insertRow().innerHTML += html;
}