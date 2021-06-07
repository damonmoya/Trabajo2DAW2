# Trabajo2DAW2
Trabajo de DAW2 portal web + tienda online

## Instalar MV y probar sitio web con Wordpress

***

**1.** Descargar el .ova de la MV en [este enlace](https://drive.google.com/drive/folders/1uuC6QFbWIdGb5I25R3_MFsOe43cdUbQr?usp=sharing)

**2.** En VirtualBox, importar la máquina en Archivo > Importar servicio virtualizado...

**3.** Seleccionar el .ova descargado y aceptar las opciones por defecto.

**4.** Arrancar la MV. Saltará un error porque no se reconoce la interfaz de red -> Seleccionar Cambiar preferencias de red y seleccionar un adaptador de red.

**5.** De vuelta a la MV, esperar a que termine de iniciar e ingresar las credenciales:

```
usuario: bitnami
clave: bitnami123456789
```

**6.** Obtener la dirección IP donde se ejecuta el servidor, mediante el comando:
```
$ ip addr
```
Se mostrarán las direcciones IP de las dos interfaces de red de la máquina, coger la dirección de la segunda interfaz.

**7.** Ingresar la dirección IP en el navegador para acceder al sitio web.

**8.** Acceder al panel de administrador de Wordpress en la página: direccion_ip/wp-admin

Las cuentas de administrador son:
```
usuario: admin_damon
clave: Admin1234//Admin1234

usuario: admin_daniel
clave: Admin1234//Admin1234
```
