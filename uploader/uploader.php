<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <title>Uploader</title>
    <link rel="stylesheet" href="global.css">
    <link href="../MICKE/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    <link href="../MICKE/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../MICKE/bootstrap-3.3.6-dist/css/signin.css" rel="stylesheet" type="text/css"/>
    <script src="upload.js"></script>
</head>
<body>
    <div class="container">
        <div class="well">
  <form action="upload.php" method="post" enctype="multipart/form-data" id="upload" class="form-group upload">
    <fieldset>
      <legend class="form-signin-heading lead">Upload files</legend>
        <input type="file" id="file" name="file[]" required multiple>
        <input type="submit" id="submit" name="submit" class="btn btn-default btn-info" value="Upload">
    </fieldset>
      <div class="bar">
      <span class="bar-fill" id="pb">
         <span class="bar-fill-text" id="pt">
          </span>
        </span>
      </div>
      <div id="uploads" class="uploads">
      Uploaded files will appear here:
      </div>
      
      <script>
      document.getElementById('submit').addEventListener('click',function(e){
          e.preventDefault();
          var f = document.getElementById('file'),
              pb = document.getElementById('pb'),
              pt = document.getElementById('pt');
          app.uploader({
              files: f,
              progressBar:pb,
              progressText:pt,
              processor: 'upload.php',
              finished: function(data) {
                  var uploads = document.getElementById('uploads'),
                      succeeded = document.createElement('div'),
                      failed = document.createElement('div'),
                      anchor,
                      span, 
                      x;
                  if(data.failed.length){
                      failed.innerHTML = '<p>Unfortunately, The following failed: </p>';
                      
                  }
                  uploads.innerText = '';
                  for(x=0; x < data.succeeded.length; x= x+1){
                      anchor = document.createElement('a');
                      anchor.href = 'uploads/'+ data.succeeded[x].file;
                      anchor.innerText = data.succeeded[x].name;
                      anchor.target='_blank';
                      console.log(anchor);
                    succeeded.appendChild(anchor);  
                  }
                 for(x=0; x < data.failed.length; x=x+1){
                      span = document.createElement('span');
                      span.innerText = data.failed[x].name;
                    failed.appendChild(span); 
              }
            uploads.appendChild(succeeded);
            uploads.appendChild(failed); 
          },
              error:function(){
                  console.log('Not working');
              }
          }
          
          );
      });
          
      </script>
  </form>
        </div>
        </div>
</body>
</html>