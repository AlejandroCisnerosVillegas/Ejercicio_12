<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Gestión y Visualización de Imágenes</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="../../assets/img/logo.png">
    </head>
    <body>
        <div class="container">
            <h1 class="title">Subir Imágenes</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="vai_archivo" class="file-input">
                <br>
                <br>
                <input type="submit" name="submit" class="btn-submit" value="Guardar archivo">
            </form>

            <div class="image-list">
                <h2>Lista de imágenes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Imagen</th>
                            <th>KB</th>
                            <th>Nombre</th>
                            <th>Ancho x Altura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rutacompleta = "img/";
                        $fileimg = opendir($rutacompleta);
                        $numerofila = 0;
                        while ($nombre_imagen = readdir($fileimg)) {
                            if ($nombre_imagen != "." && $nombre_imagen != "..") {
                                $sizeimg = getimagesize($rutacompleta . $nombre_imagen);
                                $archivokb = round((filesize($rutacompleta . $nombre_imagen) / 1024), 1);
                                $numerofila++;
                        ?>
                                <tr>
                                    <td><?php echo $numerofila; ?></td>
                                    <td><img src="<?php echo $rutacompleta . $nombre_imagen; ?>" alt="Imagen"></td>
                                    <td><?php echo $archivokb; ?></td>
                                    <td><?php echo $nombre_imagen; ?></td>
                                    <td><?php echo $sizeimg[0] . " x " . $sizeimg[1]; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        closedir($fileimg);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>