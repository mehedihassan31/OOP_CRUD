<?php
include "auth/Connect.php";

class CRUD extends DataBase
{

    public function insert($data = array(), $table_name)
    {


        $columns = implode(", ", array_keys($data));


        $escaped_values = array_map(NULL, array_values($data));

        $values = implode("','", $escaped_values);
        $value="'$values'";

        $sql = "INSERT INTO `$table_name`($columns) VALUES ($value)";




                $details = mysqli_query($this->conn, $sql);

                if ($details) {
                    echo "<script>alert('Record Successfully')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                }

        echo "<script>window.open('','_self')</script>";

    }



    public function fetch($table_name)
    {
       // $data = null;

        $query = "SELECT * FROM `$table_name`";

         $data= mysqli_query($this->conn, $query);
         return $data;

    }

  public function delete($table_name,$id,$filepath_img,$filepath_pdf)
  {


            $delete ="DELETE FROM `$table_name` WHERE id='$id'";

            $dquery =mysqli_query($this->conn,$delete);

            unlink($filepath_img);
            unlink($filepath_pdf);

      if($dquery)
      {

          echo "<script>alert('Record Deleted')</script>";
      }

            echo "<script>window.open('view.php','_self')</script>";



  }


  public function viewId($id,$table_name){





      $sqlV = "SELECT * FROM `$table_name` WHERE id = '$id'";

        $data=mysqli_query($this->conn,$sqlV);

      foreach ($data as $value) {
          return $value;
      }


  }



  public function update($id,$data=array(),$table_name,$img_old,$filepdf_old,$image,$file){

      $valueSets = array();

      foreach($data as $key => $value) {
          $valueSets[] = $key . " = '" . $value . "'";
      }


      $Usql = "UPDATE `$table_name` SET ". join(",",$valueSets) . " WHERE id = '$id'";

      $update=mysqli_query($this->conn, $Usql);



      if ($update) {
          if(!empty($image) && !empty($file)) {
              unlink($img_old);
              unlink($filepdf_old);
              echo "<script>alert('Update Successfully')</script>";
              echo "<script>window.open('update.php?id=$id&tab=$table_name','_self')</script>";
          }

      } else {
          echo "Error: " . $Usql . "<br>" . mysqli_error($this->conn);
      }



  }








}







?>