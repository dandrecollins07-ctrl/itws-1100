CREATE TABLE movies (
  movieid INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  year CHAR(4)
);

CREATE TABLE actors (
  actorid INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  dob DATE
);

CREATE TABLE actormovies (
  id INT AUTO_INCREMENT PRIMARY KEY,
  actorid INT,
  movieid INT,
  FOREIGN KEY (actorid) REFERENCES actors(actorid),
  FOREIGN KEY (movieid) REFERENCES movies(movieid)
);