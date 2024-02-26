const express = require('express');
const path = require('path');  // Añade esta línea
const app = express();

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'vistas', 'plantilla.html'));
});

const PORT = process.env.PORT || 3001;
app.listen(PORT, () => {
  console.log(`Servidor escuchando en el puerto ${PORT}`);
});
