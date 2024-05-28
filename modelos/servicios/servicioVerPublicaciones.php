<!-- SERVICIO PARA LA LECTURA DE OFERTAS DE LA BBDD -->
<?php if(isset($publicacion)): ?>
    <div class="mbot">
        <label class="etiqueta">Título: </label>
        <span class="contenido-corto"><?php echo $publicacion->titulo; ?></span>

        <label class="etiqueta">Fecha: </label>
        <span class="align-right"><?php echo $publicacion->fecha->format("d/M/y H:m:s"); ?></span>

        <label class="etiqueta">Publicacion: </label>
        <span class="contenido-corto"><?php echo $publicacion->descripcion; ?></span>

        </div>
    </div>
<?php endif; ?>