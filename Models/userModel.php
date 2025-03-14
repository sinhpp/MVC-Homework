<?php

    class UserModel {
        private $db;

    /**
     * Constructor to initialize the database connection.
     */
    public function __construct()
    {
        $this->db = new Database("localhost", "rd_store_db", "root", "");
    }

    /**
     * Retrieves all products from the database.
     *
     * @return array An associative array of all products.
     */
    public function getUsers()
    {
        $result = $this->db->query("SELECT * FROM users");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Retrieves a product by its ID.
     *
     * @param int $id The ID of the product.
     * @return array An associative array of the product.
     */
    public function getUserById($id)
    {
        $result = $this->db->query("SELECT * FROM users WHERE id = :id", [':id' => $id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    
    }


    public function addUser ($userID, $name, $userEmail, $password, $userRole)
    {
    try {
        $this->db->query(
            "INSERT INTO users (id, name, email, passwordd, role) VALUES (:id, :name, :email, :passwordd, :role)",
            [
                ':id' => $userID, // Assuming userID is auto-incremented, you can pass null or omit it
                ':name' => $name,
                ':email' => $userEmail,
                ':passwordd' => $password,
                ':role' => $userRole,
            ]
        );
    } catch (PDOException $e) {
        echo "Error adding user: " . $e->getMessage();
    }
    }


    public function deleteUser($id)
    {
        try {
            $this->db->query("DELETE FROM users WHERE id = :id", [':id' => $id]);
        } catch (PDOException $e) {
            echo "Error deleting product: " . $e->getMessage();
        }
    }
}
?>