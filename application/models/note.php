<?php
class Note extends CI_Model{
    function get_by_id($id){
        return $this->db->query("SELECT * FROM notes WHERE id = ?", array($id))->row_array();
    }
    function get_last_note(){
        return $this->db->query("SELECT * FROM notes ORDER BY updated_at DESC LIMIT 1")->row_array();
    }
    function get_all_notes(){
        return $this->db->query("SELECT * FROM notes")->result_array();
    }
    function add_note($title)
    {
        $query = "INSERT INTO notes (title, description, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($title,"", date("Y-m-d, H:i:s") , date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }
    function delete_by_id($id){
       return $this->db->query("DELETE FROM notes WHERE id=?", array($id));
     }
    function update_title($title, $id){
        return $this->db->query("UPDATE notes SET title=?, updated_at=? WHERE id=?",array($title,date("Y-m-d, H:i:s"),$id));
    }
    function update_description($description, $id){
        return $this->db->query("UPDATE notes SET description=?, updated_at=? WHERE id=?",array($description,date("Y-m-d, H:i:s"),$id));
    }

}
?>