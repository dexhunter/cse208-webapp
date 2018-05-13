<!doctype html>    
  <head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
  </head>  
<body>  
    Dear {{ $name }}，  
    <br>  
    Welcome to Glue XJTLU,
    <br>
  {{-- <a href="{{ URL('mailBox?uid='.$id.'&activationcode='.$activationcode) }}" target="_blank">   --}}
    <a href="http://localhost:8000/activeAccount/?verify={{$activationcode}}">
    Please click on this link to verify your email  
  </a>  
</body>  
</html>  