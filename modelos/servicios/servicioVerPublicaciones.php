<?php if(isset($publicaciones) && is_array($publicaciones)): ?>
    <?php foreach($publicaciones as $publicacion): ?>

    <div id="container">
        <div class="caja">
            <div id="cabeceraPublicacion">
                <div id="infoCabecera">
                    <div id="nUsuario"><?php echo $publicacion->userId; ?></div>
                    <div id="fechaPublicacion"><?php echo $publicacion->fecha->format('Y-m-d H:i:s'); ?></div>
                </div>
                <div id="separadorCabecera"></div>
            </div>
            <div id="publicacion">
                <div id="tituloPublicacion"><?php echo $publicacion->titulo; ?></div>
                <div id="textoPublicacion"><?php echo $publicacion->descripcion; ?></div>
            </div>
        </div>
        <div id="contenedorBotones">
            <button id="publicar">PUBLICAR</button>
            <button id="borrar">BORRAR</button>
        </div>  
    </div>

    <?php endforeach; ?>
<?php else: ?>
    <p>No hay publicaciones disponibles.</p>
<?php endif; ?>

