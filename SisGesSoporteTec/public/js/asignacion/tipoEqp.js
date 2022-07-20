//Esta funcion sirve pa desabilitar los campos no necesarios segun el coombobox
// Se necesita en el select esto onChange = "tipoDispositivo(this.value)"
//Para deshabiluitar agregarle ID
function tipoDispositivo(valor) {
    if (valor == 3) {
        document.getElementById('opc1').disabled = true;
        document.getElementById('opc1').hidden = true;
        document.getElementById('opc2').disabled = true;
        document.getElementById('opc2').hidden = true;
        

        document.getElementById('opc1U').disabled = true;
        document.getElementById('opc1U').hidden = true;
        document.getElementById('opc2U').disabled = true;
        document.getElementById('opc2U').hidden = true;
    } else {
        document.getElementById('opc1').disabled = false;
        document.getElementById('opc1').hidden = false;
        document.getElementById('opc2').disabled = false;
        document.getElementById('opc2').hidden = false;

        document.getElementById('opc1U').disabled = false;
        document.getElementById('opc1U').hidden = false;
        document.getElementById('opc2U').disabled = false;
        document.getElementById('opc2U').hidden = false;
    }
}