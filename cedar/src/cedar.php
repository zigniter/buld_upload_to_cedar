<?php
// configurtion infomation based on your cedar account
include("config.inc");
if (move_uploaded_file($_FILES["source_file"]["tmp_name"], $target_file)) {
  echo "The file ". htmlspecialchars( basename( $_FILES["source_file"]["name"])). " has been uploaded.";
} else {
  echo "Sorry, there was an error uploading your file.";
}
echo "Target Dir: ".$target_file;
//read csv and concvert it to array
function readCsv($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename)) {
        echo "Data unreadble";
        return FALSE;
    }
    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}

//Field names and values
function getFieldValues($data) {

  $data_values= "";  $schema_name="";

  foreach($data as $key => $value ) {
    $field_name='"'.$key.'"';
    $field_value='"'.$value.'"';
    $data_values=$data_values.$field_name.': {"@value": '.$field_value.'} , ';
    if(!$schema_name)
       $schema_name=$value;
    }
    $datavalues[0] = $schema_name;
    $datavalues[1] = $data_values;

  return $datavalues;
}

$inputData=readCsv($target_file);

foreach($inputData as $data ) {
  $data_values=getFieldValues($data);

  if($data_values[0])
      $instance_name='"Tigrai Covid '.$data_values[0].'"';
  else
      $instance_name="Tigrai Covid";

  $field_properties=$_POST["field_properties"];
  $isBasedOn=$_POST["isBasedOn"];
  $description='"'.$_POST["description"].'"';
  $user_id=$_POST["user_id"];
  $template_id=$_POST["user_id"];
  $user_id="https://metadatacenter.org/users/".$user_id;
  echo "<br/> user_id".$user_id;
  exit(1);
  /* echo "field_properties<br>"; 
  echo $field_properties;
  echo "isBasedOn<br>"; 
  echo $isBasedOn;
  echo "description<br>"; 
  echo $description;
  echo "createdBy<br>"; 
  echo $createdBy;
  echo "modifiedBy<br>"; 
  echo $modifiedBy;*/
  $input = '{
   "@context": {
      "rdfs": "http://www.w3.org/2000/01/rdf-schema#",
      "xsd": "http://www.w3.org/2001/XMLSchema#",
      "pav": "http://purl.org/pav/",
      "schema": "http://schema.org/",
      "oslc": "http://open-services.net/ns/core#",
      "skos": "http://www.w3.org/2004/02/skos/core#",
      "rdfs:label": {
        "@type": "xsd:string"
      },
      "schema:isBasedOn": {
        "@type": "@id"
      },
      "schema:name": {
        "@type": "xsd:string"
      },
      "schema:description": {
        "@type": "xsd:string"
      },
      "pav:derivedFrom": {
        "@type": "@id"
      },
      "pav:createdOn": {
        "@type": "xsd:dateTime"
      },
      "pav:createdBy": {
        "@type": "@id"
      },
      "pav:lastUpdatedOn": {
        "@type": "xsd:dateTime"
      },
      "oslc:modifiedBy": {
        "@type": "@id"
      },
      "skos:notation": {
        "@type": "xsd:string"
      },
      '.$field_properties.'
      },'.$data_values[1].'
      "schema:isBasedOn": '.$isBasedOn.',
      "schema:name": '.$instance_name.',
      "schema:description": '.$description.',
      "pav:createdBy": '.$user_id.',
      "oslc:modifiedBy": '.$user_id.' 
    }';

if($secureurl)
  $secureurl ="https://resource.metadatacenter.org/template-instances?folder_id=".$folder_id."";
else
  $secureurl ="https://resource.metadatacenter.org/template-instances?folder_id=https%3A%2F%2Frepo.metadatacenter.org%2Ffolders%2F7a1773fd-d187-46b8-aebf-c7b6955a44f5";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $secureurl);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: '.$apiKey,
      'Content-Type: application/json',
   ));

if(!$headers){
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: apiKey '.$apiKey,
      ));
  }else{
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: apiKey '.$apiKey,
        $headers
      ));
  }

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, 1);
echo "<br/> <br/>".$input;
curl_setopt($curl, CURLOPT_POSTFIELDS, $input);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);              
$uploaded = curl_exec($curl);

curl_close($curl);

}

if($uploaded)
    echo "<center><br/>Successfully uploaded ".count($inputData)." records to CEDAR!</center>";
?>



