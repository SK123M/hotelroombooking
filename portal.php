
<style>
	header.masthead{

		background: url(hotel.jpg);
	}
	header.masthead .container{
		/* background:#0000006b; */
	}
	main {
		width: 100%;
    height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    margin-top: -190px;
   }
   
   section h3 {
	 font-size: 35px;
	 font-weight: 200;
	 letter-spacing: 3px;
	 text-shadow: 1px 1px 2px black;
   }
   
   section h1 {
	 margin: 30px 0 20px 0;
	 font-size: 55px;
	 font-weight: 700;
	 text-shadow: 2px 1px 5px black;
	 text-transform: uppercase;
   }
   
   section p {
	 font-size: 25px;
	 word-spacing: 2px;
	 margin-bottom: 25px;
	 text-shadow: 1px 1px 1px black;
   }
   
   section a {
	 padding: 12px 30px;
	 border-radius: 4px;
	 outline: none;
	 text-transform: uppercase;
	 font-size: 13px;
	 font-weight: 500;
	 text-decoration: none;
	 letter-spacing: 1px;
	 transition: all 0.5s ease;
   }
   
   section .btnone {
	 /*background: #00b894;*/
	 background: #fff;
	 color: #000;
   }
   
   .btnone:hover {
	 background: #00b894;
	 color: white;
   }
   
   section .btntwo {
	 background: #00b894;
	 color: white;
   }
   
   .btntwo:hover {
	 background: #fff;
	 color: #000;
   }
   
   .change_content:after {
	 content: "";
	 animation: changetext 10s infinite linear;
	 color: #0f2453;
   }
   
   @keyframes changetext {
	 0% {
	   content: "Blue Door";
	 }

	 
   }

</style>
<!-- Masthead-->
<header class="masthead" style="    width: 100%;
    height: 630px;">
	<div class="container">
	   
	<main>
		   <section>
   
			   <h3>Welcome To Wow</h3>
			   <h1>DO COME & STAY <span class="change_content"> </span> <span style="margin-top: -10px;"> | </span> </h1>
			   <!-- <p>"India once is not enough"</p> -->
			   <a class="btn btn-primary btn-xl text-uppercase" href="#home">View More</a>
			   <!-- <a href="#" class="btnone">learn more</a>
			   <a href="#" class="btntwo">signup here</a> -->
		   </section>
	   </main>
	
	</div>
</header>
<!-- Services-->
<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">Gallery</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-warning" style="border:3px solid" width="15%">
	</div>
	<div class="row">
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));

				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count =$review->num_rows;
				$rate = 0;
				while($r= $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate/$review_count,0,"");
		?>
			<div class="col-md-4 p-4 ">
				<div class="card w-100 rounded-0">
					<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
					<div class="card-body">
					<!-- <h5 class="card-title truncate-1 w-100"><?php echo $row['title'] ?></h5><br>
					<div class=" w-100 d-flex justify-content-start">
						<div class="stars stars-small">
								<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
								<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
								<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
								<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
								<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
						</div>
                    </div> -->
    				<!-- <p class="card-text truncate"><?php echo $row['description'] ?></p> -->
				
					</div>
				</div>
			</div>

		<?php endwhile; ?>
	</div>
	<div class="d-flex w-100 justify-content-end">
		<a href="./?page=packages" class="btn btn-flat btn-warning mr-4">More Rooms <i class="fa fa-arrow-right"></i></a>
	</div>
	</div>
</section>
<!-- About-->
<section class="page-section" id="about">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">About Us</h2>
		</div>
		<div>
			<div class="card w-100">
				<div class="card-body">
					<?php echo file_get_contents(base_app.'about.html') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Contact Us</h2>
			<h3 class="section-subheading text-muted">Send us a message for inquiries.</h3>
		</div>
		<!-- * * * * * * * * * * * * * * *-->
		<!-- * * SB Forms Contact Form * *-->
		<!-- * * * * * * * * * * * * * * *-->
		<!-- This form is pre-integrated with SB Forms.-->
		<!-- To make this form functional, sign up at-->
		<!-- https://startbootstrap.com/solution/contact-forms-->
		<!-- to get an API token!-->
		<form id="contactForm" >
			<div class="row align-items-stretch mb-5">
				<div class="col-md-6">
					<div class="form-group">
						<!-- Name input-->
						<input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
					</div>
					<div class="form-group">
						<!-- Email address input-->
						<input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
					</div>
					<div class="form-group mb-md-0">
						<input class="form-control" id="subject" name="subject" type="subject" placeholder="Subject *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-textarea mb-md-0">
						<!-- Message input-->
						<textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
		</form>
	</div>
</section>
<script>
$(function(){
	$('#contactForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:_base_url_+"classes/Master.php?f=save_inquiry",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("an error occured",'error')
				end_loader()
			},
			success:function(resp){
				if(typeof resp == 'object' && resp.status == 'success'){
					alert_toast("Inquiry sent",'success')
					$('#contactForm').get(0).reset()
				}else{
					console.log(resp)
					alert_toast("an error occured",'error')
					end_loader()
				}
			}
		})
	})
})
</script>