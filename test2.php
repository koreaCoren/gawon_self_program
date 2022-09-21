<?php
?>

<html>
  <head>
    <title>Parcel Sandbox</title>
    <meta charset="UTF-8" />
  </head>

  <body>
    <input type="file" id="fileUpload" accept='image/*' />
    <img id="previewImg" width="700" alt="이미지 영역" />



    <script>
    const fileInput = document.getElementById("fileUpload");

    const handleFiles = (e) => {
      const selectedFile = [...fileInput.files];
      const fileReader = new FileReader();

      fileReader.readAsDataURL(selectedFile[0]);

      fileReader.onload = function () {
        document.getElementById("previewImg").src = fileReader.result;
      };
    };

    fileInput.addEventListener("change", handleFiles);

    const upload = () => {
        let formData = new FormData();
        formData.append('files', selectedFile[0]);
      }
</script>
  </body>
</html>
