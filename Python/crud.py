import mysql.connector

#CREAR CONEXIÓN A LA BASE DE DATOS
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="personas"
)

#CREAR LA TABLA SI NO EXISTE
cursor = conn.cursor()
cursor.execute("CREATE TABLE IF NOT EXISTS persona (ID INT AUTO_INCREMENT PRIMARY KEY, CEDULA VARCHAR(10), NOMBRE VARCHAR(50), APELLIDO VARCHAR(50))")

#INSERTAR DATOS
sql = "INSERT INTO persona (ID, CEDULA, NOMBRE, APELLIDO) VALUES (%s, %s, %s, %s)"
values = (2, "1804372432", "JUAN", "CASTRO")
cursor.execute(sql, values)
conn.commit()

#ACTUALIZAR DATOS
sql = "UPDATE persona SET NOMBRE = %s WHERE NOMBRE = %s"
values = ("CARLOS", "JUAN")
cursor.execute(sql, values)
conn.commit()

#ELIMINAR DATOS
sql = "DELETE FROM persona WHERE NOMBRE = %s"
values = ("CARLOS",)
cursor.execute(sql, values)
conn.commit()

#LEER DATOS
cursor.execute("SELECT * FROM persona")
rows = cursor.fetchall()
for row in rows:
    print(row)

#CERRAR LA CONEXIÓN
cursor.close()
conn.close()