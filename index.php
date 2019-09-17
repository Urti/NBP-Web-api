<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Rekrutacja PHP Developer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap_4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
  <script src="bootstrap_4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <h1 class="text-center">NBP</h1>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <p>Notowania kursu kupna i sprzedaży USD od podanej daty do bieżącego dnia wraz z różnicą wartości (kupna i sprzedaży) pomiędzy dniami.</p>
        <p>Maxymalne sprawdzenie dopuscza 367 dni wstecz</p>
        <div class="alert alert-info" role="alert">
          <p> Porszę podać datę od której ma być pokazana tabela domyślnie zostaje wyświetlony dzisiejszy kurs</p>
        </div>
        <form class="text-center" action="" method="post">
          <div class="form-group">
              <label for="exampleInputEmail1">Podaj datę</label>
              <input type="date" name="new_date" value="<?php echo $_POST["new_date"]; ?>" />
              <button type="submit" class="btn btn-primary">Wyślij</button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kurs kupna</th>
                <th scope="col">Kurs sprzedaży</th>
                <th scope="col">Różnica kupna</th>
                <th scope="col">Różnica sprzedaży</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
              <?php require_once 'tabela.php' ?>         
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-sm-3"></div>
    </div>
  </div>
</div>
</body>
</html>