<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>FITNESS</title>
      <link rel="stylesheet" type="text/css" href="../../styles/formStyle.scss"/>
      <script defer src="../../errorsCheck/errorsCheck.js"></script>
  </head>
  <body>
    <form id = "form" action="/mainManager/addPass/addPassAction.php" method="post">
      <label>Длительность</label><br>
      <input id = "dur" type="number" name="duration" required = "required" min = "1" max = "60"/><br>

      <label>Время посещения</label><br>
      <div id = "error" class="errorMassege"></div>
      <div class="timeBlocks">
        <p><input id = "start" type="time" name="time_start" list="time-list"></p>
        <datalist id="time-list">
          <option value="10:00">
          <option value="11:00">
          <option value="12:00">
          <option value="13:00">
          <option value="14:00">
          <option value="15:00">
          <option value="16:00">
          <option value="17:00">
          <option value="18:00">
          <option value="19:00">
          <option value="20:00">
          <option value="21:00">
          <option value="22:00">
        </datalist> 
        <p><input id = "end" type="time" name="time_end" list="time-list"></p>
        <datalist id="time-list">
          <option value="10:00">
          <option value="11:00">
          <option value="12:00">
          <option value="13:00">
          <option value="14:00">
          <option value="15:00">
          <option value="16:00">
          <option value="17:00">
          <option value="18:00">
          <option value="19:00">
          <option value="20:00">
          <option value="21:00">
          <option value="22:00">
        </datalist>
      </div> 

      <label id="cost"> Стоимость</label><br>
      <input type="number" name="cost" required = "required" min = "1" max = "100000"/><br>
      
      <button type="submit">Добавить</button>
      <a href="../typesOfPasses.php" target="_self" class="button">Отмена</a>
    </form>
  </body>
</html>