# Tower Defense Game

This Tower Defense game has been developed using Yii2 with PHP 8.2 and follows a hexagonal architecture, integrating elements from Domain-Driven Design (DDD) such as Value Objects. This project is continually evolving, and as I'm in the process of learning about hexagonal architecture, any help, corrections, or suggestions are greatly appreciated.

## Key Features

### Detailed Database
The game's database comprises over 40 tables, encompassing core entities:

![Tables](/Assets/Img/table.png)

- **Heroe:** Emphasizes individual characteristics of each hero, spanning from unique abilities to distinct attributes.

- **Land:** These dynamically generated lands are crucial in the game. Users can design and configure their own terrain using a JSON file that represents a grid of 0s and 1s, enabling the creation of competitive and personalized lands within the game.

- **User:** Represents players, encompassing all actions they can perform within the game.

- **Chapters:** Offers single-player campaigns, featuring various scenarios and challenges.

- **Monsters:** Allows for raids or incursions involving multiple players, presenting communal challenges.

- **Guild:** Enables players to create guilds and worlds, which are sets of lands contributed by various users, creating vast collaborative gaming environments.

### Hexagonal Architecture and DDD
The project is based on a hexagonal architecture, separating business logic from implementation details. Some Domain-Driven Design (DDD) principles have been applied, especially the utilization of Value Objects to maintain data integrity.

![Structure](/Assets/Img/structure.png)

```
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
```

## Repository Structure

The game's specific logic primarily resides in middleware to avoid exposing all the code in this repository. However, examples and guides are provided regarding the implementation of the hexagonal architecture and other essential game aspects.

## Contributions

Any contributions, advice, or corrections are welcome. If interested in contributing, please feel free to make a pull request or report issues in the 'Issues' section.

## Installation and Execution

To run this game locally, follow these steps:

1. Clone this repository.
2. Install dependencies using Composer.
3. Set up the database using the script provided in the 'database' directory.
4. Start the development server.

## Additional Notes

This game is constantly evolving and learning. Thus, the entire game logic will not be displayed within this repository. However, examples and guides will be provided to understand the most critical aspects of the game's architecture and design.

## License

feel free to use it, if you need help to understand, please email me to opastran02@gmail.com
database:

The c

