### Becode Database API

#### What it is
I was assigned a project to create an API using a MySQL database. The end result works something like a Notes app. Based on which file you use, you are able to Create, Delete, Update, List, or Get notes.

#### Objectives
The objectives of the project were to
1. Learn how to create and use an API
2. Learn how to use MySQL databases
3. Learn the difference between SQL and NoSQL
4. Learn what CRUD is
5. Understand HTTP request types

#### Must-have features
1. Creating notes for example: HOST/addnote/TITLE
2. Notes are accessed by TITLE for creation, showing, editing and deleting
3. Updating notes
4. Getting a list of all the notes
5. Getting the text of one note
6. Deleting a note
7. Use a HTTP(S) GET to retreive data, POST request for adding, POST requests for updating, DELETE requests for deleting ....
8. Save the notes in an SQL database
9. You only return JSON data, so no forms/html/... this should be a pure 

#### Steps
- Create a structure for your database (on paper, let three people sign off on it, then show it to the responsible party)
- Write the SQL for that structure (on github, let three OTHER people sign off on it on github, they have to try and give a meaningful comment or ask a meaningful question, then show it to the responsible party)
- Write the PHP code for creating a note using the ?title=SOMETHING syntax
- Test it using https://install.advancedrestclient.com/install
- Once finished, show it to at least 2 OTHER juniors (so in total you will have had 8 DIFFERENT people who saw your progress, then show the responsible party)
- They write a SHORT review giving at least 2 comments on your code
- Choose what order you want to add Delete/List/Update/Get Note code files after this.

#### How to use
First, the structure of the database:
I have 5 columns:
1. id ---Primary key
2. author
3. title ---Unique key
4. note
5. date ---default current timestamp

My database has a CREATE file which creates a new row in the database. The user inputs the variables into the URL with the `create_note.php/?author=""&title=""&text=""` format. An example of implementation of this code is: `create_note.php/?author=jerry&title=here%20I%20am&text=today%20is%20beautiful`. The author and title are required to fill in. `%20` is a space character. Author and title have a HTTP request of GET but text has a HTTP request of POST. I tested the usability of this API using the [advanced rest client api](https://advancedrestclient.com/).

The DELETE file removes a row from the table which has been identified by its' 'title' attribute. 