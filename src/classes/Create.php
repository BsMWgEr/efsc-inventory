<?php

class Create extends SQLOp
{
    // class variables
    protected array $data;

    public function set_data($inputData)
    {
        $this -> data = $inputData;
    }

    public function insert_mouse() {

        $mouse_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO mice (mouse_id, name, `condition`, cost, location) VALUES (:mouse_id, :name, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':mouse_id', $mouse_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }

    }

    public function insert_accessory()
    {
        $acc_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $type = $this -> data['insert-type'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO accessories (acc_id, name, type, `condition`, cost, location) VALUES (:acc_id, :name, :type, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':acc_id', $acc_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':type', $type);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function insert_keyboard()
    {
        $kb_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO keyboards (kb_id, name, `condition`, cost, location) VALUES (:kb_id, :name, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':kb_id', $kb_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function insert_monitor()
    {
        $monitor_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];
        $monitorSize = $this -> data['addMonitorSize'];

        $this -> SQLstring = "INSERT INTO monitors (monitor_id, name, `condition`, cost, location, size) VALUES (:monitor_id, :name, :condition, :cost, :location, :size)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':monitor_id', $monitor_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);
        $this -> statement -> bindParam(':size', $monitorSize);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function insert_motherboard()
    {
        $mobo_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $size = $this -> data['addMotherboardSize'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO motherboards (mobo_id, name, size, `condition`, cost, location) VALUES (:mobo_id, :name, :size, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':mobo_id', $mobo_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':size', $size);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }

    }

    public function insert_gpu()
    {
        $gpu_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO graphicscards (gpu_id, name, `condition`, cost, location) VALUES (:gpu_id, :name, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':gpu_id', $gpu_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => ["gpu_id" => $gpu_id, "name" => $name, "condition" => $condition, "cost" => $cost, "location" => $location]]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }
    }

    public function insert_ram()
    {
        $ram_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $type = $this -> data['type'];
        $speed = $this -> data['speed'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO ramsticks (ram_id, name, type, speed, `condition`, cost, location) VALUES (:ram_id, :name, :type, :speed, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':ram_id', $ram_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':type', $type);
        $this -> statement -> bindParam(':speed', $speed);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }

    }

    public function insert_psu()
    {
        $psu_id = $this -> data['p_id'];
        $name = $this -> data['name'];
        $wattage = $this -> data['wattage'];
        $modular = $this -> data['modular'];
        $condition = $this -> data['condition'];
        $cost = $this -> data['cost'];
        $location = $this -> data['location'];

        $this -> SQLstring = "INSERT INTO powersupplies (psu_id, name, wattage, modular, `condition`, cost, location) VALUES (:psu_id, :name, :wattage, :modular, :condition, :cost, :location)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':psu_id', $psu_id);
        $this -> statement -> bindParam(':name', $name);
        $this -> statement -> bindParam(':wattage', $wattage);
        $this -> statement -> bindParam(':modular', $modular);
        $this -> statement -> bindParam(':condition', $condition);
        $this -> statement -> bindParam(':cost', $cost);
        $this -> statement -> bindParam(':location', $location);

        try {
            if($this->statement->execute()) {
                return json_encode(["success" => true, "message" => "User updated successfully"]);
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            return json_encode(["failure" => true, "message" => $error_message]);
        }
    }

}
