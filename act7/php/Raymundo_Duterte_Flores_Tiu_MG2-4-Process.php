<?php

class Post{

    private $title;
    private $description;
    private $date_time;
    private $current_vote = 0;

    public function __construct($title, $description){
        $this->title = $title; 
        $this->description = $description; 
        $this->date_time = date("m/d/Y - h:i:s a");
    }
    public function set_title($title){
        $this->title = $title; 
    }
    public function get_title(){
        return $this->title;
    }
    public function set_description($description){
        $this->description = $description; 
    }
    public function get_description(){
        return $this->description;
    }
	
    public function get_date_time(){
        return $this->date_time;
    }
	
    public function get_current_vote(){
        return $this->current_vote;
    }
    public function up_vote(){
        $this->current_vote++;
    }
    public function down_vote(){
        $this->current_vote--;
    }
}

$post1 = new Post("Post1", "This is the post 1.");
$post1->up_vote();
$post1->up_vote();
$post1->up_vote();
$post1->up_vote();
$post1->up_vote();
$post1->down_vote();
$post1->down_vote();
echo "The current vote for the post is " . $post1->get_current_vote() . ".<br>";

?>