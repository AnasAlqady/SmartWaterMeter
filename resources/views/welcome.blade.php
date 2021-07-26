<script src="https://jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="slider">
<div class="active" > 
<div style="display: flex; flex-direction:row;justify-content: space-around; place-items: center;"> 
<img src="image/water1.gif"  style="width: 20rem"> 
 <h1> "لا تسرف في الماء ولو كنت على نهر جاري " </h4>
</div></div> 

<div > 
<div class="slide"> 
<img src="image/water-84.gif"  style="width: 20rem"> 
 <h1> " sssssssلا تسرف في الماء ولو كنت على نهر جاري " </h4>
</div>
</div>
<div  > 
  <div class="slide"> 
<img src="image/water-84.gif"  style="width: 20rem"> 
 <h1> " sssssssلا تسرف في الماء ولو كنت على نهر جاري " </h4>
</div>
</div>
</div>



<style>
.slide {
  display: flex ;
  flex-direction:row;
  place-items: center;
  justify-content: space-around
}
.slider > div{ 
  display: none;
}
.slider .active{ 
display: block;
}
</style>

<script>
(function autoSlider(){

$('.slider .active').each(function () {
if (!$(this).is(':last-child')){
$(this).delay(1000).fadeOut(1000, function () {
$(this).removeClass('active').next().addClass('active').fadeIn();
autoSlider();
}); 
}
else {
  $(this).delay(1000).fadeOut(1000, function() {
    $(this).removeClass('active');
  $('.slider div').eq(0).addClass('active').fadeIn();
  autoSlider();
  })

}
})
}());

</script> 
