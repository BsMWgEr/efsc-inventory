<?php

class Update extends SQLOp{// updateOp class intended to update tables
    // class variables
    protected $data;

    public function set_data($inputData)
    {
        $this -> data = $inputData;
    }

    public function update_mouse() {

        $mouse_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE mice SET mouse_id = :mouse_id, name = :name, `condition` = :condition, cost = :cost, location = :location WHERE mouse_id = :mouse_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':mouse_id', $mouse_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record update successfully."]);
        }
        else {
            echo json_encode(["success" => false, "message" => "Update failure."]);
        }

    }

    public function update_accessory()
    {
        $acc_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $type = $this -> data['type'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE accessories SET acc_id = :acc_id, name = :name, type = :type, `condition` = :condition, cost = :cost, location = :location WHERE acc_id = :acc_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':acc_id', $acc_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':type', $type);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        }
        else{
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
    }

    public function update_keyboard()
    {
        $kb_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE keyboards SET kb_id = :kb_id, name = :name, `condition` = :condition, cost = :cost, location = :location WHERE kb_id = :kb_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':kb_id', $kb_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        }
        else{
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
    }

    public function update_monitor()
    {
        $monitor_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];
        $monitorSize = $this -> data['addMonitorSize'];

        $this -> SQLstring = "UPDATE monitors SET monitor_id = :monitor_id, name = :name, `condition` = :condition, cost = :cost, location = :location, size = :size WHERE monitor_id = :monitor_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':monitor_id', $monitor_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);
        $this -> statement -> bindParam(':size', $monitorSize);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
    }

    public function update_motherboard()
    {
        $mobo_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $size = $this -> data['addMotherboardSize'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE motherboards SET mobo_id = :mobo_id, name = :name, size = :size, `condition` = :condition, cost = :cost, location = :location WHERE mobo_id = :mobo_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':mobo_id', $mobo_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':size', $size);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }

    }

    public function update_gpu()
    {
        $gpu_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE graphicscards SET gpu_id = :gpu_id, name = :name, `condition` = :condition, cost = :cost, location = :location WHERE gpu_id = :gpu_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':gpu_id', $gpu_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
    }

    public function update_ram()
    {
        $ram_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $type = $this -> data['type'];
        $speed = $this -> data['speed'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE ramsticks SET ram_id = :ram_id, name = :name, type = :type, speed = :speed, `condition` = :condition, cost = :cost, location = :location WHERE ram_id = :ram_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':ram_id', $ram_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':type', $type);
        $this -> statement -> bindParam(':speed', $speed);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if ($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }

    }

    public function update_psu()
    {
        $psu_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $wattage = $this -> data['wattage'];
        $modular = $this -> data['modular'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "UPDATE powersupplies SET psu_id = :psu_id, name = :name, wattage = :wattage, modular = :modular, `condition` = :condition, cost = :cost, location = :location WHERE psu_id = :psu_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':psu_id', $psu_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':wattage', $wattage);
        $this -> statement -> bindParam(':modular', $modular);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        if($this -> statement -> execute()){
            echo json_encode(["success" => true, "message" => "Record inserted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Insertion failure."]);
        }
    }
}
