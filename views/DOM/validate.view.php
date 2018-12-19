<!-- The message styling -->
<link rel="stylesheet" href="/views/style/standard.css" />
<?php
  if($group->validate()){
?>
<link rel="stylesheet" href="/views/style/success.css" />
<script src="/lib/snowstorm.min.js"></script>
<?php
  }else{
?>
<link rel="stylesheet" href="/views/style/failed.css" />
<?php
  }
?>

<body id="disco" class="switch">
  <div class="er_message" style="margin: 50px auto;">
    <h1><?= $message->getText(); ?></h1>
  </div>

  <?php if($group->validate()){ ?>
  <audio autoplay>
    <source src="/assets/applause.mp3" type="audio/mpeg">
  </audio>

  <div class="er_message" style="margin: 300px auto;">
    <h1><?= $merryChristmas->getText(); ?></h1>
  </div>
<?php }else{ ?>
  <audio autoplay>
    <source src="/assets/fail.mp3" type="audio/mpeg">
  </audio>
<?php } ?>
</body>


<!-- JQUERY lib and function dance() to let the screen switch backgrounds -->
<script src="/lib/jquery.min.js"></script>
<script>
  var i = 0;
  var dance = function()
  {
    if($("#disco").hasClass("switch")){
      $("#disco").css({"background": "white", "color": "black"});
      $("#disco").removeClass("switch");
    }else{
      $("#disco").removeAttr("style");
      $("#disco").addClass("switch");
    }

    if(++i === 10){
      window.clearInterval(dancer);
    }
  }
  var dancer = setInterval(dance, 300);
</script>

<!-- script with function to center a item verticaly -->
<script>
  function centerY(item)
  {
    let itemHeight = $("#"+item).outerHeight();
    let windowHeight = $(window).outerHeight();
    let marge = (windowHeight/2) - (itemHeight/2);
    $("#"+item).css({"margin-top": marge+"px"});
  }
  centerY("centerMe");
</script>
