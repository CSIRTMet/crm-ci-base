function vacio(q) {
        for ( i = 0; i < q.length; i++ ) {
                if ( q.charAt(i) != " " ) {
                        return true
                }
        }
        return false
}

//valida que el campo no este vacio y no tenga solo espacios en blanco
function valida() {
        var F = document.forms['frm']
        if( vacio(F.txtNombreO.value) == false ) {
                alert("Este campo no puede estar vacio")
                return false
        } else {
                alert("OK")
                //cambiar la linea siguiente por return true para que ejecute la accion del formulario
                return true
        }
        
}
  
  
  
