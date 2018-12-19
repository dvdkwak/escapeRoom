<!-- Bootstrap 4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- Style link for the standard css -->
<link rel="styleSheet" href="/views/style/standard.css">

<!-- Including the header -->
<?php include_once ROOT."views/DOM/elements/header.view.php"; ?>



<!-- Section in which all magic happens -->
<section class="home_container">

  <section class="my_card">
    <h1 class="title">Aanmaken nieuwe groep</h1><hr>
    <form action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Naam groep</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Naam groep" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Code 1</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Code 1" name="code1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Code 2</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Code 2" name="code2">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Code 3</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Code 3" name="code3">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Antwoord</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Antwoord" name="answer">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Cijfer slot</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cijfer slot" name="output">
      </div>
      <button type="submit" class="btn btn-primary float-right" name="save">Toevoegen</button>
    </form>
  </section>

  <section class="my_card">
    <h1 class="title">Overzicht bestaande groepen</h1><br><h1 class="title"><i>Klikken is verwijderen!</i></h1><hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Groeps naam</th>
          <th scope="col">Sleutel</th>
        </tr>
      </thead>
      <tbody>
        <?php

        // foreach object in the groups array create a table row
        if(empty($groups)){
          echo "<tr class='no-hover'><td colspan='7'><i>Er zijn nog geen groepen aangemaakt.</i></td></tr>";
        }else{
          foreach($groups AS $group){
            echo "<tr>";
              echo "<td><a href='/remove/$group->id'>";
                echo $group->getName();
              echo "</td>";
              echo "<td><a href='/remove/$group->id'>";
                echo $group->getOutput();
              echo "</td>";
            echo "</tr>";
          }
        }

        ?>
      </tbody>
    </table>
  </section>


  <?php

  // for each group create a section in which all the codes are ordere nicely :3
  foreach($groups as $group){
    echo "<section class='my_card'>";
      echo "<h1 class='title'>Groep: ".$group->getName()."</h1><hr>";

      // here we split all 4 codes in seperate numbers so we can put each number in a cell
      $code1 = $group->getCode(1);
      $code2 = $group->getCode(2);
      $code3 = $group->getCode(3);

      $code1 = str_split($code1);
      $code2 = str_split($code2);
      $code3 = str_split($code3);

      ?>
        <table class="table">
          <tbody>
            <tr>
              <td>Code 1</td>
              <td class="green"><?= $code1[0] ?></td>
              <td><?= $code1[1] ?></td>
              <td><?= $code1[2] ?></td>
              <td><?= $code1[3] ?></td>
            </tr>
            <tr>
              <td>Code 2</td>
              <td class="green"><?= $code2[0] ?></td>
              <td><?= $code2[1] ?></td>
              <td><?= $code2[2] ?></td>
              <td><?= $code2[3] ?></td>
            </tr>
            <tr>
              <td>Code 3</td>
              <td class="green"><?= $code3[0] ?></td>
              <td><?= $code3[1] ?></td>
              <td><?= $code3[2] ?></td>
              <td><?= $code3[3] ?></td>
            </tr>
          </tbody>
        </table>
        <h1 class='title'>Antwoord:<b> <?= $group->getAnswer(); ?></b></h1><br>
        <h1 class="title">Sleutel:<b> <?= $group->getOutput() ?></b></h1>
      <?php
    echo "</section>";
  }

  ?>


</section>
