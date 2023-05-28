function primera_pagina(){
    var primera = 1;
    document.getElementsByName("pagina")[0].value = primera;
    document.forms[0].submit();
}

function anterior_pagina(){
    var paginaActual = parseInt(document.getElementsByName("pagina_actual")[0].value);
    var siguiente = paginaActual - 1;
    document.getElementsByName("pagina")[0].value = siguiente;
    document.forms[0].submit();
}

function siguiente_pagina() {
    var paginaActual = parseInt(document.getElementsByName("pagina_actual")[0].value);
    var siguiente = paginaActual + 1;
    document.getElementsByName("pagina")[0].value = siguiente;
    document.forms[0].submit();
}

function ultima_pagina(){
    var ultima = parseInt(document.getElementsByName("total_paginas")[0].value)
    document.getElementsByName("pagina")[0].value = ultima;
    document.forms[0].submit();
}
