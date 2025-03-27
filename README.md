# MongoDB data

```bash
docker exec -it <mongo-container-hash> sh
mongosh
use filmlibrary
```
Insert movies
```js
db.movies.insertMany([
    {
        title: "The Flash 2",
        year: 2025,
        media_type: "BR",
        director: "Andy Muschietti",
        actors: ["Ezra Miller", "Michael Keaton", "Ben Affleck"],
        genres: ["Action", "Sci-Fi"],
        country: "USA"
    },
    {
        title: "Guardians of the Galaxy Vol. 4",
        year: 2025,
        media_type: "BR",
        director: "James Gunn",
        actors: ["Chris Pratt", "Zoe Saldana", "Dave Bautista"],
        genres: ["Action", "Adventure", "Sci-Fi"],
        country: "USA"
    },
    {
        title: "Avatar: The Seed of Earth",
        year: 2025,
        media_type: "BR",
        director: "James Cameron",
        actors: ["Sam Worthington", "Zoe Saldana", "Sigourney Weaver"],
        genres: ["Action", "Sci-Fi"],
        country: "USA"
    },
    {
        title: "Mission Impossible 8",
        year: 2025,
        media_type: "BR",
        director: "Christopher McQuarrie",
        actors: ["Tom Cruise", "Simon Pegg", "Rebecca Ferguson"],
        genres: ["Action", "Adventure", "Thriller"],
        country: "USA"
    }
])


db.movies.insertMany([
    {
        title: "The Matrix",
        year: 1999,
        media_type: "DVD",
        director: "Lana Wachowski, Lilly Wachowski",
        actors: ["Keanu Reeves", "Laurence Fishburne", "Carrie-Anne Moss"],
        genres: ["Sci-Fi", "Action"],
        country: "USA"
    },
    {
        title: "Interstellar",
        year: 2014,
        media_type: "BR",
        director: "Christopher Nolan",
        actors: ["Matthew McConaughey", "Anne Hathaway", "Jessica Chastain"],
        genres: ["Sci-Fi", "Drama"],
        country: "USA"
    },
    {
        title: "Titanic",
        year: 1997,
        media_type: "CD",
        director: "James Cameron",
        actors: ["Leonardo DiCaprio", "Kate Winslet"],
        genres: ["Romance", "Drama"],
        country: "USA"
    },
    {
        title: "The Godfather",
        year: 1972,
        media_type: "VHS",
        director: "Francis Ford Coppola",
        actors: ["Marlon Brando", "Al Pacino", "James Caan"],
        genres: ["Crime", "Drama"],
        country: "USA"
    },
    {
        title: "Avengers: Endgame",
        year: 2019,
        media_type: "BR",
        director: "Anthony Russo, Joe Russo",
        actors: ["Robert Downey Jr.", "Chris Evans", "Scarlett Johansson"],
        genres: ["Action", "Sci-Fi"],
        country: "USA"
    },
    {
        title: "Dune: Part Two",
        year: 2024,
        media_type: "BR",
        director: "Denis Villeneuve",
        actors: ["Timothée Chalamet", "Zendaya", "Rebecca Ferguson"],
        genres: ["Sci-Fi", "Adventure"],
        country: "USA"
    }
])

```