<?php 

//echo "get_documentosCompartidos_todas.php";

// Incluye tu conexión existente
include './conexion.php';

try {
    // Consulta SQL para obtener todos los documentos compartidos
    $stmt = $pdo->query('SELECT idAlumno, reglamentoInterno, textoEscolarGratis, reglamentoEvaluacion FROM documentosCompartidos');
    
    // Obtener todos los documentos como un array
    $documentos = $stmt->fetchAll();

    // Establecer el tipo de contenido como JSON
    header('Content-Type: application/json');

    // Si hay registros, devolverlos, de lo contrario enviar un mensaje
    if ($documentos) {
        echo json_encode(['success' => true, 'documentos' => $documentos]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se encontraron documentos compartidos']);
    }
    
} catch (\PDOException $e) {
    // Si hay un error, devolver un mensaje de error en formato JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Error al conectar o consultar la base de datos: ' . $e->getMessage()]);
    exit;
}



?>