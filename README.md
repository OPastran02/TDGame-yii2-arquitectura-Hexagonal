# Tower Defense Game

Este juego de Tower Defense ha sido desarrollado en Yii2 con PHP 8.2 y sigue una arquitectura hexagonal, incorporando elementos del Domain-Driven Design (DDD) como los Value Objects. Este es un proyecto en constante evolución, y estoy aprendiendo sobre la arquitectura hexagonal, por lo que cualquier ayuda, corrección o sugerencia es bienvenida.

## Características principales

- **Base de datos detallada:** La base de datos del juego consta de más de 40 tablas que incluyen entidades principales como:
    ![](/Assets/Img/table.png)

    - **Heroe:** Se hace énfasis en las características individuales de cada héroe, desde sus habilidades hasta sus atributos únicos.

    - **Land:** Las tierras generadas son fundamentales en el juego. Estas se crean mediante un archivo JSON que representa una cuadrícula de 0 y 1. Los usuarios pueden diseñar y configurar su propio terreno, permitiendo la creación de lands competitivas y personalizadas desde el juego.

    - **User:** Representa a los usuarios y abarca todas las acciones que pueden realizar en el juego.

    - **Chapters:** Ofrece campañas para un solo jugador, desplegando distintos escenarios y desafíos.

    - **Monsters:** Permite raids o incursiones de varios jugadores, presentando desafíos conjuntos para la comunidad.

    - **Guild:** Permite a los jugadores crear gremios y worlds, que son conjuntos de lands de distintos usuarios, creando así vastos mundos colaborativos.
      
- **Arquitectura Hexagonal y DDD:** El proyecto se basa en una arquitectura hexagonal que permite separar la lógica del negocio de los detalles de implementación. Además, se han aplicado algunos principios del Domain-Driven Design (DDD), particularmente el uso de Value Objects para mantener la integridad de los datos.
![Estructura](/Assets/Img/structure.png)

|--api
    |--Core
        |--BundleContext
                |-----Application
                        |----Query (clases de consulta)
                        |----Command (clases de inserción)
                        |----Helpers (clases para mantener SOLID tanto en Query como en Command) 
                |-----Domain
                        |----Repository (Interfaz del dominio)
                        |----ValueObject (value objects del dominio)
                        clase del dominio
                |-----Infrastructure
                        |----Persistencia (donde se comunica con la base de datos)
                        |----UI (donde devuelve al usuario los datos, en este caso, es un JSON)
                
## Estructura del repositorio

La lógica específica del juego se encuentra principalmente en un middleware para no exponer todo el código en este repositorio. Sin embargo, se proporcionan ejemplos y guías sobre la implementación de la arquitectura hexagonal y otros aspectos relevantes del juego.

## Contribuciones

Cualquier contribución, consejo o corrección es bienvenida. Si estás interesado en contribuir, por favor, siéntete libre de hacer una solicitud de extracción (pull request) o reportar problemas en la sección de *Issues*.

## Instalación y ejecución

Para ejecutar este juego localmente, sigue estos pasos:

1. Clona este repositorio.
2. Instala las dependencias utilizando Composer.
3. Configura la base de datos con el script proporcionado en el directorio `database`.
4. Inicia el servidor de desarrollo.

## Notas adicionales

Este juego está en constante evolución y aprendizaje, por lo que la lógica del juego no se mostrará por completo en este repositorio. Sin embargo, se proveerán ejemplos y guías para comprender los aspectos más importantes de la arquitectura y diseño del juego.

## Licencia

Este proyecto se distribuye bajo la licencia [especificada en el archivo LICENSE](link-to-license).

database:

The c

