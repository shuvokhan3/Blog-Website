<?php
   

   //this Formate class help me to formate user data.When user give data this time it contain may uneccery things.using this Format class i formate this data.

   class Format{

    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        // echo "Data Formation Sucessfully From (format.php)";
        return $data;
    }

   }

?>