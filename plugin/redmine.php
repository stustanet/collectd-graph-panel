<?php

# Collectd redmine plugin
# Author: Roman Thiele <roman.thiele@stustanet.de>

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';

## LAYOUT
# redmine/
# redmine/gauge-*.rrd

$obj = new Type_Default($CONFIG);
$obj->width = $width;
$obj->heigth = $heigth;
error_log("obj: " . var_export($obj, true));
$obj->data_sources = array('value');
$obj->ds_names = $obj->tinstances;
$obj->rrd_title = 'issues by status';
$obj->rrd_vertical = 'issues';
$obj->rrd_format = '%.0lf';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
