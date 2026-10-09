Futuros competidores:

Les saluda Ronald, uno de los ex ganadores del ITCA SKILLS (2025). Aquí está una lista de pasos para poder correr e instalar el programa:

1- En PhpMyAdmin importen la bd quiz_game.sql (hagan un "select * from preguntas" y verifiquen si está todo correcto con los registros)

1- Ubicarse en el directorio donde tengan el programa en htdocs, ejemplo, "cd c:\xampp\htdocs\Skills-ITCA-2025"

2- darle a " composer run setupcomposer run setup " y esperar a que genere todas las dependencias

3- darle "composer run dev" o en el caso en que falle, activen el servicio de apache y mysql en xampp y en el navegador abran "http://localhost/Skills-ITCA-2025/public/juego"

4- por ultimo, cambien las credenciales del sqlite del .env a:

DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=quiz_game
 DB_USERNAME=root
 DB_PASSWORD=


El programa es sencillo y se le pueden mejorar muchas cosas, pero como consejo, solo centrense en estudiar y memorizar las respuestas de las preguntas para que no pierdan tiempo en la competencia. (estudien como acceder remotamente desde putty a un archivo de texto de un usuario y leerlo, hubo una prueba asi que nos dio muchos puntos).


Los paises de las preguntas varian el propio dia de la competencia entonces queda como obsoleto memorizar donde estan ubicadas, pero ojo, centrense en buscar países diminutos en el mapa poniendo el mouse encima de ellos (ya que como están casi ocultos, dan demasiados puntos y muy poca gente los encuentra)

Les aconsejo tener todos el programa de forma local, ya que para hostear esta onda es muy tardado y tedioso en sitios gratis.

Sean rápidos, las preguntas cada vez que alguien las contesta van valiendo menos puntos para los demás que no han contestado. (distribuyanse por materia según el fuerte de cada uno)

El dia de la competencia no se pongan nerviosos, y procuren no equivocarse en las respuestas para no perder puntos (las respuestas son case sensitive, entonces aprendanselas exactamente caracter por caracter.)

Mucha suerte y hagan enojar a los de Zacate y La Union   o/