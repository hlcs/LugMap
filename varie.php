<?php

# l'array utilizza come chiave la richiesta in input
# (utilizzata anche per identificare il file da leggere)
# e come valore la stringa da visualizzare
$elenco_regioni = array (
  "abruzzo"    => "Abruzzo",
  "basilicata" => "Basilicata",
  "calabria"   => "Calabria",
  "campania"   => "Campania",
  "emilia"     => "Emilia Romagna",
  "friuli"     => "Friuli Venezia Giulia",
  "lazio"      => "Lazio",
  "liguria"    => "Liguria",
  "lombardia"  => "Lombardia",
  "marche"     => "Marche",
  "molise"     => "Molise",
  "piemonte"   => "Piemonte",
  "puglia"     => "Puglia",
  "sardegna"   => "Sardegna",
  "sicilia"    => "Sicilia",
  "toscana"    => "Toscana",
  "trentino"   => "Trentino Alto Adige",
  "umbria"     => "Umbria",
  "valle"      => "Valle d'Aosta",
  "veneto"     => "Veneto",
  "Italia"     => "Italia"
);

/***************************************************************************************************************/

function lugheader ($title, $extracss = null, $extrajs = null) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="italian" />

  <link href="/assets/css/main.css" rel="stylesheet" type="text/css" />

  <?php
    if ($extracss != null)
      foreach ($extracss as $e) {
        ?>
        <link href="<?php echo $e; ?>" rel="stylesheet" type="text/css" />
        <?php
      }

    if ($extrajs != null)
      foreach ($extrajs as $e) {
        ?>
        <script type="text/javascript" src="<?php echo $e; ?>"></script>
        <?php
      }
  ?>

  <title><?php echo $title; ?></title>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-190627-10']);
    _gaq.push(['_setDomainName', '.lugmap.it']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<body>

<div id="header">
  <h2 id="title"><?php echo $title; ?></h2>
</div>

<?php
}

/***************************************************************************************************************/

function do_head ($title = null, $javascript = array ()) {
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Mappa dei Linux Users Groups Italiani<?php if ($title != null) echo ": $title"; ?></title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<?php foreach ($javascript as $js): ?>
		<script type="text/javascript" src="<?php echo $js; ?>"></script>
		<?php endforeach; ?>

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body>
		<?php

		/*
			I titoli delle pagine sono un tantino piu' SEO delle
			voci di menu che le rappresentano, mi tocca fare una
			conversione un po' articolata...
		*/
		switch ($title) {
			case 'Homepage':
				$select = 0;
				break;

			case 'LUG divisi per Regione':
				$select = 1;
				break;

			case 'Lista completa dei LUG':
				$select = 2;
				break;

			case 'Partecipa alla LugMap':
				$select = 3;
				break;

			case 'Progetti Collaterali':
				$select = 4;
				break;

			case 'La LugMap sul tuo Sito':
				$select = 5;
				break;

			default:
				$select = 0;
				break;
		}

		if (strncmp ($title, 'Tutti i LUG', strlen ('Tutti i LUG')) == 0) {
			$select = 6;

			/*
				http://www.webmasterworld.com/php/3683825.htm
			*/
			$pattern = '/[^ ]*$/';
			preg_match ($pattern, $title, $results);
			$menu = $results [0];
		}

		?>

		<ul class="verticalslider_tabs">
			<li><a<?php if ($select == 0) echo ' class="select"' ?> href="index.php">Mappa</a></li>

			<li>
				<a<?php if ($select == 1) echo ' class="select"' ?> href="regioni.php">Lista delle Regioni</a>

				<?php if ($select == 6): ?>
				<ul class="verticalslider_subtabs">
					<li><a class="select" href="widget.php"><?php echo $menu ?></a>
				</ul>
				<?php endif; ?>
			</li>

			<li><a<?php if ($select == 2) echo ' class="select"' ?> href="lista.php">Lista Completa</a></li>
			<li><a<?php if ($select == 3) echo ' class="select"' ?> href="partecipa.php">Partecipa</a></li>

			<li>
				<a<?php if ($select == 4) echo ' class="select"' ?> href="forge.php">Progetti Collaterali</a>

				<?php if ($select == 5): ?>
				<ul class="verticalslider_subtabs">
					<li><a class="select" href="widget.php">Widget Web</a>
				</ul>
				<?php endif; ?>
			</li>

			<li>
				<p class="intro">
					<img src="images/logo.png" alt="lugmap.it" />
				</p>
			</li>
		</ul>

		<div class="verticalslider_contents">

	<?php
}

/***************************************************************************************************************/

function do_foot () {
?>

		</div>

		<p style="clear: both;"></p>
	</body>
</html>

<?php
}

?>
