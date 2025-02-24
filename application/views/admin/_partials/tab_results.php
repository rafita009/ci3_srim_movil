<?php if (!empty($resultados)): ?>
    <?php 
    // Agrupar procesos por infractor
    $infractores_procesos = [];
    foreach ($resultados as $proceso) {
        if (!isset($infractores_procesos[$proceso->ID_INFRACTOR])) {
            $infractores_procesos[$proceso->ID_INFRACTOR] = [];
        }
        // Solo agregar si no existe ya un proceso con el mismo ID
        $existe = false;
        foreach ($infractores_procesos[$proceso->ID_INFRACTOR] as $proc_existente) {
            if ($proc_existente->ID_PROCESO === $proceso->ID_PROCESO) {
                $existe = true;
                break;
            }
        }
        if (!$existe) {
            $infractores_procesos[$proceso->ID_INFRACTOR][] = $proceso;
        }
    }
    ?>

    <?php $contador = 1; ?>
    <?php foreach ($infractores_procesos as $procesos): ?>
        <?php $primer_proceso = reset($procesos); ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $primer_proceso->ID_PROCESO; ?></td>
            <td><?php echo $primer_proceso->N_INFRACTOR; ?></td>
            <td><?php echo $primer_proceso->A_INFRACTOR; ?></td>
            <td><?php echo $primer_proceso->C_INFRACTOR; ?></td>
            <td><?php echo $primer_proceso->PLACA; ?></td>
            <td><?php echo $primer_proceso->CAUSA; ?></td>
            <td>
                <?php foreach($procesos as $proceso): ?>
                    <div class="mb-2 d-flex align-items-center">
                        <span class="me-2">Proceso #<?php echo $proceso->ID_PROCESO; ?>----</span>
                        <a href="<?php echo site_url('SearchController/detalle/' . $proceso->ID_PROCESO); ?>" 
                           class="btn btn-info btn-sm">
                            <i class="bx bx-show"></i> Ver Proceso
                        </a>
                    </div>
                <?php endforeach; ?>
            </td>
            
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8" class="text-center">No se encontraron resultados</td>
    </tr>
<?php endif; ?>