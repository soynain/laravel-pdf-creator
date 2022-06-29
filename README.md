## Práctica LARAVEL: Generar reporte PDF

Bienvenido a mi repo, tuve la curiosidad de saber como generar pdf's en laravel. Para esta práctica usé
la dependencia de Snappy Wrapper para el PDF, ya que acepta ciertas clases de boostrap, ¿por qué digo esto?
porque la dependencia usa un motor de render que usa una versión vieja de CSS y Flex no es compatible
con tal formato. Es importante que a la hora de usar esta dependencia o la más usada que es DOMPDF (este no
admite boostrap ni de chiste), diseñemos los layaouts con grid que parece si es compatible o con puras tablas,
o a la vieja escuela: puro display inline y positions jajajaja.

Si quieres usar flex con snappy debes usar una clase deprecada de css: -webkit-box
(https://developer.mozilla.org/es/docs/Web/CSS/-moz-box-flex), es como flex
pero prototipado y limitado, pero funciona muy bien. Solo usalo en pdf's.

De resto, en esta práctica solo he aplicado:

-File storage links

-File handling

-Snappy pdf creation

-moz-box-flex

-Manejo de DOM con javascript vanilla

Aquí presento las caps de los formularios, no están validados porque me dio pereza, también me faltó añadir:
-Un scroll a la tabla del tercer formulario
-Un modal a imprimir mientras se genera el pdf en el servidor
![image](https://user-images.githubusercontent.com/78714792/176547267-7caee5e2-4c5f-47c1-8076-01fb697d939e.png)
![image](https://user-images.githubusercontent.com/78714792/176547331-9449cfd4-fe93-4676-bef1-c7ad01cbaf79.png)
![image](https://user-images.githubusercontent.com/78714792/176547399-f338cb16-56f3-4ca9-8a17-3e96d21b95ca.png)


El resultado final es el siguiente, el pdf se genera muy bien, y webkit-box nos permite plasmar
flex en el pdf muy bien.
![image](https://user-images.githubusercontent.com/78714792/176547171-69ba77d5-198c-4ce9-9ce8-2bf4e4819dad.png)
