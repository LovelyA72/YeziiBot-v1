<!DOCTYPE html>
<html lang='en'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0'/>
  <title></title>

  <!-- CSS  -->
  <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
  <link href='/css/style.css' type='text/css' rel='stylesheet' media='screen,projection'/>
  
  <style>
.Site {
     display: flex;
     display: -webkit-flex; /* Safari (But who will use it?)*/
     min-height: 100vh;
     flex-direction: column;
 }

.Site-content {
    flex: 1;
} 
  </style>
</head>
<body class='Site'>
  <nav class='light-blue lighten-1' role='navigation'>
    <div class='nav-wrapper container'><a id='logo-container' href='//qq.acgn.pro/' class=''><font size="4">Xiaoling!bot</font></a>
      <ul class='right hide-on-med-and-down'>
        <li><a href='#about' data-target="about" class='modal-trigger'>About Xiaoling!bot</a></li>
      </ul>
    </div>
</div>
  </nav>
  <div class='section no-pad-bot Site-content' id='index-banner'>
    <div class='container'>
      <br><br>
      <div class='row'>
        <?php
		$title=$_GET['title'];
		if($title==""){
			echo("No page found!");
		}
		include("../lib/Parsedown.php");
		$parsedown = new Parsedown();
		//$parsedown->setSafeMode(true);
		echo $parsedown->text(file_get_contents("pages/{$title}.md"));
		?>
      </div>
      <br><br>
    </div>
  </div>


  <div class='container'>
  
  </div>
  <div id='about' class='modal'>
    <div class='modal-content'>
      <h4>About Xiaoling!bot</h4>
      <p>HeXiaoling is a character made by YzWiki</p>
	  <p>Backend program: 2018 TEAM A72</p>
	  <p>Web program: YzACG Web Dev team</p>
    </div>
    <div class='modal-footer'>
      <a href='#!' class='modal-close waves-effect waves-green btn-flat'>OK</a>
  </div>

  <!--  Scripts-->
  <script src='https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <script>
  $(document).ready(function(){
    $('.modal').modal();
  });</script>
  </body>
</html>