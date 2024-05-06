 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav" style="    height: 80px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#page-top"><span class="text-waring">
      
      </span></a>
      <div id="currentLocation" style="    margin-top: 7px;
		   margin-left: 21px;">
       <img src="hotel-removebg-preview (1).png" style="width: 155px;">
			   <!-- <h3 style="font-size:15px;color:white;">Current Location:</h3> -->
			   <p id="locationInfo" style="display:none"></p>
			   <p id="addressInfo" style="color:white;font-size:10px; width: 262px;"></p> 
		   </div>
       <!-- <img src="blue-removebg-preview (2).png" style="width: 150px;
    height: 70px;

}"> -->
   <script>
	   document.addEventListener("DOMContentLoaded", function () {
		   getLocation();
	   });
	   
	   function getLocation() {
		   if (navigator.geolocation) {
			   navigator.geolocation.getCurrentPosition(showCurrentLocation);
		   } else {
			   alert("Geolocation is not supported by this browser.");
		   }
	   }
	   
	   function showCurrentLocation(position) {
		   let latitude = position.coords.latitude;
		   let longitude = position.coords.longitude;
		   
		   // Fetch the address using Nominatim API
		   fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`)
			   .then(response => response.json())
			   .then(data => {
				   let locationText = `Latitude: ${latitude}<br>Longitude: ${longitude}`;
				   let addressText = `<img src="inc/map-removebg-preview.png" style="height:15px;width:17px"></img> ${data.display_name}`;
				   
				   document.getElementById("locationInfo").innerHTML = locationText;
				   document.getElementById("addressInfo").innerHTML = addressText;
			   })
			   .catch(error => console.error('Error fetching address:', error));
	   }
	   </script>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item" style="font-weight:bold"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>">Home</a></li>
                        <li class="nav-item"style="font-weight:bold"><a class="nav-link" href="./?page=packages">Rooms</a></li>
                        <li class="nav-item"style="font-weight:bold"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>#about">About</a></li>
                        <li class="nav-item"style="font-weight:bold"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>#contact">Contact</a></li>
                        <?php if(isset($_SESSION['userdata'])): ?>
                          <li class="nav-item" style="font-weight:bold"><a class="nav-link" href="./?page=my_account"><i class="fa fa-user"></i> Hi, <?php  echo $_settings->userdata('firstname') ?>!</a></li>
                          <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i></a></li>
                        <?php else: ?>
                          <li class="nav-item" style="font-weight:bold"><a class="nav-link" href="javascript:void(0)" id="login_btn">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
<script>
  $(function(){
    $('#login_btn').click(function(){
      uni_modal("","login.php","large")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })
</script>