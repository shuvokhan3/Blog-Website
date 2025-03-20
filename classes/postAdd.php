<?php


include_once '../lib/Database.php';
include_once '../helpers/format.php';

class postAdd{
    private $db;
    private $fr;

    public function __construct()
    {
        $this->db = new Database();
        $this->fr = new Format();
    }

    public function AddPost($data , $file)
    {

        //get the value of text
        $title = $this->fr->validation($data['title']);
        $categoryId = $this->fr->validation($data['categoryId']);
        $description = $this->fr->validation($data['description']);
        $visibility = $this->fr->validation($data['visibility']);
        $tag = $this->fr->validation($data['tag']);


        //Work with images
        //image One
        //image permition
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $fileName = $file['imageOne']['name'];
        $fileSize = $file['imageOne']['size'];
        $file_tmp = $file['imageOne']['tmp_name'];
        $div = explode('.', $fileName);
        $file_ext = strtolower(end($div));
        //$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        //each every time uniqid() method generate a unique file name of every image
        $unique_image = uniqid() . '.' . $file_ext;
        $upload_image = "uploads/".$unique_image;


        //image Two
        //image permition
        $permited_two = array('jpg', 'jpeg', 'png', 'gif');
        $fileName_two = $file['imageTwo']['name'];
        $fileSize_two = $file['imageTwo']['size'];
        $file_tmp_two = $file['imageTwo']['tmp_name'];
        $div_two = explode('.', $fileName_two);
        $file_ext_two = strtolower(end($div_two));
        //$unique_image_two = substr(md5(time()), 0, 10).'.'.$file_ext_two;
        $unique_image_two = uniqid() . '.' . $file_ext_two;
        $upload_image_two = "uploads/".$unique_image_two;



        //image Three
        //image permition
        $permited_three = array('jpg', 'jpeg', 'png', 'gif');
        $fileName_three = $file['imageThree']['name'];
        $fileSize_three = $file['imageThree']['size'];
        $file_tmp_three = $file['imageThree']['tmp_name'];
        $div_three = explode('.', $fileName_three);
        $file_ext_three = strtolower(end($div_three));
        //$unique_image_three = substr(md5(time()), 0, 10).'.'.$file_ext_three;
        $unique_image_three = uniqid() . '.' . $file_ext_three;
        $upload_image_three = "uploads/".$unique_image_three;


        //validation
        if(empty($title) || empty($categoryId) || empty($description) || empty($visibility) || empty($tag)){
            return"All Field Must Be Filled";
        }elseif($fileSize > 1048567) {
            return "File Size Must Be less than 1 MB";
        }elseif ($fileSize_two > 1048567){
            return  "File Size Must Be less than 1 MB";
        }elseif ($fileSize_three > 1048567){
            return "File Size Must Be Less Than 1 MB";
        }elseif (!in_array($file_ext, $permited)){
            return "You Can Upload Only : - ". implode(',', $permited);
        }elseif (!in_array($file_ext_two, $permited)){
            return "You Can Upload Only : - ". implode(',', $permited_two);
        }elseif (!in_array($file_ext_three, $permited)){
            return "You Can Upload Only : - ". implode(',', $permited_three);
        }else{

            if(!empty($file['imageOne']['name'])){
                move_uploaded_file($file_tmp, $upload_image);
            }
            if(!empty($file['imageTwo']['name'])){
                move_uploaded_file($file_tmp_two, $upload_image_two);
            }
            if(!empty($file['imageThree']['name'])){
                move_uploaded_file($file_tmp_three, $upload_image_three);
            }

            $insertQuery = "INSERT INTO posts(title, categoryId, image1, image2,image3,description,post_visibility,tag) VALUES ('$title', '$categoryId', '$unique_image', '$unique_image_two', '$unique_image_three', '$description', '$visibility', '$tag')";
            $insertStatus = $this->db->insert($insertQuery);

            if($insertStatus){
                return  "Post Created Successfully";
            }else{
                return "Error Creating New Post";
            }


        }
    }
}