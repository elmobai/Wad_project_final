<?php
    if(isset($_POST['insert']))
    {
        $xml = new DomDocument("1.0","UTF-8");
        $xml->load('address.xml');
        
        $fname = $_POST['F_name'];
        $lname = $_POST['L_name'];
        $phone = $_POST['Num'];
        $address = $_POST['Address'];
        
        $rootTag= $xml->getElementsByTagName("directory")->item(0);
        
        $infoTag = $xml->createElement("person");
            $fnameTag = $xml->createElement("first_name", $fname);
            $lnameTag = $xml->createElement("last_name", $lname);
            $phoneTag = $xml->createElement("telephone", $phone);
            $addressTag = $xml->createElement("address", $address);
            
            $infoTag->appendChild($fnameTag);
            $infoTag->appendChild($lnameTag);
            $infoTag->appendChild($phoneTag);
            $infoTag->appendChild($addressTag);
            
            $rootTag->appendChild($infoTag);
            $xml->save('address.xml');
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Awesome Address Book</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="test.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
  /*Smooth Scroll Function*/
      $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

  </script>
  
  <script type="text/javascript" src="drinks.js"></script>
  
  <script>
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").load("demo_test.txt", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                alert("External content loaded successfully!");
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });
});

</script>
<script>
$(document).ready(function(){
    $("button1").click(function(){
        $("	<div class=contentAreaStyle").show();
    });
});
</script>

<script type="text/javascript" src="main.js"></script>
<!--Validation not working Cant find the reason-->
<script>
	function validateForm() {
    var x = document.forms["myForm"]["F_name"].value;
    var y = document.forms["myForm"]["L_name"].value;
    var z = document.forms["myForm"]["Num"].value;
    var q = document.forms["myForm"]["Address"].value;
    if (x == null || x == "") {
        alert("First Name must be filled out");
        document.getElementById("First_name").style.borderColor = "red";
        return false;
	    }
	if (y == null || y == ""){
		alert("Last Name must me filled out");
		document.getElementById("Last_name").style.borderColor = "red";
		return false;
		}
		if (z == null || z == ""){
		alert("Number must be entered");
		document.getElementById("Number").style.borderColor = "red";
		return false;
		}
		if (q == null || q == ""){
		alert("An Address must be entered");
		document.getElementById("Addres").style.borderColor = "red";
		return false;
		}
	}
	</script>
	
 
</head>
<body onload="process()">
    
    
    <div class="container-fluid ">
        
    
		<div class="row">
			<!-- header area start -->
		
			<!-- header area end -->
			
			<!-- menubar area start -->
			<nav class="navbar navbar-default">
		
			<H1 align="center">  Super Fantastic Addressbook Funtime  </H1>
				<div class="col-sm-12 col-sm-push- navbar">
				    





<button class="button1"><span>adding a  </span>
<li><a href="#adding">contact</a></li>
</button>



<button class="button3"><span>Rss Feed </span>
<li><a href="#Rss">Feed</a></li>
</button>

<button class="button4"><span> Table of   </span>
<li><a href="#contact">Contacts</a></li>

</button>
<button class="button5"><span> About   </span>
<li><a href="#about">us</a></li>
</button>




		    
		    
		</div>

			  <div class="container-fluid">
				<!-- navbar for mobile display -->
				<div class="navbar-header">
			
  
				</div>
		
 
				
				
				  			 
				
			
		
			

			<div class="col-sm-12 col-sm-push-0 contentAreaStyle" id="adding" style="visibility: " > <!--Start of Adding a Contact div-->
			    

			    <div id="content">
			       <H3 align="center"> Adding a Contact </H3>

			        <br>
			        <br>
              <form name"myForm" method = "POST" action = "index.php" onsubmit="return validateForm()">
                 First Name: <input type="text" id="First_name" name="F_name" placeholder="Enter a First name here"></br>
                     <br>Last Name: <input type="text" id="Last_name" name="L_name"  placeholder="Enter a Last name here"></br>
                     <br>Number: <input type="text" id="Number" name="Num"  placeholder="Enter a Contact number here"></br>
                     <br>Address: <input type="text" id="Addres" name="Address"  placeholder="Enter an address here"></br>
                     <br>
                 <input type="submit" name="insert" value="add contact">
                 
			        <br>
			        <br>
                 </form>
                 
                 
	

              </div><!--End of Adding a Contact Div-->

  
    
					

	
			  <div class="col-sm-12 col-sm-push-0 contentAreaStyle3" id="contact"><!--Start of Table of Contacts Div-->
        <br>
        
            <H3 align="center"> Table of contacts </H3>
            <!--Start of part that loads the XML file data into a table on the page-->
           <?php
           $get = file_get_contents('address.xml');
           $arr = simplexml_load_string($get);
           $data = $arr->person;
           ?>
           <table><!--Start of Table-->
               <tr>
                   <!--Creates the Headers for the table-->
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Address</th>
                   <th>Telephone</th>
               
                   <!--End of creating the Headers-->
               </tr>
               <?php
               foreach($data as $row){
               ?>
               <tr>
                   <td><?php echo $row->first_name ?></td>
                   <td><?php echo $row->last_name ?></td>
                   <td><?php echo $row->address ?></td>
                   <td><?php echo $row->telephone ?></td>
               </tr>
               <?php
               }
               ?>
           </table><!--End of Table-->
        <!--End of part that loads the XML file data into a table-->

            
            

     

    

    </Div>
		<!--End of Table of Contacts Div-->
						  <div class="col-sm-12 col-sm-push-0 contentAreaStyle4" id="Rss"><!--Start of RSS Feed Div-->
						      <title> Rssfeed</title>
						       <H3 align="center"> Directory Checker </H3>
                                Entering First name:
                                <input type="text" id="userInput">
                                <div id="displayResults"></div>
						  </div>
						    <div class="col-sm-12 col-sm-push-0 contentAreaStyle5" id="about"><!--Start of RSS Feed Div-->
						      <br>
						      <title> <br> about us</title>
						       <H3 align="center"> About us  </H3>
						       <script>
                                $(document).ready(function(){
                                    $("button6").click(function(){
                                        $("#div1").load("page1.txt");
    });
});                              
                                </script>
                    <div id="div1"><h3>How we came to be click the buttons above to cycle through </h3></div>
                        <button class="button6">load page 1</button>
						       
						  </div> 
					
       
       
  
			<div class="clearfix">
			</div>
		
		
			<div class="clearfix">
			</div>
			<div class="footerCopyRightStyle">
			<div class="container">
			    <footer>&copy; Emlyn, Evan and Curtis <br/><a href="#">Back to top</a></footer>
			
		
			</div>
		</div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>