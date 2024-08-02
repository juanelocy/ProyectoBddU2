-- Dale los permisos de select al rol reportes
GRANT SELECT ON ALL TABLES IN SCHEMA public TO reportes;


-- Todos los permisos al super_admin
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO super_admin;


-- Permisos de only_insert_and_select
GRANT INSERT, SELECT ON ALL TABLES IN SCHEMA public TO only_insert_and_select;


-- Asignar roles a los usuarios
GRANT reportes TO usuario_reportes;
GRANT super_admin TO usuario_superadmin;
GRANT only_insert_and_select TO usuario_insert_select;
