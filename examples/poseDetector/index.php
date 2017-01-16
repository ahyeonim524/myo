<!DOCTYPE html>
<html>
<head>

	<?php
		$dir = getcwd();
		$dir = $dir.'/videos';
		$cnt = 0;
		//디렉터리 열기
		$dir_handle=opendir($dir);
		//디렉토리의 파일을 읽어 들임
		echo "[video list] : ";
		while(($file=readdir($dir_handle)) !== false) {
			$fname = $file;
			//.과 ..을 제외하고 파일명 출력
			if($fname == "." || $fname == "..") { continue; }
			//echo $fname." ";
			$fileArr[$cnt]=$fname." , ";
			echo $fileArr[$cnt];
			$cnt++;
		}
		closedir($dir_handle); // 마지막으로 디렉토리를 닫기
	?>

	<script>
	var arr = <?php echo json_encode($fileArr); ?>;
	var arrLength=arr.length;
	//document.write(arr);
	console.log(arr); // ["my","friend"]
	document.write("[number of videos] : ");
	document.write(arrLength+"\n");

	</script>


	<title> First </title>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src='../../myo.js'></script>
	<script src='poseDetector.js'></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script type="text/javascript">
	function videoplay(str) {

			$("#movie").attr("src", $(str).attr("value"));

			$("#test").load();

			document.getElementById("test").play();
		};

	$(document ).ready(function() {

    	$("#play").click(function(){
    		document.getElementById("test").play();
    	});

		$("#stop").click(function(){
    		document.getElementById("test").pause();
    	});

	});
	</script>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

		<div class='mainPose'>
			<img src='img/locked.png' />
		</div>

		<div class='poseContainer'>
			<img class='pose fist' src='img/fist.png' />
			<img class='pose fingers_spread' src='img/fingers_spread.png' />
			<img class='pose wave_in' src='img/wave_in.png' />
			<img class='pose wave_out' src='img/wave_out.png' />
			<img class='pose double_tap' src='img/double_tap.png' />
		</div>

	<video width="700" id="test" controls>
		<source id="movie" type="video/mp4" src="videos/video1.mp4" />
	</video>
	<br />
	<a onClick="videoplay(this)" href="#" value="videos/video1.mp4">button1</a>
	<a onClick="videoplay(this)" href="#" value="videos/video2.mp4">button2</a> <br />

	<input type="button" id="play" value="Play" />
	<input type="button" id="stop" value="Pause" />

</body>
</html>
