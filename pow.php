<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Kalkulator </title>
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

	<body>
        
         <?php
     
       
   $xml = simplexml_load_file("https://www.nbp.pl/kursy/xml/a124z200629.xml") or die("error");
        ?>
        <div class="container-left">
        <table class="table table-striped">
<tr>
    <td>Waluta </td>
            <td>Przelicznik </td>
    <td>Kod </td>
    <td>Kurs </td>
            </tr>
        
        
        <?php 
            
            
foreach($xml->children() as $waluty) {
    echo "<tr><td>", $waluty->nazwa_waluty . "</td> ";
    echo "<td>", $waluty->przelicznik . "</td> ";
    echo "<td>", $waluty->kod_waluty . "</td> ";
    echo "<td>", $waluty->kurs_sredni . "</td></tr> ";
}
        
        
        ?>
            </table></div>
        
        <div class="container-right">
            <form action="pow.php" method="post" class="form-calculator">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active btn_2">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Wykup
  </label>
  <label class="btn btn-secondary btn_2">
      <input type="radio" name="options" id="option2" autocomplete="off"><a href="sprzedaj.php">Sprzedaj</a>
                </label></div>
        
                
                   
               <p>Ilość pieniędzy<input type="number" class="form-control form-money" name="money" style="width:250px;" required/></p>        
            
 
                 
             
   <p>Zmień na:<select class="waluty form-control" name="waluty" id="waluta-select" style="width:250px;" required>
            <option value="">Wybierz walutę</option>
        <option value="THB" name="THB">Bat Tajlandia</option>
        <option value="USD" name="USD">Dolar amerykański</option>
        <option value="AUD" name="AUD">Dolar australijski</option>
        <option value="HKD" name="HKD">Dolar Hongkongu</option>
        <option value="CAD" name="CAD">Dolar kanadyjski</option>
        <option value="NZD" name="NZD">Dolar nowozelandzki</option>
        <option value="SGD" name="SGD">Dolar singapurski</option>
        <option value="EUR" name="EUR">Euro</option>
        <option value="HUF" name="HUF">Forint (Węgry)</option>
        <option value="CHF" name="CHF">Frank Szwajcarski</option>
        <option value="GBP" name="GBP">Funt Szterling</option>
        <option value="UAH" name="UAH">Hrywna(Ukraina)</option>
        <option value="JPY" name="JPY">Jen (Japonia)</option>
        <option value="CZK" name="CZK">Korona czeska</option>   
        <option value="DKK" name="DKK">Korona duńska</option>   
        <option value="ISK" name="ISK">Korona islandzka</option>
        <option value="NOK" name="NOK">Korona norweska</option>   
        <option value="SEK" name="SEK">Korona szwedzka</option>
        <option value="HRK" name="HRK">Kuna (Chorwacja)</option>
        <option value="RON" name="RON">Lej rumuński</option>
        <option value="BGN" name="BGN">Lew (Bułgaria)</option>
        <option value="TRY" name="TRY">Lira turecka</option>
        <option value="ILS" name="ILS">Nowy izraelski szekel</option>
        <option value="CLP" name="CLP">Peso chilijskie</option>
        <option value="PHP" name="PHP">Peso filipińskie</option>
        <option value="MXN" name="MXN">Peso meksykańskie</option>
        <option value="ZAR" name="ZAR">Rand(RPA)</option>
        <option value="BRL" name="BRL">Real (Brazylia)</option>
        <option value="MYR" name="MYR">Ringgit (Malezja)</option>
        <option value="RUB" name="RUB">Rubel rosyjski</option>
        <option value="IDR" name="IDR">Rupia indonezyjska</option>
        <option value="INR" name="INR">Rupia indyjska</option>           
        <option value="KRW" name="KRW">Won południowokoreański</option>
        <option value="CNY" nae="CNY">Yuan Renminbi (Chiny)</option>   
        <option value="XDR" name="XDR">SDR (MFW)</option>
           </select>
           <input type="submit" class="btn btn-outline-success" value="Oblicz"/></p>
                    
                       <?php
             @($waluta = $_POST['waluty']);
             @($money = $_POST['money']);
                @($przemien = $_POST['przemien']);
                
                
            
                   
               foreach($xml->children() as $waluty) {
                   if ($waluta == $waluty->kod_waluty) {
                       $kurs = $waluty->kurs_sredni;
                       $kurs_2 = (float) str_replace(',', '.', $kurs);
                       
                       
                       echo "Ilość pieniędzy: ", bcdiv($money, $kurs_2, 2),  " ", $waluty->kod_waluty;
                       
                   }
               }
              
                    
            
            
            ?>
            
                    
                    
                    
                    
                
                
                
                
                </form>
            
         
            
            
            
        </div>
    <style>
        * {
            
        }
        .container-right {
            float:right;
            width: 50%;
            overflow: hidden;
            background-attachment: fixed;
            
        }
        
        .container-left {
            float:left;
            width: 50%;
            clear: both;
            overflow: hidden;
            
        }
        .btn {
            margin-top: 20px;
            width: 200px;
            margin-bottom: 30px;
            margin-left: 25px;
        }
        
        .form-calculator {
            margin-left: 35%;
            background-attachment: fixed;
        }
        .h {
           text-align: center; 
        }
        
        .btn_2 {
            width: 100px;
            margin-left: 25px;
        }
    
        a {
            text-decoration: none;
            color:white;
        }
        
        a:hover {
            text-decoration: none;
            color:white;
        }
    </style>    
</body>
</html>
