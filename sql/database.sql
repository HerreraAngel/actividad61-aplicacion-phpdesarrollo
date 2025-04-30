CREATE TABLE focas (
    foca_id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_animal varchar(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    peso DECIMAL(5,2) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    habitat VARCHAR(100) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO focas (nombre,codigo_animal, edad, peso, especie, habitat) VALUES
('Luna',37579934G, 5, 120.50, 'Foca monje', 'Océano Atlántico'),
('Rocky',34721722W,8, 150.75, 'Foca gris', 'Mar del Norte'),
('Marina',13762852C ,3, 95.20, 'Foca común', 'Pacífico Norte'),
('Bruno',45941725F ,6, 130.40, 'Foca leopardo', 'Antártida'),
('Nina',68373285N ,4, 110.80, 'Foca monje', 'Mediterráneo'),
('Oscar',15646576K ,7, 140.30, 'Foca barbuda', 'Ártico'),
('Sally',59635730L ,2, 85.60, 'Foca anillada', 'Mar Báltico'),
('Max',39703586C,9, 160.45, 'Foca gris', 'Atlántico Norte'),
('Bella',08902068X,5, 125.90, 'Foca común', 'Costa de California'),
('Tommy',89957452J,6, 135.00, 'Foca leopardo', 'Océano Antártico');

