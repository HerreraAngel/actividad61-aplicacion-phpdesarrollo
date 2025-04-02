CREATE TABLE focas (
    foca_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    peso DECIMAL(5,2) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    habitat VARCHAR(100) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO focas (nombre, edad, peso, especie, habitat) VALUES
('Luna', 5, 120.50, 'Foca monje', 'Océano Atlántico'),
('Rocky', 8, 150.75, 'Foca gris', 'Mar del Norte'),
('Marina', 3, 95.20, 'Foca común', 'Pacífico Norte'),
('Bruno', 6, 130.40, 'Foca leopardo', 'Antártida'),
('Nina', 4, 110.80, 'Foca monje', 'Mediterráneo'),
('Oscar', 7, 140.30, 'Foca barbuda', 'Ártico'),
('Sally', 2, 85.60, 'Foca anillada', 'Mar Báltico'),
('Max', 9, 160.45, 'Foca gris', 'Atlántico Norte'),
('Bella', 5, 125.90, 'Foca común', 'Costa de California'),
('Tommy', 6, 135.00, 'Foca leopardo', 'Océano Antártico');

