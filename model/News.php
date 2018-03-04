<?php
class News extends Model{
	protected $new_id;
	protected $new_date;
	protected $u_tpnews;
	protected $new_title;
	protected $new_text;
	protected $gam_id;

	public static function sortByDate($a, $b) {
    	return strtotime($b->new_date) - strtotime($a->new_date);
	}

	public static function filterArrayByType($array,$typeName){

		return array_filter($array,function($news) use ($typeName){
			return $news->u_tpnews->tpn_label == $typeName;
		});

	}
}
?>