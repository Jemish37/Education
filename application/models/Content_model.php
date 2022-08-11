<?php



class Content_model extends CI_Model
{
    public function getAll()
    {
        return getRows("md5(id) as id, content_key, content_value","contents");
    }

    public function add($data)
    {
        if($data != "" && $data != []){
            if (count($data) == 1) {
                return insert('contents', $data);
            }else{
                return insert('contents', $data, "Multi");
            }
        }else{
            return 0;
        }     
    }

    public function delete($where)
    {
        if($where != ""){
            return delete("contents",$where);
        }else{
            return 0;
        }
    }
}
