<?php
    // Conexión a la base de datos
    include("conexion_db.php");

    if (!$conn) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    // Realiza la consulta SQL para obtener los datos de la tabla
    $query = "SELECT view, name, hashtag, created_at FROM my_table";
    $result = mysqli_query($conn, $query);

    // Nombre del archivo CSV
    $csvFileName = 'datos.csv';

    // Abre el archivo CSV para escritura
    $csvFile = fopen($csvFileName, 'w');

    // Escribe una fila en blanco antes de los encabezados
    fputcsv($csvFile, ["", "", "", ""], ',');

    // Encabezados del archivo CSV
    $csvHeader = ["Categoria", "Nombre", "Hashtags", "Fecha"];
    fputcsv($csvFile, $csvHeader, ',');

    // Escribe una fila en blanco después de los encabezados
    fputcsv($csvFile, ["", "", "", ""], ',');

    // Escribe los datos en el archivo CSV
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Ordena los datos por columna 'view'
    usort($data, function($a, $b) {
        // Convierte los valores a números antes de comparar
        return intval($a['view']) - intval($b['view']);
    });

    foreach ($data as $row) {
        fputcsv($csvFile, $row, ',');
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);

    // Cierra el archivo CSV
    fclose($csvFile);

    // Descargar el archivo CSV
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
    header('Cache-Control: max-age=0');

    readfile($csvFileName);

    // Elimina el archivo CSV del servidor (opcional)
    unlink($csvFileName);

    exit();
?>
