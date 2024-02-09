<?php
class Post{
    public $title;
    public $content;
    public function displayPost(){
        echo "Title:$this->title<br>Content:$this->content";
    }
}
class Blog{
    private $posts=[];
    public function addPost($post){
       $this->posts[]=$post;
    }
    public function displayAllPost(){
        foreach($this->posts as $post){
            $post->displayPost();
            echo "<br>";
        }
    }
}
$post1=new Post();
$post2=new Post();
$blog=new Blog();
$post1->title = "Introduction to PHP";
$post1->content = "This is a blog post about PHP.";
$post2->title = "Object-Oriented Programming";
$post2->content = "An overview of OOP principles.";
$blog->addPost($post2);
$blog->addPost($post1);
$blog->displayAllPost();

?>