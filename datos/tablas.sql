CREATE TABLE clientes (
	dni VARCHAR(9) PRIMARY KEY,
	nombre VARCHAR(50),
	apellidos VARCHAR(80),
	fecha_nac DATE,
	telefono INT
	);

CREATE TABLE productos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	descripcion VARCHAR(100),
	rebaja INT,
	estarebajado ENUM('Si','No'),
	precio DECIMAL (8,2)
	);

