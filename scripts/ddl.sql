--Creacion de los roles
CREATE ROLE reportes;
CREATE ROLE super_admin;

CREATE ROLE only_insert_and_select;


--Creacion de los usuarios
CREATE USER usuario_reportes WITH PASSWORD 'reportes';
CREATE USER usuario_superadmin WITH PASSWORD 'super_admin';
CREATE USER usuario_insert_select WITH PASSWORD 'only_insert_and_select';


--Creacion de las vistas
-- Vista para la tabla migrations
CREATE VIEW vw_migrations AS
SELECT * FROM public.migrations;

-- Vista para la tabla users
CREATE VIEW vw_users AS
SELECT * FROM public.users;

-- Vista para la tabla password_reset_tokens
CREATE VIEW vw_password_reset_tokens AS
SELECT * FROM public.password_reset_tokens;

-- Vista para la tabla failed_jobs
CREATE VIEW vw_failed_jobs AS
SELECT * FROM public.failed_jobs;

-- Vista para la tabla personal_access_tokens
CREATE VIEW vw_personal_access_tokens AS
SELECT * FROM public.personal_access_tokens;

-- Vista para la tabla puestos
CREATE VIEW vw_puestos AS
SELECT * FROM public.puestos;

-- Vista para la tabla comerciantes
CREATE VIEW vw_comerciantes AS
SELECT * FROM public.comerciantes;

-- Vista para la tabla arrendamientos
CREATE VIEW vw_arrendamientos AS
SELECT * FROM public.arrendamientos;

-- Vista para la tabla productos
CREATE VIEW vw_productos AS
SELECT * FROM public.productos;

-- Vista para la tabla inventarios
CREATE VIEW vw_inventarios AS
SELECT * FROM public.inventarios;

-- Vista para la tabla ventas
CREATE VIEW vw_ventas AS
SELECT * FROM public.ventas;

-- Vista para la tabla pagos
CREATE VIEW vw_pagos AS
SELECT * FROM public.pagos;

-- Vista para la tabla ingresos
CREATE VIEW vw_ingresos AS
SELECT * FROM public.ingresos;

-- Vista para la tabla gastos
CREATE VIEW vw_gastos AS
SELECT * FROM public.gastos;

-- Vista para la tabla mantenimientos
CREATE VIEW vw_mantenimientos AS
SELECT * FROM public.mantenimientos;

-- Vista para la tabla inspecciones
CREATE VIEW vw_inspecciones AS
SELECT * FROM public.inspecciones;

-- Vista para la tabla tareas_mantenimiento
CREATE VIEW vw_tareas_mantenimiento AS
SELECT * FROM public.tareas_mantenimiento;

