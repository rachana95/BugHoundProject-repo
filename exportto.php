<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<html>
    <head>
        <meta charset="UTF-8">
        <title>exporting tables</title>
    </head>
</html> 
<?php
    $table=$_POST['Table'];
    $Format=$_POST['exportType'];
    if($Format=='XML')
    {
        
        $filename = "export_xml_".$table.date("Y-m-d_H-i",time()).".xml";

        $db = mysqli_connect("localhost","root","","bughound");
        //Extract data to export to XML
        $sqlQuery = "SELECT * FROM `{$table}`" ;
        echo $table;
        if (!$result = $db->query($sqlQuery)) {
            throw new Exception(sprintf('Mysqli: (%d): %s', $mysql->errno, $mysql->error));
        }
        
        //Create new document 
        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        //$dom->appendChild(date("Y-m-d_H-i",time()));
        //add table in document 
        $table1 = $dom->appendChild($dom->createElement('table'));
        
        //add row in document 
        foreach($result as $row) {
            $data = $dom->createElement('row');
            $table1->appendChild($data);
        
            //add column in document 
            foreach($row as $name => $value) {
        
                $col = $dom->createElement('column', $value);
                $data->appendChild($col);
                $colattribute = $dom->createAttribute('name');
                // Value for the created attribute
                $colattribute->value = $name;
                $col->appendChild($colattribute);           
            }
        }
        
        
        
        $dom->formatOutput = true; // set the formatOutput attribute of domDocument to true 
        // save XML as string or file 
        $test1 = $dom->saveXML(); // put string in test1
        $dom->save($filename); // save as file
        $dom->save('xml/'.$filename);
        echo "File exported.";
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('Table Exported');";
        echo "</script>";
    }



    else if($Format=='ASCII')
    {
        $con = mysqli_connect("localhost","root");
     mysqli_select_db($con, "bughound");
     $varfile ="export_xml_".date("Y-m-d_H-i",time()).".txt";
        $test = "SELECT * FROM `{$table}` INTO OUTFILE 'C:/xampp/htdocs/BugHoundProject/{$table}.txt' CHARACTER SET utf8 FIELDS TERMINATED BY ','";
       
        $result = mysqli_query($con, $test);
    
     echo "<script language='javascript' type='text/javascript'>";
     echo "alert('Table Exported');";
     echo "</script>";
 
     
     
    }
     
?>