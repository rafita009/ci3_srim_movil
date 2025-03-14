<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos del Proceso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f5f5f5;
        }
        .document-section {
            margin-bottom: 30px;
        }
        .document-title {
            background-color: #4e73df;
            color: white;
            padding: 10px 15px;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
        }
        .document-name {
            padding: 10px 15px;
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 500;
        }
        .pdf-page {
            border: 1px solid #ddd;
            margin-bottom: 15px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .pdf-page .page-number {
            background-color: #f8f9fc;
            padding: 5px 10px;
            font-size: 12px;
            color: #6c757d;
            border-bottom: 1px solid #e3e6f0;
        }
        .pdf-page img {
            width: 100%;
            display: block;
            margin: 0 auto;
        }
        .documento-detencion .document-title {
            background-color: #f6c23e;
        }
        .documento-libertad .document-title {
            background-color: #1cc88a;
        }
        .btn-print {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        @media print {
            .btn-print {
                display: none;
            }
            .pdf-page {
                page-break-inside: avoid;
                margin-bottom: 30px;
                border: none;
                box-shadow: none;
            }
            body {
                padding: 0;
                background-color: white;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <button onclick="window.print()" class="btn btn-primary btn-print">
            <i class="fas fa-print"></i> Imprimir Documentos
        </button>
        
        <h1 class="mb-4">Documentos del Proceso</h1>
        
        <?php if (empty($imagenes_documentos)): ?>
            <div class="alert alert-info">
                No hay documentos PDF disponibles para mostrar.
            </div>
        <?php else: ?>
            <?php foreach ($imagenes_documentos as $documento): ?>
                <div class="document-section documento-<?= $documento['tipo'] ?>">
                    <div class="document-title">
                        <?php if ($documento['tipo'] === 'libertad'): ?>
                            <i class="fas fa-file-contract"></i> Documento de Libertad
                        <?php else: ?>
                            <i class="fas fa-file-alt"></i> Documento de Detención
                        <?php endif; ?>
                    </div>
                    <div class="document-name">
                        <?= htmlspecialchars($documento['nombre']) ?>
                    </div>
                    
                    <?php foreach ($documento['imagenes'] as $index => $imagen_path): ?>
                        <div class="pdf-page">
                            <div class="page-number">Página <?= $index + 1 ?></div>
                            <img src="<?= base_url($imagen_path) ?>" alt="Página <?= $index + 1 ?> del documento <?= htmlspecialchars($documento['nombre']) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>