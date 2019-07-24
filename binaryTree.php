<?php
class Tree
{
    public $value;
    public $left;
    public $right;

    public function __construct($value){
        $this->value=$value;
        $this->left=null;
        $this->right=null;
    }

    public function setLeft($left){
        $this->left=$left;
    }

    public function setRight($right){
        $this->right=$right;
    }
}

//前序遍历 先父亲在左孩子在右孩子
// function prevOrder($root)
// {
//     if($root==null){
//         return;
//     }
//     echo "<br/>",$root->value;
//     prevOrder($root->left);
//     prevOrder($root->right);
// }

//中序遍历
function inOrder($root){
    if($root==null){
        return;
    }
    inOrder($root->left);
    echo "<br/>",$root->value;
    inOrder($root->right);
}

//使用栈 实现前序遍历
function preOrder($root){
    $static=[];
    array_push($static,$root); //将二叉树压入数组
    // var_dump($static);die;
    while(count($static)>0){
        $node=array_pop($static);// 弹出数组末尾的元素 因为只有一个下标为0的元素就是从父节点到叶子节点的二叉树
        echo '<br/>',$node->value; 
        //先压入右孩子的数据 后压入左孩子的 顺序是父左右 所以先弹出左孩子
        if($node->right){
            array_push($static,$node->right);
        }
        
        if($node->left){
            array_push($static,$node->left);
        }
    }
}

$tree=new Tree(20);
$a=new Tree(30);
$b=new Tree(40);
$d=new Tree(50);
$e=new Tree(60);

$a->setLeft($d);

$d->setLeft($e);
$tree->setLeft($a);
$tree->setRight($b);

// var_dump($tree);
preOrder($tree); 