<?php

class Skype_Messages extends Skype_Base{
	protected $table = 'Messages';
	
	protected $show_columns = array(
		'author', 'timestamp', 'body_xml'
	);

	public function conversation()
	{
		return $this->hasOne('Skype_Conversation', 'id', 'convo_id');
	}

	public function analyzeWords($messages)
	{
		$concatMessages = '';
		$authors = array();
		foreach($messages as $i=>$message){
			$concatMessages.='_____'.$message['body_xml'];
			if(!isset($authors[$message['author']])){
				$authors[$message['author']] = 1;
			}else{
				$authors[$message['author']] += 1;
			}
		}


		$splitWords = preg_replace('/(<.+?>)(.+?)(<\/.+?>)/im',"$2", $concatMessages);

		$splitWords = preg_replace("/(:D|:\)|:P|;P|;D|:\(|;\)|xd)/im", ' $1 ', $splitWords);
		$splitWords = preg_replace("/([!|?])/", ' $1 ', $splitWords);
		$splitWords = preg_replace("/(\s\()/", ' $1 ', $splitWords);
		$splitWords = preg_replace("/(\))/", ' $1 ', $splitWords);
		$splitWords = preg_replace("/(\.)/", ' $1 ', $splitWords);
		$splitWords = preg_replace("/([a-z])([0-9])/im", '$1 $2', $splitWords);
		$splitWords = preg_replace("/([0-9])([a-z])/im", '$1 $2', $splitWords);
		$splitWords = preg_replace("/[\s]/im", '_____', $splitWords);

		//echo $splitWords; die();
		$splitWords = explode("_____",strtolower($splitWords));

		$groupedWords = array();
		$wordCounts = array();

		foreach($splitWords as $word){
			if(!in_array($word, $groupedWords)){
				$groupedWords[] = $word;
				$wordCounts[] = 1;
			}else{
				$index = array_search($word, $groupedWords);

				$wordCounts[$index] += 1;
			}
		}

		$normalizedWords = array();
		foreach($groupedWords as $key => $word){
			$normalizedWords[] = array('word' => $word, 'count' => $wordCounts[$key]);
		}

		usort($normalizedWords, function($a, $b) {
		    return $b['count'] - $a['count'];
		});

		arsort($authors);

		return array(
			'wordCount' => count($splitWords), 
			'allWords' => $normalizedWords,
			'authors' => $authors
		);
	}
}