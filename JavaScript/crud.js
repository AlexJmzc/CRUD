//INSERTAR DATOS
fetch('http://localhost/persona', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    ID: 2,
    CEDULA: '1804372432',
    NOMBRE: 'JUAN',
    APELLIDO: 'CASTRO'
  })
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error(error))


//ACTUALIZAR DATOS
fetch('http://localhost/example_table/2', {
  method: 'PUT',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    NOMBRE: 'CARLOS'
  })
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error(error))


//ELIMINAR DATOS
fetch('http://localhost/persona/2', {
  method: 'DELETE'
})


//LEER DATOS
fetch('http://localhost/persona')
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error(error))
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error(error))