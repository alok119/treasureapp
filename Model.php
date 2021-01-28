<?php


Class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "churchadmin";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        }
        catch (Exception $e){
            echo "db error" . $e->getMessage();
        }

    }

    public function fetch_band(){
        $data = null;

        $query = 'SELECT * FROM chart_of_account';
        if ($sql = $this->conn->query($query)){
            while ( $row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetch_session(){
        $data = null;

        $query = 'SELECT * FROM sessions_tbl';
        if ($sql = $this->conn->query($query)){
            while ( $row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetch_Subband($other_payment){
        $data = null;

        $query = "SELECT * FROM chartnotes where ChartID = '$other_payment'";
        if ($sql = $this->conn->query($query)){
            while ( $row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetch_Categories($other_payment_sub){
        $data = null;
        if ($other_payment_sub === 'Band_Savings'){
            $query = "SELECT * FROM band_tbl";
            if ($sql = $this->conn->query($query)){
                while ( $row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }
        }
        elseif ($other_payment_sub === 'Committees_Savings'){
            $query = "SELECT * FROM commitee_tbl";
            if ($sql = $this->conn->query($query)){
                while ( $row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }
        }
        elseif ($other_payment_sub === 'Groups_Funds_in_Treasury'){
            $query = "SELECT * FROM group_tbl";
            if ($sql = $this->conn->query($query)){
                while ( $row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }
        }

        return $data;
    }

    public function calculate_Age($currentValue){
        $data = null;
        //date in mm/dd/yyyy format; or it can be in other formats as well
        $birthDate = $currentValue;
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $data = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        if ($data < 70 ){
            $row = 9000;
        }
        elseif ($data > 70 && $data < 80){
            $row = 15000;
        }
        else{
            $row = 25000;
        }
        return $row ;
    }
}