
CREATE TABLE ALMACEN
(
	id_almacen           INTEGER AUTO_INCREMENT PRIMARY KEY,
	direccion            VARCHAR(60) NULL,
	estado               boolean NULL
 
);





CREATE TABLE ALMACEN_PRODUCTO
(
	id_producto          INTEGER NOT NULL,
	id_almacen           INTEGER NOT NULL,
	stock                INTEGER NULL
);



ALTER TABLE ALMACEN_PRODUCTO
ADD PRIMARY KEY (id_producto,id_almacen);



CREATE TABLE CATEGORIA
(
	id_categoria         INTEGER AUTO_INCREMENT PRIMARY KEY,
	descripcion          VARCHAR(60) NULL
);






CREATE TABLE CLIENTE
(
	DNI                  CHAR(8) NOT NULL,
	nombres              VARCHAR(60) NULL,
	apellidos            VARCHAR(60) NULL,
	direccion            varchar(60) NULL,
	estado               TINYINT(1) NULL,
	numero               VARCHAR(20) NULL
);



ALTER TABLE CLIENTE
ADD PRIMARY KEY (DNI);



CREATE TABLE DETALLE_ORDEN_COMPRA
(
	id_orden_compra      INTEGER NOT NULL,
	id_producto          INTEGER NOT NULL,
	cantidad             INTEGER NULL,
	precio               DECIMAL(19,4) NULL
);



ALTER TABLE DETALLE_ORDEN_COMPRA
ADD PRIMARY KEY (id_orden_compra,id_producto);



CREATE TABLE DETALLE_PEDIDO
(
	id_pedido            INTEGER NOT NULL,
	id_producto          INTEGER NOT NULL,
	cantidad             MEDIUMINT NULL,
	precio               DECIMAL(19,4) NULL
);



ALTER TABLE DETALLE_PEDIDO
ADD PRIMARY KEY (id_pedido,id_producto);



CREATE TABLE MARCA
(
	id_marca             INTEGER AUTO_INCREMENT PRIMARY KEY,
	descripcion          VARCHAR(60) NULL 
);




CREATE TABLE ORDEN_COMPRA
(
	ruc                  VARCHAR(25) NOT NULL,
	id_orden_compra      INTEGER AUTO_INCREMENT PRIMARY KEY,
	fecha                DATE NULL,
	direccion            VARCHAR(60) NULL,
	sub_total            DECIMAL(19,4) NULL,
	total                DECIMAL(19,4) NULL
);






CREATE TABLE ORDEN_VENTA
(
	id_pedido            INTEGER NOT NULL,
	total                DECIMAL(19,4) NULL,
	subtotal             DECIMAL(19,4) NULL,
	fecha                DATE NULL
);



ALTER TABLE ORDEN_VENTA
ADD PRIMARY KEY (id_pedido);



CREATE TABLE PEDIDO
(
	id_pedido            INTEGER NOT NULL,
	fecha                DATE NULL,
	direccion            VARCHAR(60) NULL,
	DNI                  CHAR(8) NULL
);



ALTER TABLE PEDIDO
ADD PRIMARY KEY (id_pedido);



CREATE TABLE PRODUCTO
(
	id_producto          INTEGER AUTO_INCREMENT PRIMARY KEY,
	descripcion          VARCHAR(60) NULL,
	imagen               TEXT NULL,
	id_medida            INTEGER NULL,
	id_marca             INTEGER NULL,
	precio_venta         NUMERIC(19,4) NULL,
	precio_compra        DECIMAL(19,4) NULL,
	cantidad             INTEGER NULL,
	id_categoria         INTEGER NULL
);






CREATE TABLE PROVEEDORES
(
	ruc                  VARCHAR(25) NOT NULL,
	razon_social         VARCHAR(60) NULL,
	direccion            VARCHAR(60) NULL,
	encargado            VARCHAR(60) NULL
);



ALTER TABLE PROVEEDORES
ADD PRIMARY KEY (ruc);



CREATE TABLE UNIDAD_MEDIDA
(
	id_medida            INTEGER AUTO_INCREMENT PRIMARY KEY,
	descripcion          VARCHAR(20) NULL
);






ALTER TABLE ALMACEN_PRODUCTO
ADD FOREIGN KEY R_12 (id_producto) REFERENCES PRODUCTO (id_producto);



ALTER TABLE ALMACEN_PRODUCTO
ADD FOREIGN KEY R_13 (id_almacen) REFERENCES ALMACEN (id_almacen);



ALTER TABLE DETALLE_ORDEN_COMPRA
ADD FOREIGN KEY R_16 (id_orden_compra) REFERENCES ORDEN_COMPRA (id_orden_compra);



ALTER TABLE DETALLE_ORDEN_COMPRA
ADD FOREIGN KEY R_17 (id_producto) REFERENCES PRODUCTO (id_producto);



ALTER TABLE DETALLE_PEDIDO
ADD FOREIGN KEY R_14 (id_pedido) REFERENCES PEDIDO (id_pedido);



ALTER TABLE DETALLE_PEDIDO
ADD FOREIGN KEY R_15 (id_producto) REFERENCES PRODUCTO (id_producto);



ALTER TABLE ORDEN_COMPRA
ADD FOREIGN KEY R_5 (ruc) REFERENCES PROVEEDORES (ruc);



ALTER TABLE ORDEN_VENTA
ADD FOREIGN KEY R_18 (id_pedido) REFERENCES PEDIDO (id_pedido);



ALTER TABLE PEDIDO
ADD FOREIGN KEY R_22 (DNI) REFERENCES CLIENTE (DNI);



ALTER TABLE PRODUCTO
ADD FOREIGN KEY R_8 (id_medida) REFERENCES UNIDAD_MEDIDA (id_medida);



ALTER TABLE PRODUCTO
ADD FOREIGN KEY R_9 (id_marca) REFERENCES MARCA (id_marca);



ALTER TABLE PRODUCTO
ADD FOREIGN KEY R_19 (id_categoria) REFERENCES CATEGORIA (id_categoria);

