# Inisev laravel subscription test
Laravel test for Inisev for subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website.

Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

## MUST:-
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of command to send email to the subscribers.
- Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.
- Deploy the code on a public github repository.

## OPTIONAL:-
- Seeded data of the websites.
- Open API documentation (or) Postman collection demonstrating available APIs & their usage.
- Use of latest laravel version.
- Use of contracts & services.
- Use of caching wherever applicable.
- Use of events/listeners.

# Step to deploy application

I have created this application using [`Laravel v5.7`](https://laravel.com/docs/5.7)

1. Clone the repository: `https://github.com/bhadresh-laiya/Inisev-laravel-subscription-test.git`.
2. Install composer dependencies using: `composer install`.
3. Create or rename the .env file: `cp .env.example .env` and set up database and email configuration.
4. Generate application key using: `php artisan key:generate`.
4. Create the data base: `php artisan db:create`.
5. Run the migrations: `php artisan migrate`.
6. Seed the database: `php artisan db:seed`.
7. Set email configuration for sending email using application in `.env` file.
8. Run application via `php artisan serve` command.


### How it works
Once you run the application using  `php artisan serve` you will access it via browser at `http://localhost:8000/`.

Now do login with user credentials which are already generated/seeded via `php artisan db:seed` command. This command inserts dummy users and some dummy posts related data as well.

Login password for all the user is : `secret` ( this will you find in `database/factories/UserFactory.php` file).
```
GET http://localhost:8000/login
```

After login, You can see Subscribe/Unsubscribe button for get subscription for website. So it will regitered user for get email updates of posts whenever it's created.

1. I have created console command to send email for user using : `php artisan bhadresh:emails-send-posts {post_id}`.

2. Also created event for send email to users whenever new post added or created. So just call the event like; `event(new PostAdded($user, $post));`. Event example you can find in file `routes/api.php` with `/send/subscriptionemail` endpoint.


Let me know if any help is needed in installtion and application understand related.


You can reach out me if anything needed at my [email](mailto:blaiya18@gmail.com).

Thank you!
