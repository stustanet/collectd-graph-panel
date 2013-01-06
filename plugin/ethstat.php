<?php

# Collectd ethstat plugin

require_once 'conf/common.inc.php';
require_once 'type/GenericStacked.class.php';
require_once 'inc/collectd.inc.php';


$obj = new Type_Default($CONFIG);
$obj->width = $width;
$obj->heigth = $heigth;

$obj->rrd_title = sprintf('%s/%s/%s', $obj->args['pinstance'], $obj->args['type'], $obj->args['tinstance']);
$obj->rrd_format = '%5.1lf%s';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
