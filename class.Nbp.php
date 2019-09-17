<?php
/**
 * notowania kursu kupna i sprzedaży USD
 * od podanej daty do Dziś
 * różnica wartości kupna i sprzedaży pomiędzy dniami
 * 
 * Bid – przeliczony kurs kupna waluty (dotyczy tabeli C)
 * Ask – przeliczony kurs sprzedaży waluty (dotyczy tabeli C)
 */
class Nbp{
    public $exchange;
    public $date;
    public $tabletd;
    public $dane;
    public $rates;
    public $key;
    public $value;

    function setExchange($exchange ='usd')
    {
        $this->exchange = $exchange;
    }
    function getExchange()
    {
        return $this->exchange;
    }
    function setDate($date)
    {
        $this->date = $date;
    }
    function getDate()
    {
        return $this->date;
    }
    function setTableTd($dane,$rates, $key,$value)
    {
        $this->tableTd = '<td>'.$dane[$rates][$key][$value].'</td>';
        return $this->tableTd;
    }
    function checkStatus($value)
    {
        $this->value = $value;
        if ($this->value > 0){
            echo '<td class="text-success">&#8593; '.$this->value.'</td>';
        }elseif($this->value == 0){
            echo '<td>-</td>';
        }else{
            echo '<td class="text-danger">&#8595; '.$this->value.'</td>';
        }
    }
    function difference($dane,$rates, $key,$value)
    {
        $difference = $key - 1;
        if ($difference < 0){
          $difference = $key;
        }
        $difference_value = $dane[$rates][$key][$value] - $dane[$rates][$difference][$value];
        $difference_value = number_format($difference_value, 4);
        return $difference_value ;
      }

}


