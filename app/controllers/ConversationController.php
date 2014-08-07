<?php

class ConversationController extends BaseController {

	public function messages($db,$conversation)
	{
		$db = SkypeDb::find($db);
		$db->init();
		
		$conversation = Skype_Conversations::find($conversation);

		$messages = new Skype_Messages();
		$message_columns = $messages->columns();

		return View::make('db.conversation.messages')
			->with('db', $db)
			->with('columns', $message_columns)
			->with('conversation', $conversation)
			->with('messages', $conversation->messages->toArray());
	}

	public function words($db,$conversation)
	{
		$db = SkypeDb::find($db);
		$db->init();
		
		$conversation = Skype_Conversations::find($conversation);

		$messages = new Skype_Messages();
		$words = $messages->analyzeWords($conversation->messages->toArray());

		return View::make('db.conversation.words')
			->with('db', $db)
			->with('conversation', $conversation)
			->with('words', $words);
	}
}
