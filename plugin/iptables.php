<?php

# Collectd Iptables plugin

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';

# LAYOUT
# iptables-XXXX/
# iptables-XXXX/ipt_bytes-XXXX.rrd
# iptables-XXXX/ipt_packets-XXXX.rrd

$obj = new Type_Default($CONFIG);
$obj->data_sources = array('value');
$obj->width = $width;
$obj->heigth = $heigth;
$obj->rrd_format = '%5.1lf%s';

switch($obj->args['type']) {
	case 'ipt_bytes':
		$obj->rrd_title = sprintf('Traffic (%s)', $obj->args['pinstance']);
		$obj->rrd_vertical = 'Bytes per second';
	break;
	case 'ipt_packets':
		$obj->rrd_title = sprintf('Packets (%s)', $obj->args['pinstance']);
		$obj->rrd_vertical = 'Packets per second';
	break;
}

collectd_flush($obj->identifiers);
$obj->rrd_graph();
