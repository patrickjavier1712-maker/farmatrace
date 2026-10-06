# Plan de Pruebas de Software - FarmaTrace (v1.1.0)

## 1. Contexto del Proyecto y Alcance
FarmaTrace es un sistema transaccional para la gestión de inventario farmacéutico. El sistema se encuentra en fase de validación de reglas de negocio en el backend. 
**Alcance de pruebas actual:** La evaluación cubre exclusivamente la capa de Dominio y Servicios (`Lote.php` y `LoteService.php`), garantizando la integridad de los datos antes de inyectarlos a la base de datos.
**Fuera de alcance:** Módulos de autenticación, interfaces de usuario y reportes.

2. Estrategia y Planificación
Se aplica una **Estrategia Basada en Riesgos**. El mayor riesgo de negocio es permitir la venta de medicamentos caducados o procesar transacciones con stock negativo (riesgo legal y logístico).
-Tipos de Prueba: Funcionales (validación de reglas de negocio).
-Niveles de Prueba:- Pruebas de Componente/Unidad (para la lógica de servicios) y Pruebas de Modelo (para evaluar el cast de datos y dependencias internas de Laravel).
-Técnica de Diseño: "Valores Límite". Evaluamos el comportamiento del sistema probando el stock exacto, excediendo por 1 unidad, y evaluando fechas límite.

3. Diseño e Implementación de Pruebas
Se diseñaron e implementaron los siguientes casos automatizados con PHPUnit:
-Prueba de Modelo (`tests/Feature/LoteTest.php`):** Evalúa que la entidad `Lote` reconozca autónomamente su caducidad mediante el método `estaVencido()`, interceptando fechas pasadas usando la clase Carbon.
-Pruebas Unitarias de Servicio (`tests/Unit/LoteServiceTest.php`):** Evalúa la lógica de autorización de ventas. Se inyectan lotes simulados en memoria para verificar 4 escenarios críticos: venta con stock suficiente, rechazo por stock insuficiente (Valor límite superior), rechazo por caducidad, y aprobación de lote vigente.

4. Resultados, Análisis y Conclusiones
-Resultados:La suite de pruebas de PHPUnit fue ejecutada con un 100% de éxito (Pass) en todas las aserciones, confirmando que la lógica condicional bloquea efectivamente las transacciones riesgosas.
Análisis: Las pruebas unitarias demostraron que la regla de negocio es sólida de forma aislada. Sin embargo, no validan el comportamiento frente a peticiones simultáneas.
-Conclusión y Mejoras: La estrategia basada en riesgos cumplió su objetivo temprano al detectar errores de conexión de base de datos en entornos de prueba, forzando la reestructuración de pruebas de Modelo hacia el namespace Feature. En la próxima iteración, se deberán implementar pruebas de integración HTTP (`tests/Feature/LoteControllerTest.php`) para evaluar la concurrencia y los bloqueos transaccionales en la base de datos de prueba.