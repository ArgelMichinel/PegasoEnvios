##Pegaso Envios
Aplicación web desarrollada para una empresa de logística que permite el registro de los envíos ingresantes y su asignación a los mensajeros que entregan.

-Posee logins separados para el ingreso de administradores y tiendas
-Permite leer el código QR de los envíos para extraer la identificación del mismo.
-Con la identificación del envío se conecta a la API de mercadolibre y le solicita toda la información asociada a la encomienda
-Separa los envíos por distintas zonas geográficas (CABA, Cordon 1, Cordón 2)
-Permite la asignación de los envío a los cadetes para administrar el pago y el cobro a las tiendas.
-Filtra por zonas, cadetes, tiendas y Fecha.
-Permite visualizar en un mapa el destino final de los envíos junto con una señalización por color que indica el estado de la entrega.
-Permite incluir paquetes fuera de la plataforma de mercadolibre, incluyendo la dirección y observándo la ubicación en el mapa para verificar la correcta asignación.
-Se comunica con una aplicación de movil que indica la mejor ruta para la entrega de todos los paquetes asignados a un cadete para la jonada en curso.
-Los destinatarios de los envíos pueden ingresar a la plataforma y colocando el ID del envío conocer la última ubicación del cadete que lo tiene asignado, así como conocer el estado de la entrega.
