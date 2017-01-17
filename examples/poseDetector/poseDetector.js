Myo.connect('com.myojs.poseDetector');

Myo.on('status', function(data){
	$('.events').prepend(JSON.stringify(data, null, 2));
})

var i = 1;

//Myo.om에서 포즈를 받음
Myo.on('pose', function(pose){

	 	//비디오 개수
  	var videoNum = arrLength;

		$('img.' + pose).attr('src', 'img/' + pose + '_active.png');
		$('.mainPose img').attr('src', 'img/' + pose + '_active.png');

		//손가락을 쫙 펴면 동영상 재생
		if(pose == 'fingers_spread')
		{
			document.getElementById("test").play();
		}
		//주먹을 쥐면 동영상 일시정지
		if(pose == 'fist') {
		   document.getElementById("test").pause();
	  }
	  //wave_in 동작시 이전 비디오 재생
		if(pose == 'wave_in')
		{
			++i;
			//마지막 비디오의 다음으로 처음 비디오가 선택됨
			if ( i == (videoNum + 1) ) i = 1 ;
			//비디오 파일 이름
			var src = "videos\\video" + i +".mp4";

			$("#movie").attr("src", src);

			$("#test").load()
			document.getElementById("test").play();
		}
		//wave_out 동작시 다음 비디오 재생
		if(pose == 'wave_out')
		{
			--i;
			//처음 비디오의 이전으로 마지막 비디오가 선택됨
			if ( i == 0 ) i = videoNum ;
			//비디오 파일 이름
			var src = "videos\\video" + i +".mp4";

			$("#movie").attr("src", src);

			if($("#test").load())
			document.getElementById("test").play();
		}
})

//Opposite of above. We also revert the main img to the unlocked state
Myo.on('pose_off', function(pose){
	$('img.' + pose).attr('src', 'img/' + pose + '.png');
	$('.mainPose img').attr('src', 'img/unlocked.png');
});


//Whenever a myo locks we'll switch the main image to a lock image
Myo.on('locked', function(){
	$('.mainPose img').attr('src', 'img/locked.png');
});

//Whenever a myo unlocks we'll switch the main image to a unlock image
Myo.on('unlocked', function(){
	$('.mainPose img').attr('src', 'img/unlocked.png');
});
