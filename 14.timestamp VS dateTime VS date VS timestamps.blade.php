 Migrations: timestamp VS dateTime VS date VS timestamps

Can you give me clarification and explain the differences between:

$table->timestamp('published_at');
$table->dateTime('published_at');
$table->date('published_at');
$table->timestamps('published_at');



Also, what are the advantages or disadvantages of using one over another? Are there some reasons when we need to avoid the use of some of these?
michaeldyrynda
Level 30
michaeldyrynda
•
Jun 9, 2016
Laracasts Tutor Achievement
Top 50 Achievement
Chatty Cathy Achievement
Laracasts Veteran Achievement
Ten Thousand Strong Achievement

timestamp and dateTime are similar - they store a date (YYYY-MM-DD) and time (HH:MM:SS) together in a single field i.e. YYYY-MM-DD HH:MM:SS. The difference between the two is that timestamp can use (MySQL's) CURRENT_TIMESTAMP as its value, whenever the database record is updated. This can be handled at the database level and is great for Laravel's created_at and updated_at fields.

Note also that timestamp has a limit of 1970-01-01 00:00:01 UTC to 2038-01-19 03:14:07 UTC (source), whilst dateTime has a range of 1000-01-01 00:00:00 to 9999-12-31 23:59:59, so consider what you plan on storing in that field before determining which type to use.

date stores just the date component i.e. YYYY-MM-DD (1000-00-01 to 9999-12-31).

timestamps doesn't take an argument, it's a shortcut to add the created_at and updated_at timestamp fields to your database.
