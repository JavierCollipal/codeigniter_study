<table ><tr>
        <th>ID Post</th>
        <th>Titulo Post</th>
        <th>Descripcion Post</th>
       <th>Contenido Post</th>
        <th>Fecha Post</th>
        <th>Botones</th>
        <tr>
        </tr>  
<?php
    foreach( $todos_los_posts as $fila) {
        echo '<tr>';
        echo '<td>'.$fila->ID_POST.'</td>';
        echo '<td>'.$fila->TITULO_POST.'</td>';
        echo '<td>'.$fila->DESCRIPCION_POST.'</td>';
        echo '<td>'.$fila->CONTENIDO_POST.'</td>';
        echo '<td>'.$fila->FECHA_POST.'</td>';
        echo '<td>';
        echo '<a href="'.site_url('CRUD/vista_modificar/'.$fila->ID_POST).'">Modificar</a>';
        echo '<a href="'.site_url('CRUD/eliminar/'.$fila->ID_POST).'">Eliminar</a>';
        echo '</td>';
       echo  '</tr>';
    }?>
    </table>