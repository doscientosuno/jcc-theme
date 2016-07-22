# JCC Theme y generador de temas de Wordpress

Fork del tema [Twentyfifteen de Wordpress](https://es.wordpress.org/themes/twentyfifteen/) que incluye un generador de temas de Wordpress basado en [Yeogurt de Jake Larson](https://github.com/larsonjj/generator-yeogurt).

## Dependencias y lenguajes

El generador está escrito en ES6 y funciona a través de Babel.

El generador utiliza
- Node v6.0.0
- NPM v3.9.0
- Babel: transpilador ES6 -> Javascript 5
- Gulp: automatizador de tareas
- Browserify: agrupa todos los archivos JS interrelacionados a través de *require* en un sólo archivo JS funcional.
- Browser-sync: permite acceder a la web desde un puerto diferente (normalmente el 3000) y la pone a disposición del resto de equipos de la red local, actualizando automáticamente la web en todos los equipos desde los que se la visita, y facilitando por tanto el flujo de trabajo del diseño responsive.

Librerías CCS y Javascript usadas

- [Twitter Bootstrap v4.alpha](http://v4-alpha.getbootstrap.com/getting-started/introduction/)
- [Font Awesome](http://fontawesome.io/)
- [Parallax.js](https://github.com/pixelcog/parallax.js/)

## Instalación del generador

    cd /ruta-del-tema/.npm

Para instalar las dependencias

    npm install

Para poner en marcha el automatizador de tareas

    gulp serve

A partir de aquí, cualquier cambio realizado en la web se propagará automáticamente.

## Estructura

El generador se encuentra en la carpeta .npm y contiene todos los archivos fuente en .npm/src

- \_images: Imágenes fuente del tema. Se optimizan y *minifican* y se envían a **images**.
- \_scripts: Código JavaScript del front-end escrito en ES6. Se parte de *main.js* para compilar todos los imports en un sólo archivo en Javascript 5 minificado que se envía a **js/front.js**.
- \_styles: Archivos SASS. Se compilan todos en un único archivo **style.css** que incluye la información obligatoria de un tema de Wordpress basada en la información aportada en *package.json*.
- \_templates: Archivos PHP. Se replican directamente, junto a la estructura de carpetas que se cree, a la raíz del tema.
- \_vendor: Paquetes de terceros no disponibles en NPM.

Cualquier carpeta no precedida de un **\_** se replicará a la raíz directamente. En este caso tenemos *fonts* con tipografías no disponibles a través de Google Fonts y *languages* con los archivos de idioma del tema.

## Utilidades CSS

Al margen de los estilos proporcionados por Bootstrap y Font Awesome, se han generado una serie de patrones para el funcionamiento del tema de JCC.

### Logo de Maig
Clases fa fa-maig
```html
<span class="fa fa-maig"></span>
```

### Footer rojo de imagen
Clase img-foot.
```html
<img src="..." alt="..." class="img-fluid" />
<div class="img-foot">Lluita obrera</div>
```

### Paralaje
Para permitir este efecto, así como poder usar imágenes de fondo que ocupan todo el ancho de la pantalla, se ha prescindido del contenedor (clase *container*) en todos los contenidos **salvo para las entradas de blog**. Si se quiere delimitar el contenido, el usuario debe incluir esta clase en el código de las páginas o los widgets donde sea oportuno.

#### Imagen de fondo simple

Hay que indicar la ruta de la imagen y la altura del hueco de visualización de la imagen.
```html
<div class="parallax-window parallax-window-100" data-parallax="scroll" data-image-src="...">
</div>
```
El número indica el porcentaje de la altura del viewport que ocupa el hueco y están disponibles las siguientes opciones:
- parallax-window-100
- parallax-window-80
- parallax-window-60
- parallax-window-40
- parallax-window-20

#### Imagen de fondo con contenido
```html
<div class="parallax-window parallax-window-100" data-parallax="scroll" data-image-src="...">
  <div class="parallax-window-content">
    <h2>Título</h2>
  </div>
</div>
```
