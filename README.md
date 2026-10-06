# FarmaTrace - Sistema de Gestión de Inventario Farmacéutico

## Contexto del Proyecto
FarmaTrace (v1.1.0) es un sistema web transaccional desarrollado en Laravel diseñado para la administración rigurosa de inventarios y ventas en farmacias.

## Alcance de Pruebas y Calidad de Software (SQA)
En la fase actual, el proyecto está sometido a una estrategia de pruebas basada en riesgos enfocada en el backend. 

* **Ítems bajo prueba:** La validación se centra exclusivamente en la Capa de Dominio (Modelo `Lote`) y la Capa de Servicios (`LoteService` y `VentaService`), asegurando que las reglas críticas de negocio (como el bloqueo de ventas con stock negativo o medicamentos caducados) sean inquebrantables antes de tocar la base de datos.
* **Fuera de alcance:** En esta iteración no se incluyen pruebas de interfaz gráfica de usuario (Frontend/Vistas), módulos de autenticación, ni generación de reportes administrativos.