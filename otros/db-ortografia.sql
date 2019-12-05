
CREATE DATABASE IF NOT EXISTS ortografia;


-- tabla de tipo de usuario
CREATE TABLE IF NOT EXISTS user_type(
    user_type_id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL
);

-- tabla de usuario
CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    contrasena BINARY(60) NOT NULL,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name varchar(255),
    time_creation TIMESTAMP NOT NULL,
    time_modification TIMESTAMP NOT NULL,
    user_type_id INT NOT NULL,
    FOREIGN KEY (user_type_id) REFERENCES user_type(user_type_id)
);

-- tabla de tipo de juego
CREATE TABLE IF NOT EXISTS game_type(
    game_type_id INT AUTO_INCREMENT PRIMARY KEY,
    game_name VARCHAR(255) NOT NULL,
    game_description VARCHAR(500),
    template_path VARCHAR(255) NOT NULL,
    attributes LONGTEXT NOT NULL 
);

-- tabla de juego
CREATE TABLE IF NOT EXISTS game(
    game_id INT AUTO_INCREMENT PRIMARY KEY,
    author INT NOT NULL,
    game_type_id INT NOT NULL,
    game_attributes LONGTEXT NOT NULL,
    time_creation TIMESTAMP NOT NULL,
    FOREIGN KEY (author) REFERENCES users(user_id),
    FOREIGN KEY (game_type_id) REFERENCES game_type(game_type_id)
);

-- tabla de registro de sesion de juegos
CREATE TABLE IF NOT EXISTS game_session_record(
    game_session_record_id iNT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    incorrect_answers LONGTEXT NOT NULL,
    time_start TIMESTAMP NOT NULL,
    time_end TIMESTAMP NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (game_id) REFERENCES game(game_id)
);

-- tabla de los logros
CREATE TABLE IF NOT EXISTS achievement(
    achievement_id INT AUTO_INCREMENT PRIMARY KEY,
    achievement_name VARCHAR(255) NOT NULL,
    achievement_description VARCHAR(500),
    achievement_image VARCHAR(255) 
);

-- agregar logros
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Buen Promedio','Jugadores con promedio arriba de 85','/img/buenpromedio.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Juego Publicado','El jugador a publicado un juego','/img/juegopublicado.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Jugador Pro','El jugador a jugado mas de 10 juegos','/img/jugadorpro.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Máximo Puntaje','El jugador obtuvo un 100','/img/maximopuntaje.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Primer Juego','El jugador ha jugado su primer juego','/img/primerjuego.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Red Social','El jugador ha publicado su score con el boton red social','/img/redsocial.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Revisar Calificaciones','El jugador ha consultado sus calificaciones','/img/revisarcalifs.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Top 5','El jugador se encuentra entre los 5 mejores jugadores del sitio','/img/top5.jpg');
INSERT INTO achievement(achievement_name, achievement_description, achievement_image) VALUES('Veloz','El jugador ha acabado en menos de 5 minutos un juego','/img/veloz.jpg');

-- tabla que relaciona usuario con un logro obtenido
CREATE TABLE IF NOT EXISTS user_achievement(
    user_achievement_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    achievement_id INT NOT NULL,
    time_achieved TIMESTAMP NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (achievement_id) REFERENCES achievement(achievement_id)
);

