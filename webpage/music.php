<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
			     <?php 
			     $playlist = isset($_GET["playlist"]) ? $_GET["playlist"] : null;
                 $songfolder = "songs";
                 $songlist = $playlist != null ? file("songs/" . $playlist) : scandir($songfolder);
              
                                 foreach ($songlist as $songname){ 
                                 	
                                    <li class="mp3item">
                                    <a href="songs/<?=$songname?>"><?=$songname?></a><?
                                    </li>
                                    
                                 } 
				
				foreach (glob("songs/*.mp3") as $songname) {
					<li class="mp3item">
					<a href="<?=$songname?>"><?=basename($songname)</a>
					
                                        $songsize= filesize($songname);
                                        $comm=$songsize." b";
                                       if ($songsize >= 0 && $songsize <= 1023) $comm = $songsize . " b";
                                       else if ($songsize >= 1024 && $songsize <= 1048575) $comm = $songsize . " kb";
                                       else if ($songsize >= 1048576) $comm = $songsize . " mb";
                                        
                                        
				</li>
                                 } 
				foreach ($songlist as $songname) {
                if (preg_match('/txt$/m', $songname)) {
                    ?>
                    <li class="playlistitem">
                        <a href="?playlist=<?= $filename ?>">
                            <?= $songname ?></a>
                    </li>
				?>
			</ul>
		</div>
	</body>
</html>