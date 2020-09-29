<?php include_once "header.php" ?>
<?php include_once "../Controller/index.php" ?>

<h1>Série TV ! </h1>
<div>
  <img class="soleil" src="soleil.jpg">
</div>
<div class=div1>
  <form action="traitement.php" method="post"><br>
    <label for="nom">Nom :</label><br>
    <input type="text" name="nom" id="nom"><br>
    <label for="nbepisode">Nombre d'épisodes :</label><br>
    <input type="text" name="nbepisode" id="nbepisode"><br>
    <label for="Synopsis">Synopsis :</label><br>
    <textarea name="Synopsis" id="Synopsis"></textarea><br>
    <label for="theme">Thème :</label><br>
    <select name="theme" id="theme">
      <?php 
      foreach ($themes as $theme)
      {
        echo "<option value='".$theme['id']."'>".$theme['nomT']."</option>";
      }
      ?>
    </select><br>
    <input type="button" value="Envoyer">
    <input type="button" value="Supprimer" onclick="self.location.href='../Controller/Supprimer.php'">
    <input type="button" value="Insérer" onclick="self.location.href='../Controller/Insérer.php'">
    <input type="button" value="Changer" onclick="self.location.href='../Controller/Changer.php'">
  </form>
</div>

<h1>Mes series</h1>
<table>
  <thead>
    <tr>
      <th>Nom Série</th>
      <th>Nombre d'épisodes</th>
      <th>Synopsis</th>
      <th>Thème</th>
    </tr>
    </thread>
  <tbody>
    <?php foreach ($series as $serie) { ?>
    <tr>
      <td><?php echo $serie['nomSerie'];?></td>
      <td><?php echo $serie['nbrEpisode'];?></td>
      <td><?php echo $serie['synopsis'];?></td>
      <td><?php echo $serie['nomTheme'];?></td>
    </tr>
    <?php } ?>
  <tbody>
</table>
<?php include_once "footer.php"?>





</body>

</html>