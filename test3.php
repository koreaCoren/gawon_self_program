<!-- $.ajax() 함수 사용을 위한 JQuery CDN 선언 -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
<script>
  function file_frm_submit(frm) {
    var fileCheck = frm.upload_file.value;		// 파일첨부체크
    if(!fileCheck) {					// 파일첨부가 없는 경우
      alert("업로드할 파일을 선택하세요.");		// --대화상자
      return false;					// --함수종료
    }
    var formData = new FormData(frm);			// 파일전송을 위한 폼데이터 객체 생성
    $.ajax({						// ajax
      url		: 'ajaxFileUpload.php',
      type		: 'POST',
      dataType	: 'html',
      enctype		: 'multipart/form-data',
      processData	: false,
      contentType	: false,
      data		: formData,
      async		: false,				// 비동기 방식을 비활성화, 일반적으로는 비권장 사항이다.
      success		: function(response) {
        if(response == "failed") {				// 파일업로드가 실패하면 서버에서 failed를 찍음
          alert("파일 업로드에 문제가 발생하였습니다."); 
          return false;						// --함수종료
        } else {						// 파일업로드가 성공한 경유
          alert("파일 업로드가 완료되었습니다.");		
          return true;
        }
      }
    });
  }
</script>

<form id="file_frm">
	<input type="file" name="upload_file" id="upload_file">
	<button type="button" name="upload_btn" onClick="file_frm_submit(this.form)">ajax 업로드<button>
</form>

<? 
if($_FILES['upload_file']['size'] > 0) { // 업로드 파일 사이즈를 체크하여, 업로드 파일여부를 확인

	$upfile_path	= "업로드 할 파일 경로 설정";
    // 파일명에 한글이 존재하는 경우 서버에서 파일명이 깨질 수 있기 때문에 서버가 인식할 수 있는 파일명으로 변환해줘야 한다.
	$file_name	= "파일이름설정.".pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION); // "파일이름설정."+파일 확장자
	$file_upload	= copy($_FILES['upload_file']['tmp_name'], $upfile_path."/".$file_name);

	if($file_upload == false)	echo "failed";

}

echo "failed";
?>