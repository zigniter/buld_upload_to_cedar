<?php
if(!$sourcefile)
   $apiKey=$_POST['token'];
else
    $apiKey="6ae1ec5dc17bac9e6b1f29b528c6c5dd9c46f50279c94f7cfe1a45f41e04cdd4";

if(!$sourcefile){
   $sourcefile =$_POST['source_file']; 
   $target_dir = "../data/";
   $target_file = $target_dir . basename($_FILES["source_file"]["name"]);
}
else
   $sourcefile = "/home/sam/Desktop/datasource.csv";

if(!$sourcefile)
   $folder_id=$_POST['folder_id'];
else
    $folder_id="https%3A%2F%2Frepo.metadatacenter.org%2Ffolders%2F7a1773fd-d187-46b8-aebf-c7b6955a44f5";
