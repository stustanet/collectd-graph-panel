<?php

# Collectd Md plugin

require_once 'conf/common.inc.php';
require_once 'type/GenericStacked.class.php';
require_once 'inc/collectd.inc.php';

# LAYOUT
#
# md-X/md_disks-active.rrd
# md-X/md_disks-failed.rrd
# md-X/md_disks-missing.rrd
# md-X/md_disks-spare.rrd

$obj = new Type_GenericStacked($CONFIG);
$obj->data_sources = array('value');
$obj->order = array('active', 'failed', 'missing', 'spare');
$obj->ds_names = array(
	'active' => 'Active',
	'failed' => 'Failed',
	'missing' => 'Missing',
	'spare' => 'Spare',
);
$obj->colors = array(
	'active' => '00ff00',
	'failed' => 'ff0000',
	'missing' => 'aaaaaa',
	'spare' => 'ffff00',
);
$obj->width = $width;
$obj->heigth = $heigth;

$obj->rrd_title = sprintf('md status (md%s)', $obj->args['pinstance']);
$obj->rrd_vertical = 'Devices';
$obj->rrd_format = '%.0lf';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
