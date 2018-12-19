<!-- Including standard css -->
<link rel="stylesheet" href="/views/style/standard.css">

<!-- Including the home css -->
<link rel="stylesheet" href="/views/style/home.css">


<!-- TextArea for messaging the clue -->
<div class="er_textualDiv">
  <h1>Jullie hebben 3 codes veroverd!<br>Voer nu een 3 cijferig antwoord in.<br>
Hint: denk verticaal!</h1>
</div>

<!-- one form with 4 inpout fields, each asking 1 number -->
<form id="centerMe" class="er_forms" action="/validate" method="POST">
  <input type="text" name="groupName" placeholder="Groep" required />
  <table>
    <tr class="no-hover">
      <td><input id="nr1" type="number" required name="nr1" placeholder="0" min="0" value="0" /></td>
      <td><input id="nr2" type="number" required name="nr2" placeholder="0" min="0" value="0" /></td>
      <td><input id="nr3" type="number" required name="nr3" placeholder="0" min="0" value="0" /></td>
    </tr>
  </table>
  <input type="submit" value="bevestig">
</form>






<!-- Including jquery -->
<script src="/lib/jquery.min.js"></script>


<!-- JS to center the forms div -->
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


<!-- JS to validate the input fields in such a way only one number is allowed -->
<script>

  var nr1 = document.getElementById('nr1');
  var nr2 = document.getElementById('nr2');
  var nr3 = document.getElementById('nr3');

  nr1.onkeyup = function()
  {
    validate(nr1);
  }

  nr2.onkeyup = function()
  {
    validate(nr2);
  }

  nr3.onkeyup = function()
  {
    validate(nr3);
  }

  // this function will do something when the input is longer than 1 character
  var validate = function(input)
  {
    let value = input.value;
    if(value.length > 1){
      value = value.substr(1);
      input.value = value;
    }
  }

</script>
