

  
      <link href="./assets/js/ajax-file-upload/uploadify.css" type="text/css" rel="stylesheet" />
  
      <script type="text/javascript" src="./assets/js/ajax-file-upload/jquery-1.4.2.min.js"></script>
  
      <script type="text/javascript" src="./assets/js/ajax-file-upload/swfobject.js"></script>
   
      <script type="text/javascript" src="./assets/js/ajax-file-upload/jquery.uploadify.v2.1.4.min.js"></script>
 
      <script type="text/javascript">
 
      $(document).ready(function() {
   
        $('#file_upload').uploadify({
 
          'uploader'  : './assets/js/ajax-file-upload/uploadify.swf',
  
          'script'    : './assets/js/ajax-file-upload/uploadify.php',
  
          'cancelImg' : './assets/js/ajax-file-upload/cancel.png',
 
          'folder'    : 'uploads',
  
      'multi'       : true
 
        });
 
      });
  
      </script>

    
      <input type="file" id="file_upload" name="file_upload" />
   
      <a href="javascript:$('#file_upload').uploadifyUpload();" style="font-size:11px;font-family: arial, verdana, sans-serif;">Upload Files</a>
     
   

