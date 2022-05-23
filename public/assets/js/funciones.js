var urlsVisitadas = new Array();
var posicionActual = 0;
urlsVisitadas[0] = window.location.toString();
var ultimaUrl = window.location.toString();

function loadContent(url, capa) {
    if (url.indexOf("?") == -1) {
        url = url + '?ajax=1';
    } else {
        url = url + '&ajax=1';
    }

    document.getElementById(capa).innerHTML = "<br/><div class='text-center'><div class='spinner-border ms-auto text-primary' role='status' aria-hidden='true' style='width: 2rem; height: 2rem' ></div> <strong class='text-primary'>Cargando...</strong></div>";
    document.getElementById(capa).style.display = "";
    let request = new XMLHttpRequest();
    request.onload = function () {
        if (request.status >= 200 && request.status < 400) {
            let nuevoDiv = document.createElement("div");
            nuevoDiv.innerHTML = request.responseText;
            moveScriptSrc(nuevoDiv, capa);
            modificarUrl(request.responseURL);
        }
    };
    request.open("get", url);
    request.send();
}

function modificarUrl(url) {

    let nuevaUrl;
    if (url.indexOf('?ajax=1') >= 0) {
        nuevaUrl = url.replace("?ajax=1", "");
    } else if (url.indexOf('&ajax=1') >= 0) {
        nuevaUrl = url.replaceAll("&ajax=1", "");
    } else {
        nuevaUrl = url;
    }

    window.history.pushState("", "", nuevaUrl);//cambia la barra de direcciones
}

function moveScriptSrc(nuevoDiv, capa) {

    let srcElements = nuevoDiv.querySelectorAll("script[src]"); //busca las nuevas fuentes de js

    if (srcElements.length > 0) { //si existen src
        Array.from(srcElements).forEach((srcElements) => {

            const cloneSrc = document.createElement("script"); // crea un nuevo src
            cloneSrc.src = srcElements.attributes.src.value;

            srcElements.parentNode.removeChild(srcElements);// elimina los src del div temporal
            //busca si en en otrosScriptsSrc ya existe el src
            const existeSrc = document.getElementById("otrosScriptsSrc").querySelector("script[src='" + srcElements.attributes.src.value + "']");
            if (!existeSrc) {
                document.getElementById("otrosScriptsSrc").appendChild(cloneSrc); //carga los src en un div externo otrosScriptsSrc
            }
        });
    }

    const scriptElements = nuevoDiv.querySelectorAll("script:not([src])"); // busca todos los scripts

    if (scriptElements.length > 0) { // si existen scripts
        Array.from(scriptElements).forEach((scriptElements) => {
            scriptElements.parentNode.removeChild(scriptElements); //elimina el script original, para evitar duplicados y que se cargue antes
        });
    }
    document.getElementById(capa).innerHTML = nuevoDiv.innerHTML;
    nuevoDiv = null;
    executeScriptElements(capa, scriptElements);
}

function executeScriptElements(capa, scriptElements) {

    Array.from(scriptElements).forEach((scriptElement) => {
        const clonedElement = document.createElement("script");
        clonedElement.type = "text/javascript";

        Array.from(scriptElement.attributes).forEach((attribute) => {
            clonedElement.setAttribute(attribute.name, attribute.value);
        });

        clonedElement.textContent = scriptElement.textContent;
        document.getElementById(capa).appendChild(clonedElement);
    });
}

function cargarContenido(url) {
    urlsVisitadas[urlsVisitadas.length] = url;
    ultimaUrl = url;
    loadContent(url, "areaDeTrabajo");
}

function volverAlAnterior() {

    if (urlsVisitadas.length == 1) {
        history.go(-1);
    } else {
        cargarContenido(urlsVisitadas[urlsVisitadas.length - 2]);
    }
}

function jsAlFinal() {
    //función que encuentra todos los scripts del cuerpo html, y los mueve al final para ejecutarlos 
    //primero busca todos los scripts que no tengan source
    let cuerpo = document.body.querySelectorAll("script:not([src])");

    Array.from(cuerpo).forEach((cuerpo) => {
        const clonedElement = document.createElement("script");
        clonedElement.type = "text/javascript";

        Array.from(cuerpo.attributes).forEach((attribute) => {
            clonedElement.setAttribute(attribute.name, attribute.value);
        });
        clonedElement.textContent = cuerpo.textContent;
        cuerpo.parentNode.removeChild(cuerpo);
        document.getElementById("scriptsFunctions").appendChild(clonedElement);
    });
}

function telefono(input) {
    Inputmask("9999-9999").mask(input);
}

function entero(input) {
    Inputmask({'alias': 'numeric', rightAlign: false, 'radixPoint': ''}).mask(input);
}

function decimal(input) {
    Inputmask({'alias': 'decimal', rightAlign: false, 'groupSeparator': '.', 'autoGroup': true}).mask(input);
}

function moneda(input, decimales) {
    Inputmask("currency", {rightAlign: false, digits: decimales}).mask(input);
}

function correo(input) {
    Inputmask({alias: "email"}).mask(input);
}

function escribirValorCheque(inputCheck) {
    let chq = document.getElementById("chk" + inputCheck).checked;
    if (chq === true) {
        document.getElementById(inputCheck).value = 1;
    } else {
        document.getElementById(inputCheck).value = 0;
    }
}

function tabla(tablaNombre) {
    new DataTable("#" + tablaNombre, {
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        pageLength: 18,
        lengthMenu: [
            [10, 15, 20, 25, 50, 100, -1],
            [10, 15, 20, 25, 50, 100, "All"]
        ]
    });
}

function selectSimple(nombreSelect) {
    new SlimSelect({select: document.querySelector('#' + nombreSelect)});
}

function selectMultiple(nombreSelect) {
    new SlimSelect({select: document.querySelector('#' + nombreSelect), placeholder: '-- SELECCIONE --'});
}

function adjunto(nombre) {
    $("#" + nombre).fileinput({dropZoneEnabled: false});
}

function mostrarFrame(url, ancho, alto) {

    if (!alto) {
        alto = 600;
    }
    if (!ancho) {
        ancho = 800;
    }

    let modal = new bootstrap.Modal(document.getElementById('capaIframeModal'), {backdrop: 'static', keyboard: false});

    let frameModalW = document.querySelector("#capaIframeModal .modal-dialog");
    let frameModalH = document.getElementById("frameModal");
    frameModalW.style.maxWidth = ancho + "px";
    frameModalH.style.height = 30 + alto + "px";
    document.getElementById("frameModal").setAttribute("src", url);
    modal.toggle();

    document.getElementById("btnCloseModal").addEventListener("click", function () {
        document.getElementById("frameModal").setAttribute("src", "javascript:void(0);");
        document.location.reload(true);//se lo he dejado para evitar que el navegador mande un mensaje
    });

    document.getElementById("btnCerrarModal").addEventListener("click", function () {
        document.getElementById("frameModal").setAttribute("src", "javascript:void(0);");
        document.location.reload(true);
    });
}

function RecorrerForm(formulario) {

    let requeridos = document.getElementById(formulario).querySelectorAll("[required]"); //selecciono todos los elementos requeridos
    requeridos.forEach(function (item) {
        item.classList.remove('is-invalid');
    }); // si existen con anterioridad que los elimine
    let pendientes = 0;
    for (i = 0; i < requeridos.length; i++) {
        if (requeridos[i].value.trim().length == 0) {
            requeridos[i].classList.add("is-invalid"); // agregar la clase para marcar el error
            pendientes++;
        }
    }

    if (pendientes == 0) {
        return true;
    } else {
        return false;
    }
}

function mayusculas(s) {
    s.value = s.value.toUpperCase();
}

function base_url(url) {
    //let urlBase = "http://10.0.48.209//sistemas/public/";
    let urlBase = "'http://localhost//sistemaKyoceraRRHH/public";


    return urlBase + url;
}

function enter_pressed(e)
{
    var keycode;
    if (window.event)
        keycode = window.event.keyCode;
    else if (e)
        keycode = e.which;
    else
        return false;
    return (keycode == 13);
}

///para algo serviran 
// estas permite devolver el valor de una llamada ajax a otra funcion
//function validarCampos(e) {
//    console.log(this.response);
//    if (this.response > 0) {
//        document.getElementById("mensaje").style.display = "";
//        return false;
//    } else {
//        document.getElementById("mensaje").style.cssText += "display:none";
//        document.getElementById("formMantenimiento").submit();
//        return true;
//    }
//}
//
//function validarFormulario(validarCampos) {
//    let url = "<?php echo base_url(); ?>" + document.getElementById("cadena").value;
//    let request = new XMLHttpRequest();
//    request.open('get', url);
//    request.onload = validarCampos;
//    request.send();
//}