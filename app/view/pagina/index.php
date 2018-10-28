<p>HOLA DESDE LA VISTA</p>
<h1><?php echo $data['titulo'] ?></h1>
<P>DIRECTORIO: <?php echo RUTA_APP ?></P>
<P>URL: <?php echo URL_BASE ?></P>
<P>NOMBRE: <?php echo SITE_NAME ?></P>

<ul>
    <?php foreach($data['articulos'] as $articulo): ?>
    <li><?php echo $articulo->titulo; ?></li>
    <?php endforeach ?>
</ul>