<?php

# Collectd snmp plugin

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';

#switch(GET('t')) {
#	case 'if_octets':
#		$obj->data_sources = array('rx', 'tx');
#		$obj->ds_names = array(
#			'rx' => 'Receive',
#			'tx' => 'Transmit',
#		);
#		$obj->colors = array(
#			'rx' => '0000ff',
#			'tx' => '00b000',
#		);
#		$obj->rrd_title = sprintf('Interface Traffic (%s)', $obj->args['tinstance']);
#		$obj->rrd_vertical = sprintf('%s per second', ucfirst($CONFIG['network_datasize']));
#		$obj->scale = $CONFIG['network_datasize'] == 'bits' ? 8 : 1;
#	break;
#	default:
#		$obj = new Type_Default($CONFIG);
#		$obj->rrd_title = sprintf('SNMP: %s (%s)', $obj->args['type'], $obj->args['tinstance']);
#	return;
#}
#
#$obj->rrd_format = '%5.1lf%s';
#$obj->width = $width;
#$obj->heigth = $heigth;

## LAYOUT
# snmp/type-XXXX.rrd

$obj = new Type_Default($CONFIG);
$obj->data_sources = array('value');
$obj->width = $width;
$obj->heigth = $heigth;
$obj->rrd_title =  sprintf('snmp: %s', $obj->args['type']);
$obj->rrd_format = '%5.1lf%s';

switch ($obj->args['type']) {
	case 'response_time':
		$obj->data_sources = array('value');
		$obj->ds_names = array(
			'cacheHttpAllSvcTime' => 'HTTP all service time',
			'cacheHttpMissSvcTime' => 'HTTP miss service time',
			'cacheHttpNmSvcTime' => 'HTTP hit not-modified service time',
			'cacheHttpHitSvcTime' => 'HTTP hit service time',
			'cacheHttpNhSvcTime' => 'HTTP refresh hit service time',
		);
		$obj->rrd_vertical = 'milliseconds';
		$obj->rrd_title = 'Squid Service Times';
		break;
	case 'gauge':
		$obj->data_sources = array('value');
		$obj->ds_names = array(
			'cacheCurrentFileDescrCnt' => 'Number of file descriptors in use',
		);
#		$obj->rrd_vertical = '';
		$obj->rrd_title = 'Squid File Desriptors';
		break;
	case 'cache_ratio':
		$obj->data_sources = array('value');
		$obj->ds_names = array(
			'cacheRequestHitRatio' => 'Request Hit Ratios',
			'cacheRequestByteRatio' => 'Byte Hit Ratios',
		);
		$obj->rrd_vertical = '%';
		$obj->rrd_title = 'Squid Hit Ratio';
		break;
	case 'counter':
		$obj->data_sources = array('value');
		$obj->ds_names = array(
			'cacheProtoClientHttpRequests' => 'Number of HTTP requests received',
			'cacheHttpHits' => 'Number of HTTP Hits',
			'cacheHttpErrors' => 'Number of HTTP Errors',
		);
#		$obj->rrd_vertical = '';
		$obj->rrd_title = 'Squid HTTP Requests';
		break;
}

collectd_flush($obj->identifiers);
$obj->rrd_graph();

