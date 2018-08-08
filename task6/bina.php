<?php
class Binary_Tree_node{
	public $data;

	public $left;
	public $right;

	public function _construct($d=NULL){
		$this->data= $d;

	}

	public function traversePreorder(){
		$l= array();
		$r= array();

		if($this->left){$l = $this->left->traversePreorder();}
		if($this->right){$l = $this->right->traversePreorder();}
		
		return array_merge(array($this->data),$l,$r);



	}
	public function traversePostorder(){
		$l= array();
		$r= array();

		if($this->left ){$l = $this->left->traversePostorder();}
		if($this->right ){$l = $this->right->traversePostorder();}
		
		return array_merge($l,$r,array($this->data));

	}

	public function traverseInorder(){
		$l= array();
		$r= array();

		if($this->left ){$l = $this->left->traverseInorder();}
		if($this->right ){$l = $this->right->traverseInorder();}
		
		return array_merge($l,array($this->data), $r);
	}
}
	$tree = new Binary_Tree_node(3);
	$tree -> left = new Binary_Tree_node('h');
	$tree -> right = new Binary_Tree_node(9);
	$tree -> right->left = new Binary_Tree_node(6);
	$tree -> right->right = new Binary_Tree_node('a');

	//preorder 3, h, 9,6,a
	echo "<br> preorder <br>";

	echo '<p>',implode(', ', $tree->traversePreorder()),'</p>';
	echo "<br> Postorder <br>";

	echo '<p>',implode(', ', $tree->traversePostorder()),'</p>';

	echo "<br> inorder <br>";
	echo '<p>',implode(', ', $tree->traverseInorder()),'</p>';
	//echo '<table border="1">',"shows the effect rof the all",'</table>';

class Sorting_Tree{
	public $tree;


	public function insert ($val){
		if(!(isset($this->tree))){
			$this->tree = new Binary_Tree_Node($val);
		}else{
			$pointer = $this ->tree;

			for(;;){
				if($val<=$pointer->data){
					if($pointer->left){
						$pointer=$pointer->left;

					}else{
						$pointer->left = new Binary_Tree_Node($val);
						break;
					}
				}else{
					if($pointer->right){
						$pointer =$pointer->right;

					}else{
						$pointer->righ = new Binary_Tree_Node($val);
						break;
					}
				}
			}
		}
	}
	public function returnSorted(){
		return $this->tree->traverseInorder();
	}
}
$sort_as_you_go =new Sorting_Tree();
for($i=0;$i<20;$i++){
	$sort_as_you_go->insert(rand(1,100));
}
echo '<p>',implode(', ', $sort_as_you_go->returnSorted()),'</p>';

?>