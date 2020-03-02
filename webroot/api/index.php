<?php
/**
 * This is a template php file for your countries search.
 * Use as you will, or start over. It's up to you.
 */
header('Content-Type: application/json');
//echo json_encode(['data' => ['Your data']]);

//country
//$country = "Korea";

//set country api url
//$country_url = 'https://restcountries.eu/rest/v2/name/' . urlencode($_GET[$country]);
//$country_url = 'https://restcountries.eu/rest/v2/name/Afghanistan';
$country = $_REQUEST["country"];
$countryName_url = "https://restcountries.eu/rest/v2/all?fields=name;alpha2Code;alpha3Code;region;subregion;population;languages";
$countryName_json=file_get_contents($countryName_url);
$countryName_array = json_decode($countryName_json, true);
$countryCode2_url =
$resultName = "";
$lang = "";
$numCont = 0;
if(!empty($country) and !empty($countryName_array)) {
 $country = strtolower($country);
 $len = strlen($country);

 foreach ($countryName_array as $countryName) {
  echo $country;
  echo "<br>";
  echo substr($countryName['alpha2Code'], 0, $len);

  if (stristr($country, substr($countryName['name'], 0, $len)) or
      stristr($country, substr($countryName['alpha2Code'], 0, $len)) or
      stristr($country, substr($countryName['alpha3Code'], 0, $len))) {
   $numCont +=1;
   //echo $countryName['name'];
   if ($resultName === "") {
    $resultName = $countryName['name'];
    $resultAlpha2Code = $countryName['alpha2Code'];
    $resultAlpha3Code = $countryName['alpha3Code'];
    $resultRegion = $countryName['region'];
    $resultSubregion = $countryName['subregion'];
    $resultPopulation = $countryName['population'];
    $resultLanguagesArray = $countryName['languages'];
    foreach($resultLanguagesArray as $language){
     if($lang === ""){
      $lang = $language['name'];
     } else{
      $otherLang = $language['name'];
      $lang .= $otherLang;
     }
    }
   } else {
    $otherName = $countryName['name'];
    $otherAlpha2Code = $countryName['alpha2Code'];
    $otherAlpha3Code = $countryName['alpha3Code'];
    $otherRegion = $countryName['region'];
    $otherSubregion = $countryName['subregion'];
    $otherPopulation = $countryName['population'];
    $otherLanguagesArray = $countryName['languages'];
    foreach($otherLanguagesArray as $language){
     if($lang === ""){
      $lang = $language['name'];
     } else{
      $otherLang = $language['name'];
      $lang .= $otherLang;
     }
    }
    //attach new information
    $resultName .= ", $otherName";
    $resultAlpha2Code .= ", $otherAlpha2Code";
    $resultAlpha3Code .= ", $otherAlpha3Code";
    $resultRegion .= ", $otherRegion";
    $resultSubregion .= ", $otherSubregion";
    $resultPopulation .= ", $otherPopulation";
    $resultLanguages .= ", $lang";

   }
  }
 }
}
echo "<br>";
echo "Name: ";
echo  $resultName === "" ? "No suggestion" :$resultName;
echo "<br>";
echo "Alpha Code2: ";
echo $resultAlpha2Code;
echo "<br>";
echo "Alpha Code3: ";
echo $resultAlpha3Code;
echo "<br>";
echo "Region: ";
echo $resultRegion;
echo "<br>";
echo "Subregion: ";
echo $resultSubregion;
echo "<br>";
echo "Population: ";
echo $resultPopulation;
echo "<br>";
echo "Languages: ";
echo $lang;
echo "<br><br>";
//echo "<br>";
echo "Number of Country: ";
echo $numCont;

/*if(!empty($_GET['country'])){
 $country_url = 'https://restcountries.eu/rest/v2/name/'.urlencode($_GET['country']);
 $country_json = file_get_contents($country_url);
 $country_array = json_decode($country_json, true);
 $countryName = $country_array[0]['name'];
 $alpha2Code = $country_array[0]['alpha2Code'];
 $alsph3Code = $country_array[0]['alpha3Code'];
 $flag = $country_array[0]['flag'];
 $region = $country_array[0]['region'];
 $subregion = $country_array[0]['subregion'];
 $languages = $country_array[0]['languages'];
 $flagData = file_get_contents($flag);*/
//$flagsrc = 'data: '.mime_content_type($flag).';base64,'.$flagData;
// $image = base64_encode(file_get_contents($flag));
// $find_string   = '<svg';
// $position = strpos($flagData, $find_string);

// $svg_file_new = substr($flagData, $position);

// echo "<div style='width:100%; height:100%;' >" . $svg_file_new . "</div>";

/*echo $countryName;
echo $alpha2Code;
echo $alsph3Code;
//echo $flagData;
echo '<img src="'.$flag.'"/>';
//echo '<img src="data:image/x-icon;base64,'.$image.'>';
echo $region;
echo $subregion;
echo $languages;*/



//call api
/*$json = file_get_contents($url);
$json = json_decode($json);
$fullName = $json->results[0]->geometry->location->name;
//$lng = $json->results[0]->geometry->location->lng;
//echo "Latitude: " . $lat . ", Longitude: " . $lng;
echo $fullName;*/


//$data = json_decode(file_get_contents('https://restcountries.eu/rest/v2/name/Afghanistan'));
//echo $data;
?>
