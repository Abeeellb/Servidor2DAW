<?php
    $file = fopen("agenda_json.csv", 'r');
    $header = fgetcsv($file); 
    $data = array(); 
    while (($row = fgetcsv($file))) {
        $data[] = array_combine($header, $row);
    }
    fclose($file);

    $json = json_encode($data, JSON_PRETTY_PRINT);
    $output_file = 'data.json';
    file_put_contents($output_file, $json);
    header('Content-Type: application/json');
    echo $json;
?>