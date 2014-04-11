<!DOCTYPE html>
<html lang="en">
  <head>
    <head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>TSG, Inc. - ShipTSG.com</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/tsg.css" rel="stylesheet">
    <script src="assets/js/jquery.js"></script>


  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">TSG, Inc.</a>
            </div>
            <div class="navbar-collapse collapse">
			<a class="btn btn-small btn-warning pull-right"  data-toggle="modal" href="#myModal">Login</a>
			<a class="pull-right whiteheader" href='contact.html'>Contact Us - (800) 445-6043</a>
              <ul class="nav navbar-nav">
                <li><a href="contact.html">Contact</a></li>
                <li><a href="services.html">Services</a></li>                <li class="dropdown">
                  <a href="about.html" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="about.html">TSG Inc</a></li>
                    <li><a href="comments.html">Customer Comments</a></li>                    <li><a href="success.html">Success Stories</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                  </ul>
                </li>
				<li class="dropdown">
                 <a href="tms.html" class="dropdown-toggle" data-toggle="dropdown">Our Tools<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="tms.html">TMS</a></li>
                    <li><a href="pg2.html">PowerGrid</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
        </div>

      </div>
    </div>

	
	<!--<div class='container contacttop'>
	<span class='pull-left'>
	<img src='assets/img/globelogo.png' style="width: 60px; height: 60px;">
	</span>
		<span class='pull-right'>
		<strong><br />(800) 555-5555 Contact Us</strong>
	</span>
</div>-->
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide small">
      <!-- Indicators -->
      <ol class="carousel-indicators">
                   <span class='white'><h1>Rate Shop</h1></span>
      </ol>
      <div class="carousel-inner">
        <div class="item small active">
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
    </div><!-- /.carousel -->

<div id="graphsmall"></div>



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

	  



    <div class="container marketing">

<?php
//VARIABLES
$username = 'websvc5148';
$password = 'websvc5148';
$customerCode = 'FRYREG'; //THIS IS OUR CUSTOMER NOT TSG
$OrigCity = $_POST["OrigCity"];
$OrigState = $_POST["OrigState"];
$OrigZip = $_POST["OrigZip"];
$OrigCountry = $_POST["OrigCountry"];
$DestCity = $_POST["DestCity"];
$DestState = $_POST["DestState"];
$DestZip = $_POST["DestZip"];
$DestCountry = $_POST["DestCountry"];
$ShipDate = $_POST["ShipDate"];
$weight = $_POST["weight"];
$class = $_POST["class"];
$pallets = $_POST["pallets"];
$accCount = 0; // set to 1 only for testing.  needs to be 0 at start and set to 1 by the code


//START XML

$xml = new SimpleXMLElement('<CTSILCCRequest/>');


		$userInfo = $xml->addChild('UserInfo');
			$userInfo->addChild('UserName', $username);
			$userInfo->addChild('UserPassWord', $password);
			$userInfo->addChild('CustomerCode', $customerCode);
		$location = $xml->addChild('Location');
			$location->addChild('OrigLocCode');
			$location->addChild('OrigCity', $OrigCity);
			$location->addChild('OrigState', $OrigState);
			$location->addChild('OrigPC', $OrigZip);
			$location->addChild('OrigCtry', $OrigCountry);
			$location->addChild('DestLocCode');
			$location->addChild('DestCity', $DestCity);
			$location->addChild('DestState', $DestState);
			$location->addChild('DestPC', $DestZip);
			$location->addChild('DestCtry', $DestCountry);
		$GeneralInfo = $xml->addChild('GeneralShipmentInformation');
			$GeneralInfo->addChild('ShipDate', $ShipDate);
			$GeneralInfo->addChild('SCAC');
			$GeneralInfo->addChild('SvcLevel');
		//$Freight = $xml->addChild('Freight');
			$Stops = $xml->addChild('Stops');
				$Stop = $Stops->addChild('Stop');
					$Stop->addChild('StopNo', '1');
					$Stop->addChild('StopPC', $DestZip);
			$FreightGeneral = $xml->addChild('GeneralShipmentInformation');
				$FreightGeneral->addChild('CubicFeet', '0');
				$FreightGeneral->addChild('Pieces', '0');
				$FreightGeneral->addChild('Pallets', $pallets);
				$FreightGeneral->addChild('PalletWeight', '0');
				$FreightGeneral->addChild('Bound', 'O');
				$FreightGeneral->addChild('Terms', 'P');
				$FreightGeneral->addChild('InvoiceValue', '0.0');
				$FreightGeneral->addChild('DimWeight', '0.0');
				$FreightGeneral->addChild('FreightWeight', $weight);
				$FreightGeneral->addChild('LinearFeet', '0');
				$FreightGeneral->addChild('PalletWeightAllowance', '0');
				$FreightGeneral->addChild('EquipType');
				$FreightGeneral->addChild('SvcLevel');
				$FreightGeneral->addChild('Zone');
			$ShipDetail = $xml->addChild('ShipmentDetail');
				$Detail = $ShipDetail->addChild('Detail');			
					$Detail->addChild('ID', '1');
					$Detail->addChild('Weight', $weight);
					$Detail->addChild('Class', $class);
			if($accCount > 0){
			$AccDetail = $xml->addChild('AccessorialDetail');
				$Detail = $AccDetail->addChild('Detail');			
					$Detail->addChild('ID', '1');
					$Detail->addChild('Code', 'IDL');
					$Detail->addChild('Pieces', '0');
					$Detail->addChild('Value', '0');
			}


//$postfields = array('xml' => $xml->asXML()); // get it with file_get_contents() for example



//Header('Content-type: text/xml'); //for testing
//print($xml->asXML()); //for testing

//START CURL
$ch = curl_init();//create curl object

//SET CURL OPTIONS
//$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
//curl_setopt($ch, CURLOPT_USERAGENT, $agent);//sets this as a browser
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-type: application/xml'));
curl_setopt($ch, CURLOPT_URL, "https://my.ctsi-global.com/ECTMSv2/Services/Rating/LeastCostCarrierService.aspx"); //URL to Hit
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//sets the execute to return the data
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);//auto tells service where I am coming from
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);//lets the destination redirect
curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);//Turns off any caching
curl_setopt($ch, CURLOPT_POST, TRUE);//makes it a post
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml->asXML());//this is the XML we created getting posted

//execute
$output = curl_exec($ch);  //getting the return
header('Content-type: text/xml');//setting as xml to view properly
echo $output;//echo CTSI's return.  Will parse after testing

if ($output === FALSE) {    
    echo "cURL Error: " . curl_error($ch);//print out any errors
	}
  

curl_close($ch); //free up the curl handle  
?>
	
	
	
	
	  <!-- START THE CONTACT US HERO-->
	  <hr class="soften">
	  <div class="alert alert-info">
                <center><h2>Contact Us Today for a Free Freight Analysis. 
                <a href="#ContactModal" role="button" class="btn btn-large btn-warning" data-toggle="modal"><i class="icon-envelope"></i><span class="glyphicon glyphicon-envelope"></span> Contact Us Now</a></h2></center>
			    </div><!-- /END THE CONTACT US HERO-->
		
      <hr>

         <!-- FOOTER -->
      <footer>
      <!doctype html>
<div class="footer">	<div class="container">	

<div class="row">
				<div class="col-sm-12 col-lg-12">
									<div class="col-sm-4 col-lg-4" style="width: 30%;">
					          <img class="img" src="assets/img/TSG Logo_116 tall.png" alt="TSG">

					</div>
<div class="col-sm-1 col-lg-1" style="width: 12%;">
						<ul class="list-unstyled">
							<li>TSG Inc</li><li>
							</li><li><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
					<div class="col-sm-1 col-lg-1" style="width: 12%;">
						<ul class="list-unstyled">
							<li>Our Work</li><li>
							</li><li><a href="services.html">Services</a></li>
							<li><a href="comments.html">Customer Feedback</a></li>
							<li><a href="success.html">Success Stories</a></li>
						</ul>
					</div>
<div class="col-sm-1 col-lg-1" style="width: 12%;">
						<ul class="list-unstyled">
							<li>Tools</li><li>
							</li><li><a href="tms.html">TMS</a></li>
							<li><a href="pg2.html">PowerGrid</a></li>
							<li><a href="http://www.trendsetcarriers.com/">Carrier Login</a></li>
						</ul>
					</div>	
<div class="col-sm-1 col-lg-1" style="width: 12%;">
						<ul class="list-unstyled">
							<li>Social</li><li>
							</li><li><a href="#">Facebook</a></li>
							<li><a href="#">LinkedIn</a></li>
							<li><a href="#">Twitter</a></li>
						</ul>
					</div>	
<div class="col-sm-1 col-lg-1" style="width: 12%;">
						<ul class="list-unstyled">
							<li>More</li><li>
							</li><li><a href="terms.html">Terms of Service</a></li>
							<li><a href="privacy.html">Privacy</a></li>
							<li><a href="credits.html">Credits</a></li>
						</ul>
					</div>	

				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<div class="col-sm-8 col-lg-8">
O) 800-445-6043 | F) 678-215-9019 | 460 Briscoe Blvd 3rd Floor, Lawrenceville Ga 30046, United States
					</div>
					<div class="col-sm-4 col-lg-4">
						<p class="pull-right text-muted">© 2013 TSG, Inc.   All rights reserved</p>
					</div>
				</div>
			</div>
			</div>
  </div>  </div>
  
    <!-- Modal LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS LOGIN OPTIONS  -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2 class="modal-title">Choose One of Our Services</h2>
        </div>
        <div class="modal-body">
		<a href="https://tms.shiptsg.com"><h2>TMS</h2></a>
		<a href="https://tms.shiptsg.com"><h2>PowerGrid 2.0</h2></a>
		<a href="https://tms.shiptsg.com"><h2>Carrier Login</h2></a>
		<a href="https://tms.shiptsg.com"><h2>Claim Submission</h2></a>
	
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
      <!-- Modal TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS  TMS -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Login the TMS</h4>
        </div>
        <div class="modal-body">
	<form class="form-horizontal" id="login" name="login" target="_blank" action="https://trendset.mercurygate.net/MercuryGate/login/mgLogin.jsp" method="post">
<fieldset>


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="UserId">Login ID:</label>
  <div class="controls">
    <input id="UserId" name="UserId" type="text" placeholder="Username" class="input-xlarge" required="">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="Password">Password:</label>
  <div class="controls">
    <input id="Password" name="Password" type="password" placeholder="Password" class="input-xlarge" required="">
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for=""></label>
  <div class="controls">
    <button id="" name="" class="btn btn-primary">Sign In</button>
  </div>
</div>

<input type="hidden" name="failedurl" id="failedurl" value="https://tms.shiptsg.com">

<input type="hidden" name="kick" value="1357765414016">

<input type="hidden" name="inline" value="true">

</fieldset>
</form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
      <!-- Modal CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT  CONTACT -->
  <div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="ContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Contact Us</h4>
        </div>
        <div class="modal-body">


<form class="form-horizontal" target="_blank" method="post" action="http://www.shiptsg.net/Dev/contactForm.php">
<fieldset>



<!-- Text input-->
<div class="control-group">
  <label class="control-label">Name</label>
  <div class="controls">
    <input id="name" name="name" type="text" placeholder="First Last" class="input-xlarge" required="">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Email</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="Example@Example.Com" class="input-xlarge" required="">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Phone</label>
  <div class="controls">
    <input id="phone" name="phone" type="text" placeholder="XXX-XXX-XXXX" class="input-xlarge">
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Message</label>
  <div class="controls">                     
    <textarea rows="5" cols="50" id="message" name="message"></textarea>
  </div>
</div>
<!-- Button -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="Submit" name="Submit" class="btn btn-primary">Send</button>
  </div>
</div>
</fieldset>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  
  </body></html>
      </footer>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.js"></script>
	<script type="text/javascript">
            // Scrolling Graph
            var latestPoint = 0;
            var max = 99;
            var min = 20;
            var velocity = 2;
            var wiggle = 8;
            var maxBars = 200;

            function nextRandom() {
              velocity *= 1.1;
              velocity += Math.random() *
                wiggle - wiggle / 2;
              velocity += -latestPoint /
                500;
              latestPoint = Math.min(
                Math.max(min,
                latestPoint + velocity),
                max);
              if (latestPoint == min ||
                latestPoint == max)
                velocity = 0;
              return latestPoint;

            }

            function addBar() {
              var n = ~~nextRandom();
              $('<div class="bar">').css({
                height: n,
                marginTop: max - n
              }).prependTo('#graphsmall');

              if ($('#graphsmall .bar').length >
                maxBars) {
                $('#graphsmall .bar').last()
                  .remove();
              }
            }

            function fluctuate(bar) {
              //var n = ~~nextRandom() * 10 ;
              var hgt = Math.round(Math
                .random() * 10);
              //n += 1;
              //var t = hgt * 30  ;

              bar.animate({
                height: hgt
              }, function () {
                fluctuate($(this));
              });
            }


            for (var i = 0; i < maxBars; i +=
              1) {
              addBar();
            };

            setInterval(addBar, 300);
          </script>
		  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39818315-1', 'shiptsg.com');
  ga('send', 'pageview');

</script>
  </body>
</html>
