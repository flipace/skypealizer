skypealizer
===========

a little app to analyze skypes sqlite database

Features
-----
  - import one or multiple main.db file(s) from skype
  - view tables
  - view conversations
  - overview of used words in conversation incl. word count
  - count of messages sent per user per conversation

Installation
-----
Checkout the git repository or download a project archive.

Then install the needed dependencies (skypealizer is built on *laravel*) via CLI:
`````cli
cd skypealizer
composer install
`````

Now trigger the migration to create the needed skype_db table:
`````cli
php artisan migrate
`````
That's it!

Want more?
-----
Don't hesitate to make pull-requests. If you have any ideas for things to implement, open a new issue, drop me a message on [twitter.com/flipace](http://twitter.com/flipace) or write me a mail: neschkudla@gmail.com

FAQ
-----
**Can I use this to read all messages from my local skype database?**

Yes. It's not built with UX in mind though. Just something to play around and calculate some numbers. If there is demand, I could make this a better experience though.

**Does anyone see my logs if I use this?**

No. At least not if you just use it on your own local machine and nobody else but you has access to it.

**Is there a demo available?**

Not yet. I'll try to put one up when I find time.

Made By
-----
Patrick Neschkudla | flipace | http://neschkudla.at | http://twitter.com/flipace

License
----

MIT