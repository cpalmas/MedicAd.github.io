let imagenes = [
    {
        "url": "img/img1.jpg",
        "nombre": "Emergencias",
        "descripcion": "Atención inmediata para casos críticos o urgentes las 24 horas."

    },
    {
        "url": "img/img2.jpg",
        "nombre": "Radiología",
        "descripcion": "Diagnóstico por imágenes, como rayos X, tomografías y resonancias magnéticas."

    },
    {
        "url": "img/img3.jpg",
        "nombre": "Laboratorio Clínico",
        "descripcion": "Análisis de muestras biológicas para diagnóstico de enfermedades."

    },
    {
        "url": "img/img4.jpg",
        "nombre": "Cirugía General",
        "descripcion": "Procedimientos quirúrgicos para tratar diversas condiciones médicas."

    },
    {
        "url": "img/img5.jpg",
        "nombre": "Unidad de Cuidados Intensivos ",
        "descripcion": "Atención especializada para pacientes que requieren monitoreo constante."

    },
    {
        "url": "img/img6.jpg",
        "nombre": "Pediatría",
        "descripcion": "Atención médica especializada para niños y adolescentes."

    },
    {
        "url": "img/img7.jpg",
        "nombre": "Ginecología y Obstetricia",
        "descripcion": "Servicios para la salud femenina, embarazo, parto y salud reproductiva."

    },
]


let atras = document.getElementById('atras');
let adelante = document.getElementById('adelante');
let imagen = document.getElementById('img');
let puntos = document.getElementById('puntos');
let texto = document.getElementById('texto')
let actual = 0
posicionCarrusel()

atras.addEventListener('click', function(){
    actual -=1

    if (actual == -1){
        actual = imagenes.length - 1
    }

    imagen.innerHTML = ` <img class="img" src="${imagenes[actual].url}" alt="logo pagina" loading="lazy"></img>`
    texto.innerHTML = `
    <h3>${imagenes[actual].nombre}</h3>
    <p>${imagenes[actual].descripcion}</p>
    `
    posicionCarrusel()
})  
adelante.addEventListener('click', function(){
    actual +=1

    if (actual == imagenes.length){
        actual = 0
    }

    imagen.innerHTML = ` <img class="img" src="${imagenes[actual].url}" alt="logo pagina" loading="lazy"></img>`
    texto.innerHTML = `
    <h3>${imagenes[actual].nombre}</h3>
    <p>${imagenes[actual].descripcion}</p>
    `
    posicionCarrusel()
})  

function posicionCarrusel() {
    puntos.innerHTML = ""
    for (var i = 0; i <imagenes.length; i++){
        if(i == actual){
            puntos.innerHTML += '<p class="bold">.<p>'
        }
        else{
            puntos.innerHTML += '<p>.<p>'
        }
    } 
}
