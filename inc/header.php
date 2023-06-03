<!doctype html>
<html class="no-js" lang="">

<head>

  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <meta charset="utf-8">
  <title>Postbook</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!--jQuery UI css file offline support-->
  <link rel="stylesheet" href="css/jquery-ui.min.css">
  <!--Fontawsome Online Support css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!--jQuery UI js file offline support-->
  <script src="js/jquery-ui.min.js"></script>

  <!--jQuery offline support-->
  <script src="js/jquery.js"></script>
  
  <style type="text/css">
    .head{
    background: #dee8f7;
    padding: 5px 20px 25px;
    color: #524f4f;
    border-bottom: dotted 2px #999;
  }
  .sitename{
    font-size: 25px;
    color: #5f5f60;
    margin-right: 10px;
  }
  .username{
    font-size: 20px;
    color: #afafaf;
    background: #dee8f7;
  }
  .search{
    margin-right: 10px;
  }
  /*form section*/
  .form{
    background: #dee8f7;
    padding-bottom: 20px;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  .success{
    color: #ffffff;
    background: #2dbf45;
    padding: 10px;
  }
  .error, .err{
    color:red;
    margin-top: 10px;
  }

  .showimg img{
    margin-top: 10px;
  }
  
  #text, #fileupload, #comment{
    background: #e9ecef;
  }
  /*content section*/
  .content{
    background: #dee8f7;
    border-radius: 20px;
  }
  .postdesc{
    display: none;
    text-align: justify;
    text-align: center;
    line-height: 28px;
  }

.date{
       font-size: 15px;
      color: #838080;
}

/*Responsive area*/

</style>

  <script type="text/javascript">
    $(document).ready(function(){

      

      //function for success or error msssage
      setInterval(function(){
        $(".error").text("");
      }, 2000);

      
      setInterval(function(){
        $(".success").text("");
        $('.success').hide()
      }, 2000);

      

      

      // function for show image in html
      $("#fileupload").change(function(event){
        var x = URL.createObjectURL(event.target.files[0]);
        $("#showimg").attr("src", x);
        console.log(event);
      });

      // fucntion for dark mode
      
});
  </script>
</head>

<body style="background: #bdc4cf;">