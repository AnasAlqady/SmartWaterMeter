@extends('layouts.app')

@section('content')
<style>
.hr {
width : 10rem ;
background:#3fabd4;
height:.3rem;
transition: width 4s;
transition: height 2s;
transition: border-radius 4s;
transition-delay: 20ms;
}
.hr:hover {
width : 20rem;
height: 1rem;
border-radius: 1rem;
}

.q{
width:2rem;
height:2rem ; 
background:#3fabd4 ;
border-radius: 100%;
position: relative;
  animation: mymove 5s infinite;
  opacity: .5;
  z-index: 1;
}
#q {animation-timing-function: ease;}
@keyframes mymove {
  from {top: -50px;}
  to {top: 400px;}
}

.slide {
  display: flex ;
  flex-direction:row;
  place-items: center;
  justify-content: space-around
}
@media screen and (min-width : 300px) and (max-width:1000px)
{
  .slide {
  display: flex ;
  flex-direction:colom;
  place-items: center;
  justify-content: space-around;
  text-align:right;
} 
}
.slider > div{ 
  display: none;
}
.slider .active{ 
display: block;
}

@import url(https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:400,700);
/* @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css); */

/* @import url(https://maxcdn.bootstrapcdn.com/font-awesome/5.11.1/css/font-awesome.min.css); */

body {
	background: #40E0D0;
}

/*/ start count stats /*/ 

section#counter-stats {
	display: flex;
	justify-content: center;
	margin-top: 100px;
}

.stats {
  text-align: center;
  font-size: 35px;
  font-weight: 700;
  font-family: 'Montserrat', sans-serif;
}

.stats .fa {
  color: #3fabd4;
  font-size: 60px;
}
.stats .fas {
  color: #008080;
  font-size: 60px;
}
.stats .far {
  color: #008080;
  font-size: 60px;
}

 </style>
 



<section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s"  style="margin-top: -1rem;"> 
	<div class="container">
  <center class="mt-3 mb-5">
  <h1 style="display:inline">  مرحباً بك  
     <hr class="hr">
     </center>
		<div class="row">

    <div class="col-lg-3 stats mt-1">
               <i class="fa fa-tint" style="display:block"></i>
               			<div class="counting" data-count="{{ $main['sum']}}" style="display:inline">0 </div>
                     <span style="font-size:2rem;color: #ff6384;" >  M  </span>

      	<h5>كمية الصرف </h5>
			</div>

			<div class="col-lg-3 stats mt-1">
               <i class="fa fa-dollar" style="display:block"></i>		
               		<div class="counting" data-count="{{ $main['monthCost']  }}" style="display:inline">0</div>
                   <span style="font-size:2rem;color: #ff6384;" >JD  </span>

      	<h5>فاتورتك الآن </h5>
			</div>

			<div class="col-lg-3 stats mt-1">
     <img src="image/clock.png" alt="" style="width: 4rem;"> 
      
       		<div class="counting mt-3" style="font-size: 1.5rem;" >{{$posts['updated_at']->format('y/m/d')}} - {{$posts['updated_at']->format('h:m:t')}}</div>

				<h5 >موعد القراءة الأخيرة  </h5>
			</div>
			<div class="col-lg-3 stats mt-1">
      <i class="fa fa-user" style="display: block;"></i>
			<div class="counting" data-count="{{$prediction['prediction']}}"  style="font-size:1.5rem ;display: inline;" >0</div>
      <span style="font-size:1.5rem;color: #ff6384;" >METER</span>
      <div class="counting" style="font-size:1.5rem ;display: inline;" data-count="{{$prediction['prediction_cost']}}" > 0</div> 
      <span style="font-size:1.5rem ;color: #ff6384;" > 
 JD </span>

      
			<h5>القيمة التنبؤية لصرف هذه الدورة  </h5>
			</div>




		</div>
		<!-- end row -->
	</div>
	<!-- end container -->

</section>

	<!-- end count -->

<div class="container mt-5 mb-5" ><hr></div>

<div class="container" style="border-bottom:15px solid #3fabd4; text-align: -webkit-center; padding: 20px">
<div style="display:flex; flex-direction:row ; justify-content:space-between">

<!-- <button class="q" ></button>
     <button class="q" ></button>
       <button class="q"></button> -->

</div>

  <div class="row justify-content-center" style="margin-top:-3rem;align-items:center;background:#1f456529; padding:22px" >
       <div class="col-md-5 ">
       <div id="empty-space">Tank - Water Meter </div>

       <div id="wrapper" class="wrapper" ></div>
  <br>
 
       <button onclick="tower()" >Tower</button>
       <button onclick="round()">Round</button>
       <button id="twotext" onclick="setTwoText()" style="display: none"></button>
       <button id="high" onclick="high(this.value)" value="{{$main['sum']}}" style="display: none;" ></button>

       <!-- <button onclick="" value="{{$main['monthCost']}}"> <button> -->

       </div>
       <br>
    <div class="col-md-7 mt-5" >
      <div class="card">
     
                   <canvas id="myChart"  ></canvas>
                   <h3 style="display:none">
                <?php $count=count($result)-1;
                ?>
                @for($i = (count($result)-1); $i > (count($result)-6) ; $i--)
               {{
                    $sum[$count] =  $result[$count--]['value']

                    }}
                    @endfor
                    
                        <input id='average' value='{{$average['average'] }} ' type="hidden">
                       
                          <input id='json' value='<?php foreach ($array as $arr ) 
                          echo $arr.",";
                          ?>' type="hidden"></h6> 
              </h3>
            </div>
     </div>
</div>

<hr class="mt-5 mb-5">
<section class="aboutUs mt-5 mb-5">
           <center>          <h1>About Us</h1>
           </center>

             
<section class="slider container row" style="text-align:right">
<div class="active"> 
<div class="row"> 
<div class="col-lg-4  col-sm-12  mt-2 mb-2 stats">
our idea
</div>
<div class="col-lg-4  col-sm-12 mt-2 mb-2 stats">
        <i class="fa fa-user"></i>
				<div class="counting" data-count="3">0</div>
				<h5> Founders </h5>
			   </div> 

         <div class="col-lg-4  col-sm-12 mt-2 mb-2 stats">
         <p style="font-size: 1rem;"> water metric Steps helps you in knowing the value of your water consumption syschronously , also alerting you, by sending notification. 

reading your water meter gives you an awareness of how much water you arw consuming and motivates you to reduce unnecessary waste</p>
          </div>
</div>
</div>



<div > 



<div class="slide row"> 
<div class="col-lg-4 col-sm-12  mt-2 mb-2 stats">
Problem Statement  

</div>
<div class="col-lg-4 col-sm-12  mt-2 mb-2 stats">
        <i class="fa fa-check" aria-hidden="true"></i>
				<div class="counting" data-count="5">0</div>
				<h5> Problems solved</h5>
			   </div> 

         <div class="col-lg-4 col-sm-12  mt-2 mb-2 stats">
         <p style="font-size: 1rem;"> 
        
The water is becoming more and more scarce and expensive, so this project will help our country by reducing water consumption and save money. 

Knowing the water bill value after a complete cycle can lead to high wasting compared to the utilization if they are directly aware of their consumption. 

Having an easy way to know water consumption and get alerts, is now a very essential need.  </div></div>
</div>


<div  > 
  <div class="slide row"> 
  <div class="col-lg-4 col-sm-12  mt-2 mb-2 stats">
  Project Aim and Objectives 
</div>
<div class="col-lg-4  col-sm-12  mt-2 mb-2 stats">
        <i class="fa fa-code" aria-hidden="true"></i>

				<div class="counting" data-count="10000">0</div>
				<h5>Lines of code</h5>
			   </div> 

         <div class="col-lg-4 col-sm-12  mt-2 mb-2 stats">
         <p style="font-size: 1rem;"> This project aims to understand current household water use behavior and water use patterns in Jordan city, to improve the efficiency of household water use, to encourage sustainable use and conservation of water resources, and to rationalize water consumption. 
  </div>
</div>
</div>
</section>
   

        

</div>

</section>
<script>
(function autoSlider(){

$('.slider .active').each(function () {
if (!$(this).is(':last-child')){
$(this).delay(500).fadeOut(5000, function () {
$(this).removeClass('active').next().addClass('active').fadeIn();
autoSlider();
}); 
}
else {
  $(this).delay(500).fadeOut(5000, function() {
    $(this).removeClass('active');
  $('.slider div').eq(0).addClass('active').fadeIn();
  autoSlider();
  })

}
})
}());

</script>
<script> 
// number count for stats, using jQuery animate

$('.counting').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 2000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  

});
</script> 
 @endsection                         





