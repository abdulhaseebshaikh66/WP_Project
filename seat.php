<?php
  session_start();
  $_SESSION["seats"] = ["abc"];
  $_SESSION["userid"] = "1";
  if(isset($_SESSION['name'])){}
    else{
      header("location:login1.php");
      
    }
  $tbl_name="users"; // Table name
  $name=$_SESSION['name'];
  $seats=array();

  require('firstimport.php');

  mysqli_select_db($conn,"$db_name") or die("cannot select db");

  $result=mysqli_query($conn,"SELECT * FROM $tbl_name WHERE f_name='$name'");
  $row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Seat Availability </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</link>
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			//alert($(window).width());
			var x=(($(window).width())-1024)/2;
			//alert(x);
			$('.wrap').css("left",x+"px");
		});

	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
</head>

<body>

<?php 
// function runMyFunction() {
//   alert(`I just ran a php function `);
// }

// if (isset($_GET['hello'])) {
//  runMyFunction();
// }
?>

<script type="text/javascript">
  let value = [];
  function runMyFunction(vl) {
    if ( value.length < 5) {
      value.includes(vl) ? deleteSeat(vl) : value.push(vl);
    } else {
      value.includes(vl) ? deleteSeat(vl) : null;
    }

    alert(<?php echo "Hello"?>)
    //  alert(`Seat No => ${vl} | Total Price => ${250*value.length} | seats => ${value} `);
  }

  function deleteSeat(vl) {
    var temp = [];
    for ( var i = 0; i < value.length; i++){
      if ( value[i] != vl ) { temp.push(value[i]); }
    }
    value = temp;
  }

  function checkSeats() {
    alert(`Total Price => ${250*value.length} | seats => ${value} `);
  }

  function saveSeats() {
    $_SESSION["seats"] = [12,4];
  }
  
  // if (isset($_GET['hello'])) {
  //   runMyFunction(value);
  // }
</script>


	<div class="wrap">
		<!-- Header -->
		<div class="header">
			<div style="float:left;width:150px;">
				<img src="images/logo.png"/>
			</div>		
			<div>
			<div style="float:right; font-size:20px;margin-top:20px;">
			<?php
			 if(isset($_SESSION['name'])){
			  echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 else{
				$_SESSION['error']=15;
				//echo "fgfggy".$_SESSION['error'];
				header("location:login1.php");
			 } 
			?>
			</div>
			<div id="heading">
				<a href="index.php">Pakistan Railways</a>
			</div>
			</div>
		</div>
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index.php" >HOME</a>
				<a class="brand" href="train.php" >FIND TRAIN</a>
				<a class="brand" href="reservation.php">RESERVATION</a>
				<a class="brand" href="profile.php">PROFILE</a>
				<a class="brand" href="booking.php">BOOKING HISTORY</a>
				</div>
			</div>
		</div>
		
		<div class="span12 well pass1">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th> 
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- <td ><span style="font-weight:bold;font-size:25px;">Book</span> -->
            <a id="editp1" style="float:right;margin-right:5%;"class="btn btn-info" onclick="saveSeats()"> Book Now </a></td>
            <a id="editp3" style="float:right;margin-right:5%;"class="btn btn-info" onclick="checkSeats()"> Check Seats </a></td>
          </tr>
          <tr >
            <td id='seat1' style='height:100px; wight: 100px;align-items: center; background-color:#3a66cf;' >
              <div style='text-align: center;' onclick='runMyFunction(1)'>
                <p>01</p>
                <img src='images/seat.png' height='40px' width='40px' style='align-self: center; margin-bottom:10px' />
                <p>Rs: 250</p>
              </div>
            </td>
            <td id='seat2' class='seatAvailablity' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(2)">
                <p>02</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat3' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(3)">
                <p>03</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td  id='seat4' class='seatAvailablity' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(4)">
                <p>04</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td  id='seat5' class='seatAvailablity' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(5)">
                <p>05</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat6' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(6)">
                <p>06</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat7' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(7)">
                <p>07</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <!-- <td>Otto</td>
            <td>@mdo</td> -->
          </tr>
          <tr >
            <!-- <th scope="row"></th> -->
            <td id='seat8' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(8)" >
                <p>08</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat9' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(9)">
                <p>09</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat10' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(10)">
                <p>10</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat11' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(11)">
                <p>11</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat12' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(12)">
                <p>12</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat13' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(13)">
                <p>13</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat14' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(14)">
                <p>14</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <!-- <td>Otto</td>
            <td>@mdo</td> -->
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr >
            <!-- <th scope="row"></th> -->
            <td id='seat15' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(15)">
                <p>15</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat16' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(16)">
                <p>16</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat17' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(17)">
                <p>17</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat18' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(18)">
                <p>18</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat19'  style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(19)">
                <p>19</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat20' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(20)">
                <p>20</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat21' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(21)">
                <p>21</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <!-- <td>Otto</td>
            <td>@mdo</td> -->
          </tr>
          <tr >
            <!-- <th scope="row"></th> -->
            <td id='seat22' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(22)">
                <p>22</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat23' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(23)">
                <p>23</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat24' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(24)">
                <p>24</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat25' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(25)">
                <p>25</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat26' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(26)">
                <p>26</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat27' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(27)">
                <p>27</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat28' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(28)">
                <p>28</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <!-- <td>Otto</td>
            <td>@mdo</td> -->
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr >
            <!-- <th scope="row"></th> -->
            <td id='seat20' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(29)">
                <p>29</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat30' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(30)">
                <p>30</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat31' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(31)">
                <p>31</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat32' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(32)">
                <p>32</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat33' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(33)">
                <p>33</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat34' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(34)">
                <p>34</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat35' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(35)">
                <p>35</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
          </tr>
          <tr >
            <td id='seat36' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(36)">
                <p>36</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat37' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(37)">
                <p>37</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat38' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(38)">
                <p>38</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat39' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(39)">
                <p>39</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat40' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(40)">
                <p>40</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td  style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat41' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(41)">
                <p>41</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat42' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(42)">
                <p>42</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr >
            <!-- <th scope="row"></th> -->
            <td id='seat43' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(43)">
                <p>43</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat44' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(44)">
                <p>44</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat45' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(45)">
                <p>45</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat46' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(46)">
                <p>46</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat47' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(47)">
                <p>47</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat48' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(48)">
                <p>48</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat49' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(49)">
                <p>49</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
          </tr>
          <tr >
            <td id='seat50' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
                <div style="text-align: center; " onclick="runMyFunction(50)">
                  <p>50</p>
                  <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                  <p>Rs250</p>
              </div>
            </td>
            <td id='seat51' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
                <div style="text-align: center; " onclick="runMyFunction(51)">
                  <p>51</p>
                  <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>
            </td>
            <td id='seat52' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(52)">
                  <p>52</p>
                  <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                  <p>Rs250</p>
              </div>
            </td>
            <td id='seat53' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
                <div style="text-align: center; " onclick="runMyFunction(53)">
                  <p>53</p>
                  <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                  <p>Rs250</p>
              </div>
            </td>
            <td id='seat54' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(54)">
                <p>54</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                  <p>Rs250</p>
              </div>
            </td>
            <td style="height:100px; wight:5px;">
            <!-- space -->
            </td>
            <td id='seat55' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(55)">
                <p>55</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
            <td id='seat56' style="height:100px; wight: 100px;background-color:#3a66cf;align-items: center;">
              <div style="text-align: center; " onclick="runMyFunction(56)">
                <p>56</p>
                <img src="images/seat.png" height="40px" width="40px" style="align-self: center; "/>
                <p>Rs250</p>
              </div>  
            </td>
          </tr>
          
        </tbody>
      </table>
      <!-- <table class="table"></table> -->
		</div>

		<div class="span12 pass2 " style="display:none;">
		<div class="span4 well">	
		<h2>Change Password</h2>	
		<br/>
		<br/>
				<form action="changepass.php" method="get" onsubmit="return fgth()">
				<label>New Password</label><input id="p1" name ="new1" type="password" class="input-large" onkeyup="return check123()"><span id="ps" ></span></td><br><br>  <!-- onkeyup=="check()" -->
				<label>Repeat Password</label><input id="p2" name="pass" class="input-large" type="password" onkeyup="checkk()">
				<br /><span id="match" style="color:#ff0000;visibility:hidden;">&nbsp;&nbsp;Password Don't Match</span><br><br> 
				<input id="sub" type="submit" disabled="disabled" class="btn btn-info" value="Change Password">
				</form>
		</div>
		</div>
		
		
		
		<div class="span12 pass3 " style="display:none;">
		<div class="span8 well">
			<table style="width:100%;">
			<tr>
				<td><span style="font-weight:bold;font-size:25px;">Profile</span>

			<tr/>
			
			<tr>
				<td>
					<form action="editprofile.php" method="post" enctype="multipart/form-data">
					<div class="span6" style="float:left;width:80%;">
					<table class="table">
					
					<tr><td >First Name  </td> <td id='seat2' style="text-transform:capitalize; onblur="return name1()"><?php echo $name;?></td></tr>
					<tr><td> Last name </td> <td><input name="ln" type="text" value="<?php echo $row['l_name'];?>"></td></tr>
					<tr><td>E-Mail  </td> <td><input name="mail1" type="mail" value="<?php echo $row['email'];?>"></td></tr>
					<tr><td>Dob  </td> <td><input name="dob1" type="text" value="<?php echo $row['dob'];?>"></td></tr>
					<tr><td>Gender  </td>  <td><input name="gnd1" type="text" value="<?php echo $row['gender'];?>"></td></tr>
					<tr><td>Marital Status </td>  <td><input name="mrt1" type="text" value="<?php echo $row['marital'];?>"></td></tr>
					<tr><td>Mobile No.  </td>  <td><input name="mon1" type="text" value="<?php echo $row['mobile'];?>"></td></tr>
					<tr><td>Security Question  </td>  <td><input name="que1" type="text" value="<?php echo $row['ques'];?>"></td></tr>
					<tr><td>Answer  </td>  <td><input name="ans1" type="text" value="<?php echo $row['ans'];?>"></td></tr>
					<tr><td></td> <td><input type="submit" value="Save Profile" class="btn btn-info"></td></tr>
				
					</table>
					</div>
					</form>
				</td>
			</tr>
			</table>
		</div>
		</div>
	
<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy; 2018 Copyright PVT Ltd.</p>	
			</div>
			<div style="float:right;">
			<p class="text-right text-info">	Desinged By : projectworlds</p>
			</div>
		</div>
		</footer>
	
	</div>

  
<?php mysqli_close($conn); ?>
 
 
 
 <script type="text/javascript">
$(document).ready(function(){
  $("#cpass").click(function(){
    $(".pass1").fadeOut(1000,"linear",function(){$(".pass2").fadeIn(1000);});
	
  });
});

$(document).ready(function(){
  $("#editp1").click(function(){
    $(".pass1").fadeOut(1000,"linear",function(){$(".pass3").fadeIn(1000);});
	
  });
});

$(document).ready(function(){
  $("#editp2").click(function(){
    $(".pass3").fadeOut(1000,"linear",function(){$(".pass1").fadeIn(1000);});
  });
});




$(document).ready(function(){
  $("#seat1").click(function(){
    value.includes(1) ?
    document.getElementById("seat1").style.backgroundColor = "#7777f7":
    document.getElementById("seat1").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat2").click(function(){
    value.includes(2) ?
    document.getElementById("seat2").style.backgroundColor = "#7777f7":
    document.getElementById("seat2").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat3").click(function(){
    value.includes(3) ?
    document.getElementById("seat3").style.backgroundColor = "#7777f7":
    document.getElementById("seat3").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat4").click(function(){
    value.includes(4) ?
    document.getElementById("seat4").style.backgroundColor = "#7777f7":
    document.getElementById("seat4").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat5").click(function(){
    value.includes(5) ?
    document.getElementById("seat5").style.backgroundColor = "#7777f7":
    document.getElementById("seat5").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat6").click(function(){
    value.includes(6) ?
    document.getElementById("seat6").style.backgroundColor = "#7777f7":
    document.getElementById("seat6").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat7").click(function(){
    value.includes(7) ?
    document.getElementById("seat7").style.backgroundColor = "#7777f7":
    document.getElementById("seat7").style.backgroundColor = "#3a66cf"
  });
});

// $(document).ready(function(){
//   $("#seat7").click(function(){
//     value.includes(8) ?
//     document.getElementById("seat7").style.backgroundColor = "#7777f7":
//     document.getElementById("seat7").style.backgroundColor = "#3a66cf"
//   });
// });

$(document).ready(function(){
  $("#seat8").click(function(){
    value.includes(8) ?
    document.getElementById("seat8").style.backgroundColor = "#7777f7":
    document.getElementById("seat8").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat9").click(function(){
    value.includes(9) ?
    document.getElementById("seat9").style.backgroundColor = "#7777f7":
    document.getElementById("seat9").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat10").click(function(){
    value.includes(10) ?
    document.getElementById("seat10").style.backgroundColor = "#7777f7":
    document.getElementById("seat10").style.backgroundColor = "#3a66cf"
  });
});



$(document).ready(function(){
  $("#seat11").click(function(){
    value.includes(11) ?
    document.getElementById("seat11").style.backgroundColor = "#7777f7":
    document.getElementById("seat11").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat12").click(function(){
    value.includes(12) ?
    document.getElementById("seat12").style.backgroundColor = "#7777f7":
    document.getElementById("seat12").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat13").click(function(){
    value.includes(13) ?
    document.getElementById("seat13").style.backgroundColor = "#7777f7":
    document.getElementById("seat13").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat14").click(function(){
    value.includes(14) ?
    document.getElementById("seat14").style.backgroundColor = "#7777f7":
    document.getElementById("seat14").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat15").click(function(){
    value.includes(15) ?
    document.getElementById("seat15").style.backgroundColor = "#7777f7":
    document.getElementById("seat15").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat16").click(function(){
    value.includes(16) ?
    document.getElementById("seat16").style.backgroundColor = "#7777f7":
    document.getElementById("seat16").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat17").click(function(){
    value.includes(17) ?
    document.getElementById("seat17").style.backgroundColor = "#7777f7":
    document.getElementById("seat17").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat18").click(function(){
    value.includes(18) ?
    document.getElementById("seat18").style.backgroundColor = "#7777f7":
    document.getElementById("seat18").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat19").click(function(){
    value.includes(19) ?
    document.getElementById("seat19").style.backgroundColor = "#7777f7":
    document.getElementById("seat19").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat20").click(function(){
    value.includes(20) ?
    document.getElementById("seat20").style.backgroundColor = "#7777f7":
    document.getElementById("seat20").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat21").click(function(){
    value.includes(21) ?
    document.getElementById("seat21").style.backgroundColor = "#7777f7":
    document.getElementById("seat21").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat22").click(function(){
    value.includes(22) ?
    document.getElementById("seat22").style.backgroundColor = "#7777f7":
    document.getElementById("seat22").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat23").click(function(){
    value.includes(23) ?
    document.getElementById("seat23").style.backgroundColor = "#7777f7":
    document.getElementById("seat23").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat24").click(function(){
    value.includes(24) ?
    document.getElementById("seat24").style.backgroundColor = "#7777f7":
    document.getElementById("seat24").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat25").click(function(){
    value.includes(25) ?
    document.getElementById("seat25").style.backgroundColor = "#7777f7":
    document.getElementById("seat25").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat26").click(function(){
    value.includes(26) ?
    document.getElementById("seat26").style.backgroundColor = "#7777f7":
    document.getElementById("seat26").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat27").click(function(){
    value.includes(27) ?
    document.getElementById("seat27").style.backgroundColor = "#7777f7":
    document.getElementById("seat27").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat28").click(function(){
    value.includes(28) ?
    document.getElementById("seat28").style.backgroundColor = "#7777f7":
    document.getElementById("seat28").style.backgroundColor = "#3a66cf"
  });
});


$(document).ready(function(){
  $("#seat29").click(function(){
    value.includes(29) ?
    document.getElementById("seat29").style.backgroundColor = "#7777f7":
    document.getElementById("seat29").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat30").click(function(){
    value.includes(30) ?
    document.getElementById("seat30").style.backgroundColor = "#7777f7":
    document.getElementById("seat30").style.backgroundColor = "#3a66cf"
  });
});

$(document).ready(function(){
  $("#seat31").click(function(){
    value.includes(31) ?
    document.getElementById("seat31").style.backgroundColor = "#7777f7":
    document.getElementById("seat31").style.backgroundColor = "#3a66cf"
  });
});
// $(document).ready(function(){
//   for (var i = 5; i < value.length; i++) {
//     var tmp = `seat${i+1}`;
//     $(`#${tmp}`).click(function(){
//       console.log(tmp);
//       if (i+1 == value[i]){
//         document.getElementById(temp).style.backgroundColor = "#ff0000";
//       } else {
//         document.getElementById(temp).style.backgroundColor = "#3a66cf"   
//       }
//       alert("done")
//     });
//   }
// });


function checkk(){

var p1=document.getElementById("p1").value;
var p2=document.getElementById("p2").value;
//alert(" p1 : "+p1+"  p2 : "+p2);

	if(p1 == p2)
	{document.getElementById("match").style.visibility="hidden";
		document.getElementById("sub").disabled=false;
	}else
	{
		document.getElementById("match").style.visibility="";
		document.getElementById("sub").disabled=true;
	}
}

function check123()
	{
		var c=document.getElementById("p1").value;
		//alert(c.length);
		if(c.length < 8 )
		{
			document.getElementById("ps").innerHTML="<br/><font color=#3a66cf>password must east 8 - 32 char long</font>";
			return false;
		}
		else
		{
			document.getElementById("ps").innerHTML="";
			return true;
		}
	}
</script>
<?php

if(isset($_SESSION['error']))
{
if($_SESSION['error']==6)
{echo "<script>document.getElementById(\"chang\").style.display=\"\";</script>";
 }
//unset($_SESSION['error']);
}
?>

</body>
  
  
</html>