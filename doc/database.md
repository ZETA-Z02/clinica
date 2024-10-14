# BASE DE DATOS DE CLINICA DENTAL
## ENTIDADES
### Doctores
- id 
- nombre
- apellido
- dni
- sexo
- telefono
- email
- foto
- feNac
- feCreacion

### Login
- idlogin
- id
- usuario
- password
- nivel
- estado

### Clientes
- idcliente
- nombre
- apellido
- dni
- telefono
- direccion
- feNacimiento

### ClientesDetalles
- idclientedetalle
- idcliente
- enfermedad -> no - que enfermedad?
- medicamento -> si - no
- complicacionAnestesia -> si - no
- alergias -> si - no
- hemorragias -> si - no

### Citas
- idcita
- idcliente
- fecha
- hora

### Pagos
- idpago
- idcliente
- tratamiento

### Pagos detalles
- idpagodetalle
- idcliente
- fecha
- monto
- importe
- deuda
- tratamiento
- pieza
- conformidad -> si - no

### Tratamiento
- idtratamiento
- fecha 
- pieza
- tratamiento
- observacion
- id
### Tratamiento tipo
- 