<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/17
 * Time: 17:09
 */
/*博客
1.设计   页面
2.表     结构
3.功能   个人中心
热爱技术  学习
*/
header("content-type:text/html;charset=utf8");
if (!defined("MVC")){
    echo "非法入侵！";
    exit();
}
class db{
    public $host="localhost";
    public $user="root";
    public $pass="";
    public $database="blog";
    private $opts=[];//把不确定的东西传进来

    public function __construct($table){
        $this->table=$table;
        $this->connect();
        $this->opts["where"]=$this->opts["group"]=$this->opts["having"]=$this->opts["order"]=$this->opts["limit"]="";
        $this->field="*";
        $this->val="";
    }
    public function connect(){
        $this->db=new mysqli("$this->host","$this->user","$this->pass","$this->database");
//        出错
        if (mysqli_connect_errno()){
            echo "数据库链接出错";
            exit();
        }
        $this->db->query("set names utf8");
        return $this;
    }
//    增删改查 select insert delete update
//    增
    public function insert(){
        $sql="insert into ".$this->table." (".$this->field.") VALUES (".$this->val.")";
        $this->db->query($sql);
        echo $this->db->affected_rows;
    }
//    删
    public function delete(){
        $sql="delete from ".$this->table." ".$this->opts["where"];
        $this->db->query($sql);
        echo $this->db->affected_rows;
    }
//    更新
    public function update(){
        $sql="update ".$this->table." set ".$this->field." ".$this->opts["where"];
        $this->db->query($sql);
        echo $this->db->affected_rows;
    }
//    查
    public function select(){
//        $this->val=$val;
        $sql="select ".$this->field." from ".$this->table." ".$this->opts["where"]." ".$this->opts["group"]." ".$this->opts["having"]." ".$this->opts["order"]." ".$this->opts["limit"];
        $result=$this->db->query($sql);
        $arr=array();
        while ($row=$result->fetch_assoc()){
            $arr[]=$row;
        }
        return $arr;
    }
//    条件
    public function where($argument){
        $this->opts["where"]="WHERE ".$argument;
        return $this;
    }
//    分组
    public function group($argument){
        $this->opts["group"]="GROUP BY ".$argument;
        return $this;
    }
//    结果集查询having
    public function having($argument){
        $this->opts["having"]="HAVING ".$argument;
        return $this;
    }
//    排序
    public function order($argument){
        $this->opts["order"]="ORDER BY ".$argument;
        return $this;
    }
//    限制条件
    public function limit($argument){
        $this->opts["limit"]="LIMIT ".$argument;
        return $this;
    }
//    字段
    public function getField($argument){
        $this->field=$argument;
        return $this;
    }
//    值
    public function getVal($argument){
        $this->val=$argument;
        return $this;
    }
}
