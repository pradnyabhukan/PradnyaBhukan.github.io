<?php

$ID = '';
$row = 1;
if(isset($_POST["submit"]))
{
    $ID = $_POST["ID"];

    if (($handle = fopen("students.csv", "r")) !== FALSE) 
    {
        echo '<table border="1">';

        while (($data = fgetcsv($handle, ",")) !== FALSE) 
        {
            $num = count($data);
            if ($row == 1) {
                echo '<thead><tr>';
            }else{
                echo '<tr>';
            }

            for ($c=0; $c < $num ; $c++)
            {
                $value = $data[$c];
                
                if ($row == 1) 
                {
                    echo '<th>'.$value.'</th>';
                }
                else
                {
                    if ($ID == $value)
                    {
                        echo '<td>'.$value.'</td>';
                        $temp = $c;
                        for ($c=$temp+1; $c < $temp +9 ; $c++)
                        {
                            $value = $data[$c];
                            echo '<td>'.$value.'</td>';
                        }

                    }   
                }
                
            }
            if ($row == 1) {
                echo '</tr></thead><tbody>';
            }else{
                echo '</tr>';
            }
            $row++;
        }
    }
}

?>





<html>
  <title>Search students</title>
  <body>
      <form method = "post" >

      <div>
        <label>Student ID</label>
      <input type="number" name="ID" value = "<?php echo $ID?> /">
    </div>
    <div >
        <input type ="submit" name= "submit" value="submit" />
    </div>

        </form>
  </body>
</html>