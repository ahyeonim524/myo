<html>
<head>
</head>
<body>
  <?php
    $dir = getcwd();
    $dir = $dir."/videos";
    $cnt = 0;
    //디렉터리 열기
    $dir_handle=opendir($dir);
    //디렉토리의 파일을 읽어 들임
    while(($file=readdir($dir_handle)) !== false) {
      $fname = $file;
      //.과 ..을 제외하고 파일명 출력
      if($fname == "." || $fname == "..") { continue; }
      //echo $fname." ";
      $fileArr[$cnt]=$fname."";
      echo $fileArr[$cnt];
      $cnt++;
    }
    closedir($dir_handle); // 마지막으로 디렉토리를 닫기
  ?>

</body>
</html>
