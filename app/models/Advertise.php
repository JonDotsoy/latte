<?php 

class Advertise extends Eloquent {
	protected $table = 'advertse_campaign';

	function get_html() {
		$html = Markdown::render($this->source);

		$html = str_replace('<a ', '<a target="_blank" ', $html);

		return $html;
	}

	static function getAds($max=3) {
		$ads = self::where('open','<=',date('Y-m-d H:i:s'))
				->where('end','>=',date('Y-m-d H:i:s'))
				->where('presence','>',0)
				->get();

		$arrOut = array();
		$grid = array();
		$out = array();

		foreach($ads as $key => $ad)
		{
			$arrOut[] = array('index'=>$key,'presence'=>(Int) $ad->presence);
		}
		foreach ($arrOut as $key => $value) {
			for ($i=0; $i < $value['presence']; $i++) { 
				$grid[] = $value['index'];
			}
		}

		shuffle($grid);

		$countSelectOut = 0;
		$countRecorr = 0;
		while($countSelectOut < $max && $countRecorr < count($grid)) {
			if (!in_array($ads[$grid[$countRecorr]], $out)){
				$out[] = $ads[$grid[$countRecorr]];
				$countSelectOut++;
			}
			$countRecorr++;
		}

		return $out;
	}

	static function url_new() {
		return URL::to('/ads/~');
	}

	function url_edit() {
		return URL::to('/ads/'.$this->id);
	}

	function url_del() {
		return URL::to('/ads/'.$this->id.'/del');
	}

}

?>