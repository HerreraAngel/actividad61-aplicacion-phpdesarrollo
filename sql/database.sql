DROP TABLE IF EXISTS focas;

CREATE TABLE focas (
    foca_id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_animal VARCHAR(15) NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    peso DECIMAL(5,2) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    habitat VARCHAR(100) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO focas (codigo_animal, nombre, edad, peso, especie, habitat) VALUES
('68373285N', 'Nina', 4, 110.80, 'Foca monje', 'Mediterráneo'),
('15646576K', 'Oscar', 7, 140.30, 'Foca barbuda', 'Ártico'),
('59635730L', 'Sally', 2, 85.60, 'Foca anillada', 'Mar Báltico'),
('39703586C', 'Max', 9, 160.45, 'Foca gris', 'Atlántico Norte'),
('08902068X', 'Bella', 5, 125.90, 'Foca común', 'Costa de California'),
('89957452J', 'Tommy', 6, 135.00, 'Foca leopardo', 'Océano Antártico');
