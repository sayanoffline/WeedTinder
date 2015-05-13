 <?php function country_dropdown($name="country", $top_countries=array()){
  $countries = array(
        "AF"=>"Afghanistan",
        "AL"=>"Albania",
        "DZ"=>"Algeria",
        "AD"=>"Andorra",
        "AO"=>"Angola",
        "AI"=>"Anguilla",
        "AQ"=>"Antarctica",
// list of countries continues until Zimbabwe
        "ZW"=>"Zimbabwe"
        );
  $html = "<select name='{$name}'>";
  if(!empty($top_countries)){
    foreach($top_countries as $value){
      if(array_key_exists($value, $countries)){
        $html .= "<option value='{$value}'>{$countries[$value]}</option>";
      }
    }
    $html .= "<option>----------</option>";
  }
  foreach($countries as $key => $country){
    $html .= "<option value='{$key}'>{$country}</option>";
  }
  $html .= "</select>";
  return $html;
}  ?>
