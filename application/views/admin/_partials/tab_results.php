<?php if (!empty($resultados)): ?>
    <?php foreach ($resultados as $proceso): ?>
    <tr>
        <td><?php echo $proceso->ID_PROCESO; ?></td>
        <td><?php echo $proceso->N_INFRACTOR; ?></td>
        <td><?php echo $proceso->A_INFRACTOR; ?></td>
        <td><?php echo $proceso->C_INFRACTOR; ?></td>
        <td><?php echo $proceso->PLACA; ?></td>
        <td><?php echo $proceso->CAUSA; ?></td>
        <td class="text-center">
            <a href="<?php echo site_url('SearchController/detalle/' . $proceso->ID_INFRACTOR); ?>" class="btn btn-info btn-sm">
                <i class="bx bx-show"></i> Ver Detalle
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="7" class="text-center">No se encontraron resultados</td>
    </tr>
<?php endif; ?>