#!/bin/bash

# Rutas para los archivos de log
logs_dir="/home/juanelo/logs/"
backup_log="$logs_dir/backup.log" # Ruta del archivo de registro para el respaldo
error_log="$logs_dir/error_backup.log" # Ruta del archivo de registro para errores

# Directorios de respaldos y logs
respaldos_dir="/home/juanelo/respaldos/"
mkdir -p "$respaldos_dir" # Asegúrate de que el directorio de respaldos exista
mkdir -p "$logs_dir" # Asegúrate de que el directorio de logs exista

fecha_hora=$(date +"%Y-%m-%d_%H-%M-%S")
nombre_respaldo="respaldo_completo_$fecha_hora.sql"

# Realizar copia de seguridad completa de la base de datos, usuarios y roles
docker exec postgres pg_dumpall -U postgres -f /var/lib/postgresql/data/$nombre_respaldo > "$backup_log" 2> "$error_log"

# Copiar el respaldo al directorio local
docker cp postgres:/var/lib/postgresql/data/$nombre_respaldo "$respaldos_dir" >> "$backup_log" 2>> "$error_log"

# Eliminar el archivo de respaldo del contenedor (opcional)
docker exec postgres rm /var/lib/postgresql/data/$nombre_respaldo >> "$backup_log" 2>> "$error_log"

# Obtener el archivo de respaldo más reciente
ultimo_respaldo=$(ls -t $respaldos_dir | head -n 1)

# Copiar el archivo más reciente al servidor remoto mediante SCP
scp "$respaldos_dir/$ultimo_respaldo" gregory@192.168.88.129:/home/gregory/copias_seguridad/ >> "$backup_log" 2>> "$error_log"
