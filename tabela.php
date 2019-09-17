<?php
require_once 'class.Nbp.php';
$exchange = new Nbp;
$date = new Nbp;
$tableTd = new Nbp;
$checkstauts = new Nbp;
$difference = new Nbp;

//Ustawienie waluty
$exchange->setExchange('usd');
//sprawdzenie czy $_POST został przesłany
if ($_POST){
  //Pobranie daty oraz dzisiejszej daty by otrzymać różnicę w dniach
  $datetime1 = new DateTime($_POST['new_date']);
  $datetime2 = new DateTime(date('Y-m-d'));
  $interval = $datetime1->diff($datetime2);
  $check_year =  $interval->format('%a');
//Sprawdzenie czy nowa data jest więszka od aktualnej daty oraz sprawdzenie czy mineło 367 dni
  if ($_POST['new_date'] > date('Y-m-d')){
      echo '<script>alert("Nie można sprawdzić dla przyszłości !");</script>';
    }elseif($check_year > 367){
      echo '<script>alert("Nie można sprawdzić wstecz więcej niz 367 dni");</script>';
    }else{
        $date->setDate($_POST['new_date']);
    }
}else{
    $date->setDate('');
}
//Pobranie adresu z nbm wraz z nadanymi ustawieniami
$nbp = file_get_contents('http://api.nbp.pl/api/exchangerates/rates/C/'.$exchange ->getExchange().'/'.$date->getDate().'/'.date('Y-m-d').'?format=json');
//odkodowanie JSON'a
$dane = json_decode($nbp,TRUE);
//zmienna dla wierszy
$i=1;
//pętla która przechodzi przez wszystkie wiersze dla tabeli z pliku JSON
foreach ($dane["rates"] as $key => $value) {
  echo '<tr>';
  echo '<th scope="row">'.$i.'</th>';
  //Ustawienie danych dla Kursu kupna
  echo $tableTd->setTableTd($dane,'rates',$key,'bid');
  //Ustawienie danych dla Kursu sprzedaży
  echo $tableTd->setTableTd($dane,'rates',$key,'ask');
  //Sprawdzenie krusu, spadek lub wzrost ceny dla kupna i sprzedaży oraz wypisanie różnicy ceny między dniami
  echo $checkstauts->checkStatus($difference->difference($dane,'rates',$key,'bid'));
  echo $checkstauts->checkStatus($difference->difference($dane,'rates',$key,'ask'));
  //Wypisanie daty 
  echo $tableTd->setTableTd($dane,'rates',$key,'effectiveDate');
  echo '</tr>';
  $i++;
}