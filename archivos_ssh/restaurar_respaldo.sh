#!/bin/bash

# Directorio donde están los respaldos
respaldo_dir="./copias_seguridad"

# Encuentra el archivo de respaldo más reciente
nombre_respaldo=$(ls -t $respaldo_dir/*.sql | head -n 1)

# Verifica si se encontró un archivo de respaldo
if [ -z "$nombre_respaldo" ]; then
  echo "No se encontró ningún archivo de respaldo en $respaldo_dir"
  exit 1
fi

# Extrae el nombre del archivo sin la ruta
nombre_respaldo=$(basename "$nombre_respaldo")

echo "Usando el archivo de respaldo: $nombre_respaldo"

# Ejecuta Docker Compose para iniciar el contenedor PostgreSQL
docker compose up -d

# Espera unos segundos para asegurarse de que el contenedor esté listo
echo "Esperando a que PostgreSQL esté listo..."
sleep 11

# Copia el archivo de respaldo al contenedor PostgreSQL
docker cp "$respaldo_dir/$nombre_respaldo" postgres_restaurado:/tmp/$nombre_respaldo

# Restaura el respaldo en la base de datos usando psql
docker exec -i postgres_restaurado psql -U postgres -d gestion_mercados -f /tmp/$nombre_respaldo

# Limpia el archivo de respaldo dentro del contenedor
docker exec -i postgres_restaurado rm /tmp/$nombre_respaldo

echo "Restauración completada. Verifica los logs para cualquier error."
