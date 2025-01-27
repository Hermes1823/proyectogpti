//VARIABLES
const $inpt_img = document.getElementById("imagen");
const $img = document.getElementById("vs_img");

//EVENTOS
$inpt_img.addEventListener("change", visualizarImagen)
//FUNCIONES
function visualizarImagen(event) {
    let direccion_imagen = event.target.files[0];
    if (direccion_imagen) {
        let renderizado = new FileReader();
        renderizado.onload=(e) => {
            $img.src = e.target.result;
        };
        renderizado.readAsDataURL(event.target.files[0]);
    } else {
        $url=$img.alt;
        $img.setAttribute("src",`${$url}`);
    }

}
