# StuStaNet configuration

# collectd version
$CONFIG['version'] = 5;

# category of hosts to show on main page
$CONFIG['cat']['core servers'] = array(
		'ir.stusta.mhn.de',
		'esel.stusta.mhn.de',
		'natter.stusta.mhn.de',
		'viper.stusta.mhn.de',
		'ruessel.stusta.mhn.de',
	);

$CONFIG['cat']['hardware servers'] = array(
		'appaloosa.stusta.mhn.de',
		'mailhub.stusta.mhn.de',
		'mammut.stusta.mhn.de',
		'mustang.stusta.mhn.de',
		'tapir.stusta.mhn.de',
		'temperator.stusta.mhn.de',
		'thaddeus.stusta.mhn.de',
	);

$CONFIG['cat']['vm:gazelle'] = array(
		'gazelle.stusta.mhn.de',
		'hermes.stusta.mhn.de',
		'hugin.stusta.mhn.de',
		'janus.stusta.mhn.de',
		'maus.stusta.mhn.de',
		'wedge.stusta.mhn.de',
	);

$CONFIG['cat']['vm:deepthought'] = array(
		'deepthought.stusta.mhn.de',
		'consensus.stusta.mhn.de',
		'blackhole.stusta.mhn.de',
		'fourier.stusta.mhn.de',
		'fyodor.stusta.mhn.de',
		'glados.stusta.mhn.de',
		'lambda.stusta.mhn.de',
		'larry.stusta.mhn.de',
		'mirror.stusta.mhn.de',
		'notch.stusta.mhn.de',
		'scruffy.stusta.mhn.de',
		'thingol.stusta.mhn.de',
        );

# default plugins to show on host page
#$CONFIG['overview'] = array('load', 'cpu', 'memory', 'swap');
#$CONFIG['overview'] = array('load', 'cpu', 'memory', 'swap', 'processes', 'interface','conntrack', 'df', 'irq' );
#$CONFIG['overview'] = array('cpu', 'interface','conntrack', 'iptables', 'tcpconns', 'netlink', 'df', 'ping','tail',);
$CONFIG['overview'] = array('cpu', 'ping','tail',);

# browser cache time for the graphs (in seconds)
$CONFIG['cache'] = 150;

