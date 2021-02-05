{
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
    "PatientID": "https://schema.metadatacenter.org/properties/e5891687-6485-4ae2-b441-fdd36fd2011e",
    "Sex": "https://schema.metadatacenter.org/properties/56984402-f544-4750-91f6-b7bb3a9e2d62",
    "Age": "https://schema.metadatacenter.org/properties/b5fdcae3-62f5-416a-ae24-b53150e25772",
    "Travel History": "https://schema.metadatacenter.org/properties/d5386be5-a85f-408c-96f7-957083a2f7b3",
    "Sample Type": "https://schema.metadatacenter.org/properties/0f5378bf-356c-4c85-8f86-2f388a40d5c3",
    "Test Result": "https://schema.metadatacenter.org/properties/c2289c42-6373-43f8-9d6c-f66b5276cafb",
    "Cough": "https://schema.metadatacenter.org/properties/19e1d6d4-6f32-4209-852f-b054051c1442",
    "Exposed": "https://schema.metadatacenter.org/properties/1c98a2db-6dee-48b2-9ef3-1db76462485a"
  },
  "PatientID": {
    "@value": "1"
  },
  "Sex": {
    "@value": "gender"
  },
  "Age": {
    "@value": "21"
  },
  "TravelHistory": {
    "@value": "none"
  },
  "SampleType": {
    "@value": "blood"
  },
  "TestResult": {
    "@value": "Negative"
  },
  "Cough": {
    "@value": "No"
  },
  "Exposed": {
    "@value": "Yes"
  },
  "schema:isBasedOn": "https://repo.metadatacenter.org/templates/fed67490-6095-488f-b4de-3871c700b929",
  "schema:name": "Copy of TG-COVID metadata",
  "schema:description": "",
  "pav:createdOn": "2021-01-28T03:46:13-08:00",
  "pav:createdBy": "https://metadatacenter.org/users/c14beb17-0e85-4e6e-9b74-706fe0566635",
  "pav:lastUpdatedOn": "2021-01-28T03:46:13-08:00",
  "oslc:modifiedBy": "https://metadatacenter.org/users/c14beb17-0e85-4e6e-9b74-706fe0566635"
}
$PatientID='"'.$value['PatientID'].'"';
	$Sex='"'.$value['Sex'].'"';
    $Age='"'.$value['Age'].'"';
    $TravelHistory='"'.$value['TravelHistory'].'"';
	$SampleType='"'.$value['SampleType'].'"';
    $TestResult='"'.$value['TestResult'].'"';
    $Cough='"'.$value['Cough'].'"';
    $Exposed='"'.$value['Exposed'].'"';