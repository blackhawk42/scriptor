
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

-- tabla que relaciona usuario con un logro obtenido
CREATE TABLE IF NOT EXISTS user_achievement(
    user_achievement_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    achievement_id INT NOT NULL,
    time_achieved TIMESTAMP NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (achievement_id) REFERENCES achievement(achievement_id)
);

