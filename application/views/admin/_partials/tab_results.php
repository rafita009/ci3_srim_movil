<?php if (!empty($resultados)): ?>
    <?php $contador = 1; ?>
    <?php foreach ($resultados as $proceso): ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $proceso->ID_PROCESO; ?></td>
            <td><?php echo $proceso->N_INFRACTOR; ?></td>
            <td><?php echo $proceso->A_INFRACTOR; ?></td>
            <td><?php echo $proceso->C_INFRACTOR; ?></td>
            <td><?php echo $proceso->PLACA; ?></td>
            <td><?php echo $proceso->CAUSA; ?></td>
            <td>
                <div class="d-flex align-items-center">
                <span class="me-2">
            Proceso #<?php echo $proceso->ID_PROCESO; ?> - 
            <?php echo $proceso->RESOLUCION; ?> --
        </span>
                    <a href="<?php echo site_url('SearchController/detalle/' . $proceso->ID_PROCESO); ?>" 
                       class="btn btn-info btn-sm">
                        <i class="bx bx-show"></i> Ver Proceso
                    </a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8" class="text-center">No se encontraron resultados</td>
    </tr>
<?php endif; ?>