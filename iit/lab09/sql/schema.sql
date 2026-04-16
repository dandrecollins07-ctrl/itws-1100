CREATE TABLE movies (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255),
  year INT
);

CREATE TABLE actors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  birth_year INT
);

CREATE TABLE movie_actors (
  movie_id INT,
  actor_id INT,
  FOREIGN KEY (movie_id) REFERENCES movies(id),
  FOREIGN KEY (actor_id) REFERENCES actors(id)
);