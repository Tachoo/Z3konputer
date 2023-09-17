//document.addEventListener('click',function(e){console.log(e);});

//esperar a que el javascrpt este cargado el doom
document.addEventListener('DOMContentLoaded',function()
{
  InitApp(); //Llamar a la funcion cuando el Doom este cargado
});
//Funcion principal a la ejecucion del script (Similar al Main en C++ Utros lenguajes compilados)
function InitApp()
{
 menu(); //Funcion de Open | Close Menu
 search_viewport(); //Open the search viewport
 //ConsultarAPI();//selectcant(); //Select Option for Cant 
}

//SelecionarElObjeto Botton
function menu()
{
  //Selecionamos objetos header-menu
  const menuBtn=document.querySelector('.header-menu');
  //Añadimos un event listener a menu-btn
  menuBtn.addEventListener('click',function()
  {
    //Selecionamos el body y añadimos classe de fijarbody
    document.querySelector('body').classList.add('fijarbody');
    //Selecionamos el FOG Y quitamos classe de hide 
    document.querySelector('.fog').classList.remove('hide');
            
  });
  //Selecionamos el objeto de menu_close
  const MenuClose =document.querySelector('.menu_close');
  MenuClose.addEventListener('click',function()
  {
    // Selecionamos el .fog añadimos class hide
    document.querySelector('.fog').classList.add('hide');
    // Selecionamos el body removemos class fijarbody
    document.querySelector('body').classList.remove('fijarbody');
  });
  //Selecionamos el Objeto de Menu_Background
  const MenuCloseBackground =document.querySelector('.menu_background');
  MenuCloseBackground.addEventListener('click',function()
  {
    // Selecionamos el .fog añadimos class hide
    document.querySelector('.fog').classList.add('hide');
    // Selecionamos el body removemos class fijarbody
    document.querySelector('body').classList.remove('fijarbody');
  });
}
//Selecionar el Objeto INPUT/BUTTON e instanciar el objeto de search-viewport
function search_viewport()
{

  //Seteamos el input en forma de solo read search-bar__text evitar que se escriba cuando ya iniciamos la rutina
  const inputText=document.getElementById('search-bar__text').readOnly = true;
  //Abrir el viewport
  const search_viewport=document.querySelector('.search-bar__field');
  //añadir el evento
  search_viewport.addEventListener('click',function()
  {
    //Seleciono el search-viewport
    document.querySelector('.search-viewport').classList.remove('hide');
    //fijamos el body
    document.querySelector('body').classList.add('fijarbody');
  });
  //Cerrar Viewport
  const search_viewport_close = document.querySelector('.search__close');
  //Añadimos el EventListner
  search_viewport_close.addEventListener('click',function()
  {
    //Seleciono el search-viewport
    document.querySelector('.search-viewport').classList.add('hide');
    //Fijamos el body
    document.querySelector('body').classList.remove('fijarbody');
  });
}

//BTN Seleccion de cantidad en /p 
function selectcant()
{
  //selecionar la classe
  const BtnSelectCant = document.querySelector('.selector-cantidad__opcion');
  BtnSelectCant.addEventListener('click',function()
  {
     const x=document.querySelectorAll('.fog');
    //Como sabemos que tenemos mas de 1 fog  entonces nos retona un arreglo con los fogs
    //Acederemos al segundo en la lista del arreglo => index 1
    x[1].classList.remove('hide');

    let b =document.querySelector('.Cant-Opciones');

    for (let index = 0; index < 5; index++) {
      const OpcionesCant=document.createElement('SPAN');
      OpcionesCant.classList.add('bold9');
      OpcionesCant.textContent='desde script';
      OpcionesCant.dataset=index;

      b.appendChild(OpcionesCant);
      
    }
    console.log(OpcionesCant);


  });

}

//consultar api 
async function ConsultarAPI()
{
  try
  {
    const url='http://localhost:3000/api/productos'
    const resultado=await fetch(url);
    const productos= await resultado.json();
    showproducts(productos);

  }
  catch(error)
  {
    console.log(error);
  }
}
function showproducts(productos)
{
  productos.forEach( productos => {
  const {id,name,precio}= productos;

  const nombreproducto= document.createElement('h4');
  nombreproducto.classList.add('a-buton')
  nombreproducto.textContent=name;

  const selectorNombre =document.querySelector('.product-card__text__titulo');
  selectorNombre.appendChild(nombreproducto);

  const idproducto= document.createElement('h4');
  idproducto.classList.add('a-buton')
  idproducto.textContent=id;

  const selectorid =document.querySelector('.product-card__text__titulo');
  selectorid.appendChild(idproducto);

  const precioproducto= document.createElement('p');
  precioproducto.classList.add('importe__precio')
  precioproducto.textContent=precio;

  const selectorprecio =document.querySelector('.importe');
  selectorprecio.appendChild(precioproducto);


  });
}