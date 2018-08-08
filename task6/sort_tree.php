<?php
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