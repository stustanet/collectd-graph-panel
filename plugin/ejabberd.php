<?php

# Collectd ejabberd plugin
# Author: Roman Thiele <roman.thiele@stustanet.de>

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';

## LAYOUT
# ejabberd/
# ejabberd/gauge-connected_users.rrd
# ejabberd/gauge-s2s_in.rrd
# ejabberd/gauge-s2s_out.rrd

$obj = new Type_Default($CONFIG);
$obj->width = $width;
$obj->heigth = $heigth;
# error_log("obj: " . var_export($obj, true));
# error_log("args: " . var_export($obj->args, true));
$obj->data_sources = array('value');
$obj->ds_names = array(
	'value' => 'Connected users',
	'value' => 'Incomming S2S',
	'value' => 'Outgoing S2S'
);
$obj->rrd_title = sprintf('ejabberd (%s)', $obj->args['host']);
$obj->rrd_vertical = 'connections';
$obj->rrd_format = '%5.1lf%s';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
