<?php

class Skype_Conversations extends Skype_Base{
	protected $table = 'Conversations';

	protected $show_columns = array(
		'id', 'identity', 'displayname', 'creation_timestamp'
	);

	public function messages()
	{
		return $this->hasMany('Skype_Messages', 'convo_id');
	}
}