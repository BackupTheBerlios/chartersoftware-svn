<!-- File: /app/views/posts/index.ctp -->

<h1>Flugplatz <?php echo $flugplatz['Flugplatz']['name']?></h1>
So, hier kommt die Beschreibung von genau einem Stück Flugplatz

<p>ID = <?php echo $flugplatz['Flugplatz']['id']?></p>
<p>Name = <?php echo $flugplatz['Flugplatz']['name']?></p>
<p>Int. Abk = <?php echo $flugplatz['Flugplatz']['int_abk']?></p>


<!--
<p><small>Created: <?php echo $post['Post']['created']?></small></p>

<p><?php echo $post['Post']['body']?></p>

(default) 2 queries took 12 ms
Nr	Query	Error	Affected	Num. rows	Took (ms)
1	DESCRIBE `flugplatzs`		6	6	12
2	SELECT `Flugplatz`.`id`, `Flugplatz`.`name`, `Flugplatz`.`int_abk`, `Flugplatz`.`zeitzone`, `Flugplatz`.`diff_utc`, `Flugplatz`.`position` FROM `flugplatzs` AS `Flugplatz` WHERE `Flugplatz`.`id` = 'flugplatz' LIMIT 1

-->