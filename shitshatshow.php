<?php
use Google\Cloud\BigQuery\BigQueryClient;

/** Uncomment and populate these variables in your code */
// $projectId = 'The Google project ID';
// $datasetId = 'The BigQuery dataset ID';

$bigQuery = new BigQueryClient([
    'projectId' => $projectId,
]);
$dataset = $bigQuery->createDataset($datasetId);
printf('Created dataset %s' . PHP_EOL, $datasetId);

      ?>
  