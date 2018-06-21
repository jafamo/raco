<?php return array (
  'enabled' => true,
  'createLogFiles' => true,
  'accessLogFileParseRegex' => '/^(?P<ip>\\S+) \\S+ \\S+ \\[(?P<date>.*?)\\] "\\S+ (?P<url>\\S+).*?" (?P<returnCode>\\S+) \\S+ ".*?" "(?P<userAgent>.*?)"/',
  'optionalColumns' => 
  array (
    0 => 'city',
    1 => 'region',
  ),
  'chartType' => 'bar',
  'datasetMaxCount' => '4',
); ?>